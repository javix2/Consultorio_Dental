<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $histo = Historial::all();
        $pdf = Pdf::loadView('historialclinico.reportegenral', compact('histo'));
        return $pdf->stream('historial_report');
    }
    public function reporte($id){
        $histo = Historial::findOrFail($id);
        $pdf = Pdf::loadView('historialclinico.reporte', compact('histo'));
        return $pdf->stream('historial_report');
    }

     public function create()
    {
        // return view('historialclinico.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return dd(request());
        // $validatedData = $request->validate([
            // 'paciente_id' => 'required|exists:pacientes,id',
            // 'tratamiento_id' => 'required|exists:tratamientos,id',
            // 'monto_total' => 'numeric',
            // 'fecha_pago' => 'required|date',
            // 'completado' => 'required|date',
            // 'metodo_pago' => 'required|string',

            // 'id' => 're',
        // $request->validate([
        //     'paciente_id' =>'required|exists:pacientes,id',
        //     'distrto' =>'required|string|max:256',

        //     'no_hc' => 'nullable|integer',
        //     'fecha_aper'=> 'required|date|date_format:Y-m-d H:i:s',

        //     'apoderado'=> 'nullable|string|max:100',
        //     'parentesco'=> 'nullable|string|max:100',
        //     'direccion'=> 'nullable|string|max:100',
        //     'celular'=> 'nullable|string|max:100',

        //     'motivo' => 'required|string|max:100',

        //     'enf_act'=> 'nullable|string|max:100',
        //     'alergias'=> 'nullable|string|max:100',
        //     'medicamentos'=> 'nullable|string|max:100',

        //     'hab_alimen'=> 'required|string|max:100',
        //     'hab_higiene'=> 'required|string|max:100',

        //     'tabaco'=> 'nullable|string|max:100',
        //     'otro'=> 'nullable|string|max:100',

        //     'cardiovas'=> 'required|string|max:100',
        //     'pulmonares'=> 'required|string|max:100',
        //     'renales'=> 'required|string|max:100',
        //     'gastrointes'=> 'required|string|max:100',
        //     'endocrinas'=> 'required|string|max:100',
        //     'osteoarticu'=> 'required|string|max:100',
        //     'metabolicas'=> 'required|string|max:100',
        //     'infecciosas'=> 'required|string|max:100',

        //     'interve_prev'=> 'nullable|string|max:100',
        //     'notas'=> 'nullable|string|max:100',
        // ]);
        // $messages = [
        //     'optional_field.max' => 'El campo opcional no puede tener más de :max caracteres.',
        // ];
        // $validatedData = $request->validate($rules, $messages);

        // $historial = Historial::create($validatedData);
        // Historial::create([
        //     // 'paciente_id' => $request->paciente_id,
        //     // 'no_hc' => $request->no_hc,
        //     // 'fecha_aper' => $request->fecha_aper,

        //     'paciente_id' =>$request->paciente_id,
        //     'distrto' =>$request->distrto,

        //     'no_hc' => $request-> no_hc,          
        //     'fecha_aper'=> $request->fecha_aper,

        //     'apoderado'=> $request->apoderado,
        //     'parentesco'=> $request->parentesco,
        //     'direccion'=> $request->direccion,
        //     'celular'=> $request->celular,

        //     'motivo' => $request->motivo,

        //     'enf_act'=> $request->enf_act,
        //     'alergias'=> $request->alergias,
        //     'medicamentos'=> $request->medicamentos,

        //     'hab_alimen'=> $request->hab_alimen,
        //     'hab_higiene'=> $request->hab_higiene,

        //     'tabaco'=> $request->tabaco,
        //     'otro'=> $request->otro,

        //     'cardiovas'=> $request->cardiovas,
        //     'pulmonares'=> $request->pulmonares,
        //     'renales'=> $request->renales,
        //     'gastrointes'=> $request->gastrointes,
        //     'endocrinas'=> $request->endocrinas,
        //     'osteoarticu'=> $request->osteoarticu,
        //     'metabolicas'=> $request->metabolicas,
        //     'infecciosas'=> $request->infecciosas,

        //     'interve_prev'=> $request->interve_prev,
        //     'notas'=> $request->notas,

        // ]);


            // 'paciente_id' => $request->paciente_id,
            // 'no_hc' => $request->no_hc,
            // 'fecha_aper' => $request->fecha_aper,

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
        $historias = Historial::findOrFail($id);
        $pacientes = Paciente::pluck('nombre', 'id');

        return view('historialclinico.index', compact('historias', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $historial = Historial::findOrFail($id);
        $historial->update($request->all());

        return redirect()->route('historialclinico.index')->with('success', 'Historial actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Historial::destroy($id);
        return redirect()->route('historialclinico.index')->with('success', 'Datos eliminados correctamente');
    }
}
