<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Barryvdh\DomPDF\Facade\Pdf;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = Paciente::paginate(9);
        return view('paciente.index', compact('pacientes'));
    }

    public function list() {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }
    
    public function busqueda(Request $request)
    {
        $searchTerm = $request->input('texto');
    
        // Utiliza el método where junto con el operador LIKE para la búsqueda
        if($searchTerm !== null && $searchTerm !== ''){
            $pacientes = Paciente::where('ci', 'LIKE', '%' . $searchTerm . '%')
                                    ->orwhere('nombre', 'LIKE', '%' . $searchTerm . '%')
                                    ->orwhere('paterno', 'LIKE', '%' . $searchTerm . '%')
                                    ->orwhere('materno', 'LIKE', '%' . $searchTerm . '%')
                                    ->orwhere('direccion', 'LIKE', '%' . $searchTerm . '%')
                                    ->paginate(6);

        }else{
            $pacientes = Paciente::paginate(6);

        }

        
        return view('paciente.index', compact('pacientes'));
        
    }
    public function report(){
        $pacientes = Paciente::paginate(10);
        $pdf = Pdf::loadView('paciente.reporte', compact('pacientes'));
        return $pdf->stream('patient_report');
    }


    public function store(Request $request)
    {

        $pacientes = new Paciente();
        $pacientes->ci = $request->ci;
        $pacientes->expe = $request->expe;
        $pacientes->nombre = $request->nombre;
        $pacientes->paterno = $request->paterno;
        $pacientes->materno = $request->materno;
        $pacientes->celular = $request->celular;
        $pacientes->fecha_nac = $request->fecha_nac;
        $pacientes->direccion = $request->direccion;
        $pacientes->edad = $request->edad;
        $pacientes->genero = $request->genero;

        $pacientes->save();

        return redirect()->route('paciente.index')->with('success', 'Datos registrados correctamente.');


    }


    public function show($paciente)
    {
        return $paciente;
    }


    public function update(Request $request, string $id)
    {
        $pacientes = Paciente::findOrFail($id);

        $pacientes->ci = $request->ci;
        $pacientes->expe = $request->expe;
        $pacientes->nombre = $request->nombre;
        $pacientes->paterno = $request->paterno;
        $pacientes->materno = $request->materno;
        $pacientes->celular = $request->celular;
        $pacientes->fecha_nac = $request->fecha_nac;
        $pacientes->direccion = $request->direccion;
        $pacientes->edad = $request->edad;
        $pacientes->genero = $request->genero;

        $pacientes->save();
    
        return redirect()->route('paciente.index')->with('success', 'Registro actualizado correctamente');
    }


    public function destroy(string $id)
    {

        Paciente::destroy($id);
        return redirect()->route('paciente.index')->with('success', 'Datos eliminados correctamente');
        
    }

    public function odontog($id){
        $paciente=Paciente::find($id);
        $odontogramas=$paciente->odontogramas;
        
        echo($paciente);
        echo($odontogramas);
    }
}
