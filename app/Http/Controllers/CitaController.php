<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Tratamiento;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::paginate(6);
        $pacientes =Paciente::get();
        $tratamientos =Tratamiento::get();
        $doctors = Doctor::get();
        

        //  recupera los registro eliminados logicamente
        // $citas = Cita::withTrashed()->get();
            
        
        return view('cita.index', compact('doctors', 'pacientes','tratamientos', 'citas'));
    }

    // public function listar(){
    //     $citas = Cita::all();

    //     $events = [];
    //     foreach ($citas as $cita) {
    //         $events[] = [
    //             "id" => $cita->id,
    //             "start" => $cita->fecha,
    //             "end" => $cita->fecha,
    //             // Otros campos necesarios para tu evento
                
    //         ];
    //     }

    //     // return response()->json($events);
    //     return view('home', compact('events'));
    // }

    public function buscar(Request $request)
    {
        // dd($request);
        $pacientes =Paciente::get();
        $tratamientos =Tratamiento::get();
        $doctors = Doctor::get();

        $search = $request->input('texto');
        $citas = Cita::query()->whereHas('paciente', function ($query) use ($search) {
                        $query->where('nombre', 'like', "%$search%")
                              ->orWhere('paterno', 'like', "%$search%")
                              ->orWhere('materno', 'like', "%$search%")
                              ->orWhere('ci', 'like', "%$search%");
                    })
                    ->orWhere('estado', 'like', "%$search%") 
                    ->orWhere('fecha', 'like', "%$search%")
                    
                    ->paginate(5);

        return view('cita.index', compact('citas', 'search','pacientes','tratamientos','doctors'));
        
    }
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request);
        return dd(request());
        $citas = new Cita();
        $citas->paciente_id = $request->paciente_id;
        $citas->tratamiento_id = $request->tratamiento_id;
        $citas->doctor_id = $request->doctor_id;
        $citas->fecha = $request->fecha;
        $citas->hora_inicial = $request->hora;
        // Crear un objeto DateTime con la hora inicial
        $horaInicial = new DateTime($request->hora);
        // Sumar los minutos a la hora inicial
        $intervalo = new DateInterval('PT' . $request->min . 'M');
        $horaInicial->add($intervalo);
        // Guardar la hora final en el formato 'H:i'
        $citas->hora_final = $horaInicial->format('H:i');
        // $citas->hora_final = $request->min;
        $citas->motivo = $request->motivo;
        $citas->estado = "Por atender";

        $citas->save();
        // $request->validate([
        //     'paciente_id' => 'required|exists:pacientes,id',
        //     'tratamiento_id' => 'required|exists:tratamientos,id',
        //     'doctor_id' => 'required|exists:doctors,id',
        //     'fecha' => 'required|date_format:d/m/Y',
        //     'hora' => 'required|date_format:H:i:s',
        //     'motivo' => 'nullable|string',

        //     // 'completado' => 'required|date',
        //     // 'metodo_pago' => 'required|string',
        // ]);

        // Cita::create([
        //     'paciente_id' => $request->paciente_id,
        //     'tratamiento_id' => $request->tratamiento_id,
        //     'tratamiento_id' => $request->doctor_id,
        //     'fecha' => $request->fecha,
        //     'hora' => $request->hora,
        //     'motivo' => $request->motivo,
        //     // 'completado' => $request->true,
        //     // 'metodo_pago' => $request->metodo_pago,
        // ]);
        // 
        return redirect()->route('cita.index')->with('success', 'Cita registrada exitosamente.');
    }

    public function cambiarEstado(Request $request, $id)
    {
        // dd($request);
        $cita = Cita::findOrFail($id);
        $cita->update(['estado' => $request->input('estado')]);

        return redirect()->back()->with('success', 'Estado cambiado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $data['eventos'] = Cita::all();
        // return response()->json($data['eventos']);

        $citas = Cita::all();

         $events = [];
         foreach ($citas as $cita) {
             $events[] = [
                //  "motivo" => $cita->motivo,
                 "title" => $cita->paciente->nombre." ". $cita->paciente->paterno,
                //  "start" => date('c', strtotime($cita->fecha)),
                 "start"=> $cita->fecha." ".$cita->hora_inicial,
                 "end" => $cita->fecha." ".$cita->hora_inicial,
                 "backgroundColor"=>$cita->estado == 'Cancelada' ? "red":"yellow",
                //  "borderColor" =>"yellow",
                 "textColor"=>"white",
                 "paciente" => "hola",
                 
                
             ];
         }

         return response()->json($events);
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
        $citas = Cita::findOrFail($id);
        $citas->paciente_id = $request->paciente_id;
        $citas->tratamiento_id = $request->tratamiento_id;
        $citas->doctor_id = $request->doctor_id;
        $citas->fecha = $request->fecha;
        $citas->hora_inicial = $request->hora;
        $citas->motivo = $request->motivo;

        $citas->save();
        return redirect()->route('cita.index')->with('success', 'Registro actualizado correctamente');

    }
    public function eliminar($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect()->route('cita.index')->with('success', 'Cita eliminada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cita::destroy($id);
        // return redirect()->route('cita.index')->with('success', 'Cita eliminada correctamente');   
    }
}
