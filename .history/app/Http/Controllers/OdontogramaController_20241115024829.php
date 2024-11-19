<?php

namespace App\Http\Controllers;

use App\Models\Odontograma;
use App\Models\Paciente;
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

    public function buscarPaciente(Request $request)
    {
    $ci = $request->get('ci');

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


    public function buscarPorCarnet(Request $request)
    {
        $carnet = $request->input('carnet');
        
        $paciente = Paciente::where('ci', $carnet)->first();

        $odontogramas = collect();

        if ($paciente) {
            // Obtiene los registros de odontograma del paciente
            $odontogramas = $paciente->odontogramas;
        }

        return view('odontograma.index', compact('paciente', 'odontogramas'));
    }


    public function registrarDiente(Request $request)
    {
        try {
            $request->validate([
                'paciente_id' => 'required|exists:paciente,id',
                'num_diente' => 'required|string|max:255',
                'lado_diente' => 'required|string|max:255',
                'estado' => 'required|string|max:255',
            ]);

            $odontograma = Odontograma::create([
                'id_paciente' => $request->paciente_id,
                'diente' => $request->num_diente,
                'lado' => $request->lado_diente,
                'estado' => $request->estado,
            ]);

            return response()->json($odontograma);
        } catch (\Exception $e) {
            // Retorna un mensaje de error detallado
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function registrar(Request $request) {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'num_diente' => 'required|integer',
            'lado_diente' => 'required|string',
            'estado' => 'required|string',
            'nota' => 'required|string',
            'ci' => 'required|exists:pacientes,ci', // Validar que el CI exista en la tabla de pacientes
        ]);
    
        // Buscar el paciente por el campo `ci`
        $paciente = Paciente::where('ci', $validatedData['ci'])->first();
    
        if (!$paciente) {
            return redirect()->back()->with('error', 'Paciente no encontrado.');
        }
    
        // Crear y guardar el odontograma asociado al paciente
        $odontograma = new Odontograma();
        $odontograma->num_diente = $validatedData['num_diente'];
        $odontograma->lado_diente = $validatedData['lado_diente'];
        $odontograma->estado = $validatedData['estado'];
        $odontograma->nota = $validatedData['nota'];
        $odontograma->paciente_id = $paciente->id; 
        $odontograma->save();
    
        // Redirigir con mensaje de éxito
        // return redirect()->back()->with('success', 'Odontograma creado con éxito.');
        return redirect()->back();
    }
    public function eliminar($id)
    {
        // Buscar el registro por su ID
        $odontograma = Odontograma::find($id);

        // Verificar si el registro existe
        if ($odontograma) {
            $odontograma->delete(); // Eliminar el registro
            return redirect()->back();
        } 

    }
    
    public function create()
    {
        $pacientes = Paciente::all();

        // Obtener el paciente seleccionado de la sesión
        $selectedPacienteId = session('selected_paciente_id', null);
        $odontogramas = [];

        if ($selectedPacienteId) {
            $paciente = Paciente::with('odontogramas')->find($selectedPacienteId);

            // Verificar si el paciente tiene odontogramas relacionados
            if ($paciente) {
                $odontogramas = $paciente->odontogramas;
            }
        }

        return view('odontograma.index', compact('pacientes', 'selectedPacienteId', 'odontogramas'));
    }

    public function store(Request $request)
    {
        $dato = new Odontograma();
        $dato->paciente_id = $request->paciente_id;
        $dato->num_diente = $request->num_diente;
        $dato->lado_diente = $request->lado_diente;
        $dato->estado = $request->estado;
        $dato->nota = $request->nota;

        $dato->save();
        
        return redirect()->route('odontograma.index');

    }
    public function obtenerOdontograma($pacienteId)
    {
        $odontogramas = Odontograma::where('id_paciente', $pacienteId)->get();
        return response()->json($odontogramas);
    }


    public function update(Request $request, string $id)
    {
        $dato = Odontograma::findOrFail($id);
        
        $dato->numero_diente = $request->numero_diente;
        $dato->estado = $request->estado;
        $dato->patient_id = $request->paciente;

        $dato->save();
        return redirect()->route('odontograma.index')->with('success', 'Datos actualizados correctamente.');

        
    }

    public function destroy(string $id)
    {
        Odontograma::destroy($id);

        return redirect()->route('odontograma.index')->with('success', 'Datos eliminado correctamente');

    }
}