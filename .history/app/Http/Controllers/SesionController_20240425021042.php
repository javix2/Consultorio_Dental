<?php

namespace App\Http\Controllers;

use App\Models\HistorialTratam;
use App\Models\Sesion;
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
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'historial_tratam_id' => 'required',
        //     'fecha_sesion' => 'required',
        //     'numero_sesion' => 'required', 
        //     'medicamento' => 'nullable',
        //     'estado' => 'required|in:concluido,sin-concluir', 


        // ]);
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
