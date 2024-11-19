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
        $histo_tratams = HistorialTratam::paginate(10);
        $historialTratamientos = HistorialTratam::with(['paciente', 'tratamiento', 'pagos'])->get();
    
        $pacientes = Paciente::all();
        $tratamientos = Tratamiento::all();

        return view('pago.index', compact('histo_tratams', 'pacientes', 'tratamientos','historialTratamientos'));
    }
    public function busca(Request $request)
    {
        $pacientes =Paciente::get();
        $tratamientos =Tratamiento::get();

        $search = $request->input('texto');
        $pagos = Pago::query()->whereHas('paciente', function ($query) use ($search) {
                        $query->where('nombre', 'like', "%$search%")
                              ->orWhere('paterno', 'like', "%$search%")
                              ->orWhere('materno', 'like', "%$search%")
                              ->orWhere('ci', 'like', "%$search%");
                    })
                    
                    ->paginate(5);

        return view('pago.index', compact('pagos','search','pacientes','tratamientos'));
        
    }
    public function create()
    {
        $pacientes = Paciente::all();
        $tratamientos = Tratamiento::all();
        return view('pago.index', compact('pacientes', 'tratamientos'));
    }
    public function seleccionarPacienteTratamiento()
    {
        $pacientes = Paciente::all();
        $tratamientos = Tratamiento::all();

        return view('pagos.seleccionarPacienteTratamiento', compact('pacientes', 'tratamientos'));
    }
    public function registrarPago(Request $request, $histoId)
    {
        
        $histo_tratam = HistorialTratam::findOrFail($histoId);

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

        return redirect()->route('pago.index')->with('message', 'Pago registrado exitosamente');
    }


    public function store2(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'fecha_pago' => 'required|date',
        ]);

        $selec = new HistorialTratam();
        $selec->paciente_id = $request->input('paciente_id');
        $selec->tratamiento_id = $request->input('tratamiento_id');
        $selec->monto_total = $request->input('monto', '0.00'); // Valor predeterminado 0.00 si no se proporciona ningún valor
        $selec->saldo = $request->input('fecha_pago');
        $selec->cuota = $request->input('fecha_pago');

        $selec->save();

        return redirect()->route('pago.index')->with('success', 'Pago creado exitosamente.');

        
    }
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'tratamiento_id' => 'required|exists:tratamientos,id',
        ]);
    
        // Obtener el tratamiento y calcular el saldo total
        $tratamiento = Tratamiento::find($request->tratamiento_id);
        $montoTotal = $tratamiento->costo;
    
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
        $histo = HistorialTratam::findOrFail($histoId);

        $pagos = Pago::where('historial_tratamiento_id', $histoId)->get();

        return view('pago.pagar', compact('histo', 'pagos'));
    }

    public function mostrarModalPago($historialTratamientoId)
    {
        $histo = HistorialTratam::with('paciente', 'tratamiento')->findOrFail($historialTratamientoId);

        $pagosRealizados = Pago::where('historial_tratamiento_id', $historialTratamientoId)->get();

        return view('pagos.modal', compact('histo', 'pagosRealizados'));
    }


    public function reportepago(){
        $histo_tratams = HistorialTratam::paginate(10);
        $pdf = Pdf::loadView('pago.reportpago', compact('histo_tratams'));
        return $pdf->stream('pagos_report');
    }
    public function reporteboleta($id){
        $pago = HistorialTratam::findOrFail($id);

        $pdf = Pdf::loadView('pago.reportboleta', compact('pago'))->setPaper([0,0,300, 350]);

        return $pdf->stream('cuota_report');
    }


    public function edit(string $id)
    {
        $pago = Pago::findOrFail($id);
        return view('pago.editar', compact('pago'));
    }

    
    public function update(Request $request, string $id)
    {
        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        return redirect()->route('pago.index')->with('success', 'Pago actualizado correctamente');
    }
    

    public function updatePago(Request $request, $id)
    {
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

    public function destroy(string $id)
    {
        HistorialTratam::destroy($id);
        return redirect()->route('pago.index')->with('success', 'Datos eliminados correctamente');
    }
    public function eliminar($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->back()->with('success', 'Pago eliminado correctamente.');
    }

}
