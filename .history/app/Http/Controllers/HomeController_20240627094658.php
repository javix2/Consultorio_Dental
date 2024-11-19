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
    public function validarFecha($fecha, $horaInicial, $horaFinal)
    {
        $cita = Cita::whereDate('fecha', $fecha)
                    ->whereBetween('hora_inicial', [$horaInicial, $horaFinal])
                    ->orWhereBetween('hora_final',  [$horaInicial, $horaFinal])
                    ->first();
                    
        return $cita == null ? true : false;
    }

    // public function guardar(Request $request)
    // {
    //     $input = $request->all();
    //     //   dd($input);

    //     if($this->validarFecha($input["fecha"], $input["horaInicial"], $input["horaFinal"])) {
            
    //         $cita = Cita::create([
    //             "paciente_id" => $input["paciente"],
    //             "tratamiento_id" => $input["tratamiento"],
    //             "doctor_id" => $input["doctor"],
    //             "fecha" => $input["fecha"],
    //             "hora_inicial" => $input["horaInicial"],
    //             "hora_final" => $input["horaFinal"],
    //             "motivo" => $input["motivo"],
    //             "estado" => "Por atender",
    //         ]);

    //         return response()->json(["ok" => true]);
    //     } else {
    //         return response()->json(["ok" => false]);
    //     }
    // }
    public function guardar(Request $request)
    {
        // Validar la solicitud
        // $request->validate([
        //     'fecha' => 'required|date',
        //     'horaInicial' => 'required|date_format:H:i:s',
        //     'horaFinal' => 'required|date_format:H:i:s',
        //     // Agregar otras validaciones necesarias
        // ]);

        try {
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

            return response()->json(['ok' => true, 'message' => 'Cita guardada exitosamente']);
        } catch (\Exception $e) {
            // Manejo de errores
            return response()->json(['ok' => false, 'message' => 'Error al guardar la cita', 'error' => $e->getMessage()], 500);
        }
    }

    





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
                 "backgroundColor"=>$cita->estado == 'Por atender' ? "red":"greem",
                //  "borderColor" => $cita->estado == 'Cancelada' ? "red" : "white",
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