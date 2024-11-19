<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tratamientos = Tratamiento::paginate(5);
        return view('tratamiento.index', compact('tratamientos'));
    }
    public function list() {
        $tratamientos = Tratamiento::all();
        return response()->json($tratamientos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $treat = new Tratamiento();
        $treat->nombre = $request->nombre;
        $treat->descripcion = $request->descripcion;
        $treat->costo = $request->costo;
        // $treat->doctor_id = $request->txtdoctor;

        $treat->save();
        

        return redirect()->route('tratamiento.index')->with('success', 'Datos registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = Tratamiento::findOrFail($id);
        
        $datos->nombre = $request->nombre;
        $datos->descripcion = $request->descripcion;
        $datos->costo = $request->costo;
        // $datos->doctor_id = $request->doctor_id;

        $datos->save();
        return redirect()->route('tratamiento.index')->with('success', 'Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tratamiento::destroy($id);

        return redirect()->route('tratamiento.index')->with('success', 'Datos eliminado correctamente');
    }
}
