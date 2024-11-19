<?php

namespace App\Http\Controllers;

use App\Models\Odontograma;
use App\Models\Paciente;
use App\Models\Patient;
use Illuminate\Http\Request;

class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Odontograma::paginate(3);
        $pacientes =Paciente::get();
        return view('odontograma.index', compact('datos','pacientes'));
        // return view('odontograma.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function buscarPaciente(Request $request)
{
    $ci = $request->get('ci');

    // Suponiendo que tienes un campo 'dni' en la tabla 'paciente'
    $paciente = Paciente::where('ci', $ci)->first();

    if ($paciente) {
        return response()->json([
            'nombre' => $paciente->nombre,
            'paterno' => $paciente->paterno,
            'materno' => $paciente->materno,
            'celular' => $paciente->celular,
            'genero' => $paciente->genero,
            'edad' => $paciente->edad,
            'direccion' => $paciente->direccion,
        ]);
    } else {
        return response()->json(null);
    }
}


    public function buscar(Request $request)
    {           
        $pacientes =Paciente::get();

        $search = $request->input('texto');
        $datos = Odontograma::query()->whereHas('paciente', function ($query) use ($search) {
                        $query->where('nombre', 'like', "%$search%")
                              ->orWhere('paterno', 'like', "%$search%")
                              ->orWhere('materno', 'like', "%$search%")
                              ->orWhere('ci', 'like', "%$search%");
                    })
                    ->paginate(5);

        return view('odontograma.index', compact('datos', 'search','pacientes'));
    }
    
     public function create()
    {
        $pacientes =Paciente::get();
        return view('odontograma.crear1', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dato = new Odontograma();
        $dato->numero_diente = $request->numero_diente;
        $dato->estado = $request->estado;
        // $dato->nota = $request->nota;
        $dato->paciente_id = $request->paciente_id;

        $dato->save();
        
        // return redirect()->back()->with('success', 'Datos registrado correctamente.');
        return redirect()->route('odontograma.index')->with('success', 'Datos registrado correctamente.');
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
        // dd($request);
        $dato = Odontograma::findOrFail($id);
        
        $dato->numero_diente = $request->numero_diente;
        $dato->estado = $request->estado;
        // $dato->nota = $request->nota;
        $dato->patient_id = $request->paciente;

        $dato->save();
        return redirect()->route('odontograma.index')->with('success', 'Datos actualizados correctamente.');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Odontograma::destroy($id);

        return redirect()->route('odontograma.index')->with('success', 'Datos eliminado correctamente');

    }
}