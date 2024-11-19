<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::paginate(4);
        $pacientes = Paciente::all();
        $tratamientos = Tratamiento::all();

        return view('pagos.index', compact('pagos', 'pacientes', 'tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        $cita = new Pago();
        $cita->paciente_id = $request->input('paciente_id');
        $cita->tratamiento_id = $request->input('tratamiento_id');
        $cita->monto_total = $request->input('monto', '0.00'); // Valor predeterminado 0.00 si no se proporciona ningún valor
        $cita->fecha_pago = $request->input('fecha_pago');
        // $cita->estado = $request->input('estado','false');
        
        // Asigna otros campos según sea necesario

        $cita->save();

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function reportepago(){
        $pagos = Pago::all();
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
