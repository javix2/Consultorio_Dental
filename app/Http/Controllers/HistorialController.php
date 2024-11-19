<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class HistorialController extends Controller
{

    public function index(Request $request)
    {
        $historias = Historial::paginate(5);
        $pacientes = Paciente::all();

        // if (!$request->has('search')) {
        //     return redirect()->route('historial.search');
        // }

        // $pacientes = Paciente::get()->pluck('full_info', 'id');
        // $pacientes = Paciente::pluck('nombre', 'id')->map(function ($nombre, $id) {
        //     $paciente = Paciente::find($id);
        //     return $nombre . ' ' . $paciente->paterno . ' ' . $paciente->materno; // Concatenar nombre y descripción del rol
        // });


        return view('historialclinico.index', compact('historias','pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        dd($request);
        // $query = Paciente::query();

        // if ($request->has('search')) {
        //     $search = $request->input('search');
        //     $query->where('nombre', 'like', "%$search%")
        //         ->orWhere('paterno', 'like', "%$search%");
        // }

        // $pacientes = $query->paginate(10);

        // return view('historialclinico.index', compact('pacientes'));
    }
    public function reportegen(){
        $histos = Historial::all();
        $pdf = Pdf::loadView('historialclinico.reportegeneral', compact('histos'));
        return $pdf->stream('historial_report');
    }
    public function reporte($id){
        $histo = Historial::findOrFail($id);
        $pdf = Pdf::loadView('historialclinico.reporte', compact('histo'));
        return $pdf->stream('historial_report');
    }

    public function store(Request $request)
    {
            $request->validate([
                'no_hc' => 'required|unique:historials', // Validación de número único
                
            ]);

            
            $historial = new Historial();
            $historial->paciente_id =$request->paciente_id;
            $historial->distrto = $request->distrto;

            $historial->no_hc = $request-> no_hc;          
            $historial->fecha_aper = $request->fecha_aper;

            $historial->apoderado = $request->apoderado;
            $historial->parentesco = $request->parentesco;
            $historial->direccion = $request->direccion;
            $historial->celular = $request->celular;

            $historial->motivo = $request->motivo;

            $historial->enf_act = $request->enf_act;
            $historial->alergias = $request->alergias;
            $historial->medicamentos = $request->medicamentos;

            $historial->hab_alimen = $request->hab_alimen;
            $historial->hab_higiene = $request->hab_higiene;

            $historial->tabaco = $request->tabaco;
            $historial->otro = $request->otro;

            $historial->cardiovas = $request->cardiovas;
            $historial->pulmonares = $request->pulmonares;
            $historial->renales = $request->renales;
            $historial->gastrointes = $request->gastrointes;
            $historial->endocrinas = $request->endocrinas;
            $historial->osteoarticu = $request->osteoarticu;
            $historial->metabolicas = $request->metabolicas;
            $historial->infecciosas = $request->infecciosas;

            $historial->interve_prev = $request->interve_prev;
            $historial->notas = $request->notas;

            $historial->save();

        
        return redirect()->route('historialclinico.index')->with('success', 'Historial creado exitosamente.');
    }

    public function edit(string $id)
    {
        $historias = Historial::findOrFail($id);
        $pacientes = Paciente::pluck('nombre', 'id');

        return view('historialclinico.index', compact('historias', 'pacientes'));
    }

    public function update(Request $request, string $id)
    {
        $historial = Historial::findOrFail($id);
        $historial->update($request->all());

        return redirect()->route('historialclinico.index')->with('success', 'Historial actualizado correctamente');

    }

    public function destroy(string $id)
    {
        Historial::destroy($id);
        return redirect()->route('historialclinico.index')->with('success', 'Datos eliminados correctamente');
    }
}
