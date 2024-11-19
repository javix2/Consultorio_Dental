<?php

namespace App\Http\Controllers;

use App\Models\HistorialTratam;
use App\Models\Sesion;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function index(Request $request)
    {
        $historials = HistorialTratam::all();
        $sesions = Sesion::all();

        // $sesions = Sesion::with('historialtrata')->get();

        $histo_id = $request->input('histo_id');
        $histo = HistorialTratam::find($histo_id);

        return view('sesion.index', compact('sesions','historials','histo'));
    }
    
    
    public function buscahisto($id)
    {
        $histor = HistorialTratam::findOrFail($id);
        return view('sesion.index', compact('histor'));

    }
    public function create()
    {
        //
    }
    public function store2(Request $request)
    {
        $histo_id = $request->input('histo_id');
        $histo = HistorialTratam::find($histo_id);
            $sesion = new Sesion(); 
            $sesion->historial_tratam_id = $request->input('historial');
            $sesion->fecha_sesion = $request->input('fecha_sesion');
            $sesion->numero_sesion = $request->input('numero_sesion');
            $sesion->medicamento = $request->input('medicamento');
            $sesion->estado = $request->input('estado');

            $sesion->save();
            // $estado = $request->input('estado');

        return redirect()->route('sesion.index')->with('success', 'Datos guardados correctamente','histo');
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
    
        return redirect()->route('historialtratam.index')->with('message', 'Tratamiento registrado exitosamente');

    }
    public function registrarSesion(Request $request, $histoId)
    {
        // dd(request());

        // Obtener el tratamiento del paciente
        $histo_tratam = HistorialTratam::findOrFail($histoId);

        // Crear un nuevo registro en la tabla de sesion
        $sesion = new Sesion();
        $sesion->historial_tratams_id = $histoId;
        $sesion->sesion = $request->input('sesion');
        $sesion->fecha = now();
        $sesion->sesion = $request->input('medicamento');
        $sesion->descripcion = $request->input('descripcion');
        $sesion->estado = $request->input('estado');
        $sesion->save();

        // Actualizar el saldo del tratamiento
        // $histo_tratam->saldo -= $pago->monto;
        // $histo_tratam->monto_total += $pago->monto;

        // if ($histo_tratam->saldo < 0) {
        //     $histo_tratam->saldo = 0;
        // }
        $histo_tratam->save();

        return redirect()->route('historialtratam.index')->with('message', 'Pago registrado exitosamente');
    }

    public function show()
    {
        //
    }
    public function update()
    {
        //
    }
    public function edit()
    {
        //
    }
    public function destroy(string $id)
    {
        Sesion::destroy($id);
        return redirect()->route('sesion.index')->with('success', 'Datos eliminados correctamente');
    }
}
