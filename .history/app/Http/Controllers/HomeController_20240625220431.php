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
        

        //  recupera los registro eliminados logicamente
        // $citas = Cita::withTrashed()->get();
            
        
        // return view('home', compact('citas', 'pacientes','tratamientos', 'doctors'));
        return view('home')
            ->with('citas', $citas)
            ->with('pacientes', $pacientes)
            ->with('tratamientos', $tratamientos)
            ->with('doctores', $doctors);
    }
    // public function validarFecha($fecha, $hora )
    // {
    //     // $cita = Cita::select("*")
    //     //         ->whereDate('fecha',$fecha)
    //     //         ->whereTime('hora', '>=', $hora)
    //     //         ->first();
    //     // return $cita == null ? true : false;

    //     $cita = Cita::whereDate('fecha', $fecha)
    //             ->whereTime('hora_inicial', '>=', $hora)
    //             ->first();
                
    //     return $cita == null ? true : false;
    // }
    // public function guardar(Request $request)
    // {
    //     // dd($request);
    //     $request->validate([
    //         'fecha' => 'required|date',
    //         'hora_inicial' => 'required|date_format:H:i',
    //         'hora_final' => 'required|date_format:H:i',
    //         'paciente' => 'required|exists:pacientes,id',
    //         'tratamiento' => 'required|exists:tratamientos,id',
    //         'doctor' => 'required|exists:doctores,id',
    //         'motivo' => 'nullable|string',
    //     ]);    
        
    //     $input = $request->all();
    //     if($this->validarFecha($input["fecha"], $input["hora_inicial"])){
        
    //     // // Obtener valores del formulario
    //     // $horaInicialInput = $input["hora_inicial"];
    //     // $minutosASumar = intval($input["minutos"]); // Asegurar que sea un número entero

    //     // // Convertir la hora inicial en un objeto DateTime
    //     // $horaInicial = new DateTime($horaInicialInput);

    //     // // Crear un intervalo de tiempo de los minutos que quieres sumar
    //     // $intervalo = new DateInterval("PT{$minutosASumar}M");

    //     // // Sumar el intervalo de tiempo a la hora inicial
    //     // $horaInicial->add($intervalo);

    //     // // Convertir el resultado a formato de cadena y guardarlo en hora_final
    //     // $horaFinal = $horaInicial->format('H:i');

    //     // Crear la cita con los valores calculados
    //     $cita = Cita::create([
    //         "paciente_id" => $input["paciente"],
    //         "tratamiento_id" => $input["tratamiento"],
    //         "doctor_id" => $input["doctor"],
    //         "fecha" => $input["fecha"],
    //         "hora_inicial" => $input["hora_inicial"],
    //         "hora_final" => $input["hora_final"],
    //         "motivo" => $input["motivo"],
    //         "estado" => "Por atender",
    //     ]);
    //         return response()->json(["ok"=>true]);
    //     }else{
    //         return response()->json(["ok"=>false]);    
    //     }

    // }

    public function guardar(Request $request)
    {
        $input = $request->all();

        if($this->validarFecha($input["fecha"], $input["hora_inicial"])) {
            $horaInicial = new \DateTime($input["hora_inicial"]);
            $minutosASumar = intval($input["minutos"]);
            $intervalo = new \DateInterval("PT{$minutosASumar}M");
            $horaInicial->add($intervalo);
            $horaFinal = $horaInicial->format('H:i');

            $cita = Cita::create([
                "paciente_id" => $input["paciente"],
                "tratamiento_id" => $input["tratamiento"],
                "doctor_id" => $input["doctor"],
                "fecha" => $input["fecha"],
                "hora_inicial" => $input["hora_inicial"],
                "hora_final" => $horaFinal,
                "motivo" => $input["motivo"],
                "estado" => "Por atender",
            ]);

            return response()->json(["ok" => true]);
        } else {
            return response()->json(["ok" => false]);
        }
    }

    public function validarFecha($fecha, $hora)
    {
        $cita = Cita::whereDate('fecha', $fecha)
                    ->whereTime('hora_inicial', '>=', $hora)
                    ->first();
                    
        return $cita === null;
    }

    public function getCitas()
    {
        $citas = Cita::all();
        $events = [];

        foreach ($citas as $cita) {
            $events[] = [
                'title' => $cita->paciente,
                'start' => $cita->fecha . 'T' . $cita->hora_inicial,
                'end' => $cita->fecha . 'T' . $cita->hora_final,
            ];
        }

        return response()->json($events);
    }

    // public function guardar(Request $request)
    // {
    //     $input = $request->all();

    //     if($this->validarFecha($input["fecha"], $input["hora_inicial"])) {
    //         $horaInicial = new \DateTime($input["hora_inicial"]);
    //         $minutosASumar = intval($input["minutos"]);
    //         $intervalo = new \DateInterval("PT{$minutosASumar}M");
    //         $horaInicial->add($intervalo);
    //         $horaFinal = $horaInicial->format('H:i');

    //         $cita = Cita::create([
    //             "paciente_id" => $input["paciente"],
    //             "tratamiento_id" => $input["tratamiento"],
    //             "doctor_id" => $input["doctor"],
    //             "fecha" => $input["fecha"],
    //             "hora_inicial" => $input["hora_inicial"],
    //             "hora_final" => $horaFinal,
    //             "motivo" => $input["motivo"],
    //             "estado" => "Por atender",
    //         ]);

    //         return response()->json(["ok" => true]);
    //     } else {
    //         return response()->json(["ok" => false]);
    //     }
    // }

    // public function validarFecha($fecha, $hora)
    // {
    //     $cita = Cita::whereDate('fecha', $fecha)
    //                 ->whereTime('hora_inicial', '>=', $hora)
    //                 ->first();
                    
    //     return $cita === null;
    // }

    // public function getCitas()
    // {
    //     $citas = Cita::all();
    //     $events = [];

    //     foreach ($citas as $cita) {
    //         $events[] = [
    //             'title' => $cita->paciente,
    //             'start' => $cita->fecha . 'T' . $cita->hora_inicial,
    //             'end' => $cita->fecha . 'T' . $cita->hora_final,
    //         ];
    //     }

    //     return response()->json($events);
    // }


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
                 "title" => $cita->paciente->nombre." ". $cita->paciente->paterno,
                //  "start" => date('c', strtotime($cita->fecha)),
                 "start"=> $cita->fecha." ".$cita->hora_inicial,
                 "end" => $cita->fecha." ".$cita->hora_final,
                 "backgroundColor"=>$cita->estado == 'Cancelada' ? "red":"yellow",
                //  "borderColor" =>"yellow",
                 "textColor"=>"white",
                 "paciente" => "hola",
             ];
         }

         return response()->json($events);
    }
    public function create()
    {
        return view('hola');
    }
    // public function guardar(Request $request)
    // {
    //     $input = $request->all();
    //     dd($input);
    // }
}
