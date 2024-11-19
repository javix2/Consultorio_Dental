<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Tratamiento;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $citas = Cita::get();
        $pacientes =Paciente::get();
        $tratamientos =Tratamiento::get();
        $doctors = Doctor::get();
        
        return view('home')
            ->with('citas', $citas)
            ->with('pacientes', $pacientes)
            ->with('tratamientos', $tratamientos)
            ->with('doctores', $doctors);
    }
    public function validarFecha($fecha, $horaInicial, $horaFinal)
    {
        $cita = Cita::whereDate('fecha', $fecha)
                    ->whereBetween('hora_inicial', [$horaInicial, $horaFinal])
                    ->orWhereBetween('hora_final',  [$horaInicial, $horaFinal])
                    ->first();

            // dd($cita);
                    
        return $cita == null ? true : false;
    }
    // public function validarFecha($fecha, $horaInicial, $horaFinal)
    // {
    //     $cita = Cita::whereDate('fecha', $fecha)
    //                 ->where(function($query) use ($horaInicial, $horaFinal) {
    //                     $query->whereBetween('hora_inicial', [$horaInicial, $horaFinal])
    //                         ->orWhereBetween('hora_final', [$horaInicial, $horaFinal])
    //                         ->orWhere(function($query) use ($horaInicial, $horaFinal) {
    //                             $query->where('hora_inicial', '<', $horaInicial)
    //                                     ->where('hora_final', '>', $horaFinal);
    //                         });
    //                 })
    //                 ->first();
        
                    
    //     return $cita == null ? true : false;
    // }

    public function guardar(Request $request)
    {
        $input = $request->all();
            // dd($input);

        if($this->validarFecha($input["fecha"], $input["horaInicial"], $input["horaFinal"])) {
            
            // $cita = Cita::create([
            //     "paciente_id" => $input["paciente"],
            //     "tratamiento_id" => $input["tratamiento"],
            //     "doctor_id" => $input["doctor"],
            //     "fecha" => $input["fecha"],
            //     "hora_inicial" => $input["horaInicial"],
            //     "hora_final" => $input["horaFinal"],
            //     "motivo" => $input["motivo"],
            //     "estado" => "Por atender",
            // ]);
            $cita = new Cita();
            $cita->paciente_id = $request["paciente"];
            $cita->tratamiento_id = $request["tratamiento"];
            $cita->doctor_id = $request["doctor"];
            $cita->fecha = $request->input('fecha');
            $cita->hora_inicial = $request->input('horaInicial');
            $cita->hora_final = $request->input('horaFinal');
            $cita->motivo = $request["motivo"];
            $cita->estado = "Por atender";
            // Asignar otros campos necesarios
            $cita->save();

            return response()->json(["ok" => true]);
        } else {
            return response()->json(["ok" => false]);
        }
    }
    public function getData()
    {
        $doctores = Doctor::all();
        $pacientes = Paciente::all();
        $tratamientos = Tratamiento::all();

        return response()->json([
            'doctores' => $doctores,
            'pacientes' => $pacientes,
            'tratamientos' => $tratamientos
        ]);
    }
    // public function guardar(Request $request)
    // {
    //     // Validar la solicitud
    //     // $request->validate([
    //     //     'fecha' => 'required|date',
    //     //     'horaInicial' => 'required|date_format:H:i:s',
    //     //     'horaFinal' => 'required|date_format:H:i:s',
    //     //     // Agregar otras validaciones necesarias
    //     // ]);
    //     // dd($request);
    //     try {
    //         $cita = new Cita();
    //         $cita->paciente_id = $request["paciente"];
    //         $cita->tratamiento_id = $request["tratamiento"];
    //         $cita->doctor_id = $request["doctor"];
    //         $cita->fecha = $request->input('fecha');
    //         $cita->hora_inicial = $request->input('horaInicial');
    //         $cita->hora_final = $request->input('horaFinal');
    //         $cita->motivo = $request["motivo"];
    //         $cita->estado = "Por atender";
    //         // Asignar otros campos necesarios
    //         $cita->save();

    //         return response()->json(['ok' => true, 'message' => 'Cita guardada exitosamente']);
    //     } catch (\Exception $e) {
    //         // Manejo de errores
    //         return response()->json(['ok' => false, 'message' => 'Error al guardar la cita', 'error' => $e->getMessage()], 500);
    //     }
    //}

    public function store(Request $request)
    {        
        // $citas = new Cita();
        // $citas->paciente_id = $request->paciente_id;
        // $citas->tratamiento_id = $request->tratamiento_id;
        // $citas->doctor_id = $request->doctor_id;
        // $citas->fecha = $request->fecha;
        // $citas->hora = $request->hora;
        // $citas->motivo = $request->motivo;
        // $citas->estado = "Por atender";

        // $citas->save();
        // return view('home');       
        
    }
    public function show(string $id)
    {
        $citas = Cita::all();

         $events = [];
         foreach ($citas as $cita) {
             $events[] = [
                //  "motivo" => $cita->motivo,
                'id' => $cita->id,
                 "title" => $cita->paciente->nombre." ". $cita->paciente->paterno."  ". $cita->paciente->materno,
                //  "start" => date('c', strtotime($cita->fecha)),
                 "start"=> $cita->fecha." ".$cita->hora_inicial,
                 "end" => $cita->fecha." ".$cita->hora_final,
                 
                 "backgroundColor"=>$cita->estado == 'Por atender' ? "red":"yellow", 
                //  "borderColor" => $cita->estado == 'Cancelada' ? "red" : "white",
                 "textColor"=>"white",
                 
                'extendedProps'=> [
                    'fecha' =>$cita->fecha,
                    'hora_inicial' =>$cita->hora_inicial,
                    $hora_inicial = new DateTime($cita->hora_inicial),
                    $hora_final = new DateTime($cita->hora_final),
                    // Calcula la diferencia entre las dos horas
                    $diferencia = $hora_final->diff($hora_inicial),
                    // Convierte la diferencia a minutos
                    $minutos = ($diferencia->h * 60) + $diferencia->i,
                    // Devuelve una variable
                    'tiempo' => $minutos,
                    'tratamiento' => $cita->tratamiento->nombre,
                    'doctor' => $cita->doctor->nombre . " " . $cita->doctor->paterno . " ".$cita->doctor->materno,
                    'motivo' => $cita->motivo,
                    'estado' => $cita->estado,

                ],
                
                 
             ];
         }

         return response()->json($events);
    }
    public function show2($id)
    {
        $cita = Cita::with(['paciente', 'tratamiento', 'doctor'])->findOrFail($id);

        $event = [
            'title' => $cita->paciente->nombre . " " . $cita->paciente->paterno  . " " . $cita->paciente->materno,
            'description' => $cita->motivo,
            'start' => $cita->fecha . " " . $cita->hora_inicial,
            'end' => $cita->fecha . " " . $cita->hora_final,
            'tratamiento' => $cita->tratamiento->nombre,
            'doctor' => $cita->doctor->nombre . " " . $cita->doctor->paterno . " " . $cita->doctor->materno,
            'estado' => $cita->estado,

        ];

        return response()->json($event);
    }


    public function busca($id)
    {
        // Encuentra la cita por su ID
        $cita = Cita::find($id);

        // Verifica si la cita existe
        if ($cita) {
            return response()->json([
                'titulo' => $cita->paciente->nombre,
                'fecha' => $cita->fecha,
                'descripcion' => $cita->motivo,
            ]);
        } else {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }
    }
    public function create()
    {
        return view('hola');
    }
    public function destroy($id)
    {
        $event = Cita::find($id);

        if ($event) {
            $event->delete();
            return response()->json(['message' => 'Evento eliminado exitosamente.'], 200);
        } else {
            return response()->json(['message' => 'Evento no encontrado.'], 404);
        }
    }
    public function update(Request $request, $id)
    {
        dd($request);
        $event = Cita::find($id);

        if ($event) {
            // dd($event);
            $event->fecha = $request->input('fecha');
            $event->hora_inicial = $request->input('hora_inicial');
            $event->tiempo = $request->input('tiempo');
            $event->paciente = $request->input('paciente');
            $event->tratamiento = $request->input('tratamiento');
            $event->doctor = $request->input('doctor');
            $event->motivo = $request->input('motivo');
            $event->estado = $request->input('estado');

            // Convertir la hora inicial a formato DateTime
            $hora_inicial = new DateTime($event->fecha . ' ' . $event->hora_inicial);

            // Sumar el tiempo de duración (asumiendo que $request->input('tiempo') es en minutos)
            $tiempo = intval($request->input('tiempo'));
            $hora_final = clone $hora_inicial;
            $hora_final->add(new DateInterval('PT' . $tiempo . 'M')); // Sumar tiempo en minutos

            // Guardar la hora final en el evento
            $event->hora_final = $hora_final->format('Y-m-d H:i:s');

            // Guardar el evento actualizado
            $event->save();

            return response()->json(['message' => 'Evento actualizado exitosamente.', 'hora_final' => $event->hora_final], 200);
        } else {
            return response()->json(['message' => 'Evento no encontrado.'], 404);
        }
    }
}
