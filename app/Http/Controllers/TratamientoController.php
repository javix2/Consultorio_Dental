<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{

    public function index()
    {
        $tratamientos = Tratamiento::paginate(7);
        return view('tratamiento.index', compact('tratamientos'));
    }
    public function list() {
        $tratamientos = Tratamiento::all();
        return response()->json($tratamientos);
    }


    public function store(Request $request)
    {
        $treat = new Tratamiento();
        $treat->nombre = $request->nombre;
        $treat->descripcion = $request->descripcion;
        $treat->costo = $request->costo;

        $treat->save();
        

        return redirect()->route('tratamiento.index')->with('success', 'Datos registrado correctamente.');
    }

    public function update(Request $request, string $id)
    {
        $datos = Tratamiento::findOrFail($id);
        
        $datos->nombre = $request->nombre;
        $datos->descripcion = $request->descripcion;
        $datos->costo = $request->costo;

        $datos->save();
        return redirect()->route('tratamiento.index')->with('success', 'Datos actualizados correctamente.');
    }


    public function destroy(string $id)
    {
        Tratamiento::destroy($id);

        return redirect()->route('tratamiento.index')->with('success', 'Datos eliminado correctamente');
    }
}
