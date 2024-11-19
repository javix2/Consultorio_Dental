<?php

namespace App\Http\Controllers;

use App\Models\HistorialTratam;
use App\Models\Pago;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PagoController extends Controller
{
    public function index()
    {
        // $pagos = Pago::paginate(4);
        $histo_tratams = HistorialTratam::all();
        // Obtener todos los pagos realizados, agrupados por tratamiento
        $pagos = Pago::all()->groupBy('historial_tratamiento_id');
        $pacientes = Paciente::all();
        $tratamientos = Tratamiento::all();

        return view('pago.index', compact('histo_tratams', 'pacientes', 'tratamientos','pagos'));
    }
    public function busca(Request $request)
    {
        // dd($request);
        $pacientes =Paciente::get();
        $tratamientos =Tratamiento::get();

        $search = $request->input('texto');
        $pagos = Pago::query()->whereHas('paciente', function ($query) use ($search) {
                        $query->where('nombre', 'like', "%$search%")
                              ->orWhere('paterno', 'like', "%$search%")
                              ->orWhere('materno', 'like', "%$search%")
                              ->orWhere('ci', 'like', "%$search%");
                    })
                    ->orWhere('estado', 'like', "%$search%") 
                    ->orWhere('fecha_pago', 'like', "%$search%")
                    
                    ->paginate(5);

        return view('pago.index', compact('pagos','search','pacientes','tratamientos'));
        
    }
    public function create()
    {
        $pacientes = Paciente::all();
        $tratamientos = Tratamiento::all();
        return view('pago.index', compact('pacientes', 'tratamientos'));
        // return view('pago.crear');
    }
    public function seleccionarPacienteTratamiento()
    {
        // Obtener todos los pacientes y tratamientos disponibles
        $pacientes = Paciente::all();
        $tratamientos = Tratamiento::all();

        return view('pagos.seleccionarPacienteTratamiento', compact('pacientes', 'tratamientos'));
    }
    public function registrarPago(Request $request, $histoId)
    {
        // dd(request());
        // $request->validate([
        //     'monto' => 'required|numeric|min:1'
        // ]);

        // Obtener el tratamiento del paciente
        $histo_tratam = HistorialTratam::findOrFail($histoId);

        // Crear un nuevo registro en la tabla de pagos
        $pago = new Pago();
        $pago->historial_tratams_id = $histoId;
        $pago->monto = $request->input('monto');
        $pago->fecha = now();
        $pago->save();

        // Actualizar el saldo del tratamiento
        $histo_tratam->saldo -= $pago->monto;
        $histo_tratam->monto_total += $pago->monto;

        if ($histo_tratam->saldo < 0) {
            $histo_tratam->saldo = 0;
        }
        $histo_tratam->save();

        return redirect()->route('pagos.index')->with('message', 'Pago registrado exitosamente');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store2(Request $request)
    {
        // return dd(request());
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'tratamiento_id' => 'required|exists:tratamientos,id',
            // 'monto_total' => 'numeric',
            'fecha_pago' => 'required|date',
            // 'completado' => 'required|date',
            // 'metodo_pago' => 'required|string',
        ]);

        $selec = new HistorialTratam();
        $selec->paciente_id = $request->input('paciente_id');
        $selec->tratamiento_id = $request->input('tratamiento_id');
        $selec->monto_total = $request->input('monto', '0.00'); // Valor predeterminado 0.00 si no se proporciona ningún valor
        $selec->saldo = $request->input('fecha_pago');
        $selec->cuota = $request->input('fecha_pago');
        // $cita->estado = $request->input('estado','false');
        
        // Asigna otros campos según sea necesario

        $selec->save();

        // Pago::create([
        //     'paciente_id' => $request->paciente_id,
        //     'tratamiento_id' => $request->tratamiento_id,
        //     'monto_total' => 0.00,
        //     'fecha_pago' => $request->fecha_pago,
        //     // 'completado' => $request->true,
        //     // 'metodo_pago' => $request->metodo_pago,
        // ]);
        // 
        return redirect()->route('pago.index')->with('success', 'Pago creado exitosamente.');

        
    }
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'tratamiento_id' => 'required|exists:tratamientos,id',
            // 'cuotas' => 'required|integer|min:1'
        ]);
    
        // Obtener el tratamiento y calcular el saldo total
        $tratamiento = Tratamiento::find($request->tratamiento_id);
        $montoTotal = $tratamiento->costo;
    
        // Crear un nuevo registro en tratamiento_paciente
        $histor_tratam = new HistorialTratam();
        $histor_tratam->paciente_id = $request->paciente_id;
        $histor_tratam->tratamiento_id = $request->tratamiento_id;
        $histor_tratam->monto_total = 0.00;
        $histor_tratam->saldo = $montoTotal;
        $histor_tratam->cuota = 0;
        $histor_tratam->save();
    
        return redirect()->route('pago.index')->with('message', 'Tratamiento registrado exitosamente');

    }
    public function mostrarPagos($histoId)
    {
        // Obtener el historial del tratamiento del paciente
        $histo = HistorialTratam::findOrFail($histoId);

        // Obtener los pagos realizados para este tratamiento
        $pagos = Pago::where('historial_tratamiento_id', $histoId)->get();

        return view('pago.pagar', compact('histo', 'pagos'));
    }

    public function mostrarModalPago($historialTratamientoId)
    {
        // Obtener el historial de tratamiento del paciente
        $histo = HistorialTratam::with('paciente', 'tratamiento')->findOrFail($historialTratamientoId);

        // Obtener los pagos realizados para este tratamiento
        $pagosRealizados = Pago::where('historial_tratamiento_id', $historialTratamientoId)->get();

        return view('pagos.modal', compact('histo', 'pagosRealizados'));
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function reportepago(){
        $pagos = Pago::paginate(10);
        $pdf = Pdf::loadView('pago.reportpago', compact('pagos'));
        return $pdf->stream('pagos_report');
    }
    public function reporteboleta($id){
        // $pagos = Pago::paginate(6);
        $pago = Pago::findOrFail($id);

        $pdf = Pdf::loadView('pago.reportboleta', compact('pago'))->setPaper([0,0,300, 350]);

        return $pdf->stream('cuota_report');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pago = Pago::findOrFail($id);
        return view('pago.editar', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        // $pago->paciente()->update($request->only('descripcion'));

        return redirect()->route('pago.index')->with('success', 'Pago actualizado correctamente');
    }
    
    public function editPago(string $id)
    {
        $pago = Pago::findOrFail($id);
        return view('pago.pagar', compact('pago'));
    }


    public function updatePago(Request $request, $id)
    {
        // $pago = Pago::findOrFail($id);
        $pago = Pago::with('tratamiento')->findOrFail($id);
        $costoTratamiento = $pago->tratamiento->costo;

        $pago->monto_total += $request->input('monto_total');
        $pago->fecha_pago = $request->input('fecha_pago');

        if(($pago->monto_total) >= $costoTratamiento)
        {       
            $pago->estado = (1);
            
        }

        $pago->save();
        
        return redirect()->route('pago.index')->with('success', 'Pago realizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pago::destroy($id);
        return redirect()->route('pago.index')->with('success', 'Datos eliminados correctamente');
    }
}
