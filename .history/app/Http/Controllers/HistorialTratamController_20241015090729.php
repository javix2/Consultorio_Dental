<?php

namespace App\Http\Controllers;

use App\Models\HistorialTratam;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class HistorialTratamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * 
     */
    
    public function index()
    {
        $historialpa = HistorialTratam::with('paciente')->get();
        $historialtr = HistorialTratam::with('tratamiento')->get();

        // $historials = HistorialTratam::withTrashed()->get();

        $historials = HistorialTratam::paginate(5);
        $pacientes = Paciente::all();
        $tratamientos = Tratamiento::all();

        return view('historialtratam.index', compact('historials', 'pacientes', 'tratamientos'));
    }
    public function buscar(Request $request)
    {
        // dd($request);
        $pacientes =Paciente::get();
        $tratamientos =Tratamiento::get();

        $search = $request->input('texto');
        $historials = HistorialTratam::query()->whereHas('paciente', function ($query) use ($search) {
                        $query->where('nombre', 'like', "%$search%")
                              ->orWhere('paterno', 'like', "%$search%")
                              ->orWhere('materno', 'like', "%$search%")
                              ->orWhere('ci', 'like', "%$search%");
                    })
                    // ->orWhere('estado', 'like', "%$search%") 
                    ->orWhere('fecha', 'like', "%$search%")
                    
                    ->paginate(5);

        return view('historialtratam.index', compact('historials', 'search','pacientes','tratamientos'));
        
    }
    public function create()
    {
        return view('hola');
    }
    public function reportegen(){
        $trata = HistorialTratam::all();
        $pdf = Pdf::loadView('historialclinico.reportegeneral', compact('trata'));
        return $pdf->stream('historial_report');
    }
    public function store(Request $request)
    {
        // dd($request->all());
         // Crear un nuevo doctor
        $historials = new HistorialTratam();
        $historials->paciente_id = $request->input('paciente_id');
        $historials->tratamiento_id = $request->input('tratamiento_id');
        $historials->fecha = $request->input('fecha');
        $historials->numero_sesion += 1;
        $historials->medicamento = $request->input('medicamento');
        $historials->descripcion = $request->input('descripcion');
        $historials->estado = "en curso";
        

        $historials->save();

        // Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('historialtratam.index')->with('success', 'Datos registrado correctamente.');
    }

    public function destroy(string $id)
    {
        HistorialTratam::destroy($id);
        return redirect()->route('historialtratam.index')->with('success', 'Datos eliminados correctamente');
    }
    public function buscapaciente(HistorialTratam $histo)
    {

        // return view('sesion.index', compact('histo'));
    }
    public function sesionregistro(Request $request, $id)
    {

        $historials = HistorialTratam::findOrFail($id);
        // $historials->paciente_id = $request->input('paciente_id');
        // $historials->tratamiento_id = $request->input('tratamiento_id');
        // $historials->fecha = $request->input('fecha');
        $historials->numero_sesion += 1;
        $historials->medicamento = $request->input('medicamento');
        $historials->descripcion = $request->input('descripcion');
        $historials->estado = $request->input('estado');
        

        $historials->save();

        // Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('historialtratam.index')->with('success', 'Datos registrado correctamente.');
    }
    public function recuperalista()
    {
        //  recupera los registro eliminados logicamente
        $histo = HistorialTratam::withTrashed()->get();
    }
    public function elimina($id)
    {
        $histo = HistorialTratam::findOrFail($id);
        $histo->delete();

        return redirect()->route('historialclinico.index')->with('success', 'Tratamiento eliminado correctamente');
    }
}