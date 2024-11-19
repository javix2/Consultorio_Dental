<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PacienteFormRequest;
use App\Models\Paciente;
use Barryvdh\DomPDF\Facade\Pdf;
use Dotenv\Validator;
use PhpParser\Node\Stmt\TryCatch;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = Paciente::paginate(6);
        return view('paciente.index', compact('pacientes'));
    }

    public function list() {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }
    
    public function busqueda(Request $request)
    {
        //  dd($request);
        $texto = $request->input('texto'); // Obtener el texto ingresado en el formulario

        $pacientes = Paciente::where('nombre', 'LIKE', "%$texto%")
            ->orWhere('paterno', 'LIKE', "%$texto%")
            ->orWhere('materno', 'LIKE', "%$texto%")
            ->get()
            ->paginate(5);

        // Retornar la vista con los resultados de la búsqueda
        return view('paciente.index', compact('pacientes', 'texto'));

            
            // return view('paciente.index', compact('pacientes'));
            
            // return view ('paciente.index',compact($data));
    }
    public function report(){
        $pacientes = Paciente::paginate(10);
        $pdf = Pdf::loadView('paciente.reporte', compact('pacientes'));
        return $pdf->stream('patient_report');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $validator = 
        // Validator::make($request->all(), [
        //     'nombre' => 'required|string|max:255',
        //     'paterno' => 'required|email',
        // ], [
        //     'campo1.required' => 'El campo 1 es obligatorio.',
        //     'campo1.string' => 'El campo 1 debe ser una cadena de caracteres.',
        //     'campo1.max' => 'El campo 1 no puede exceder los 255 caracteres.',
        //     'campo2.required' => 'El campo 2 es obligatorio.',
        //     'campo2.email' => 'El campo 2 debe ser una dirección de correo electrónico válida.',
        // ]);
    
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // dd($request);
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

    /**
     * Display the specified resource.
     */
    public function show($paciente)
    {
        return $paciente;
        // return view("paciente.show", ["paciente"=>Paciente::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        //return view("paciente.editar", ["paciente"=>Paciente::findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
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
    public function delete($id){
        // try {
        //     $sql = DB::delete(" delete from patients where ci = $id");
        
        // } catch (\Throwable $th) {
        //     $sql = 0;
        // }
        // if ($sql == true) {
        //     return back()->with("correcto", "Paciente eliminado correctamente");
        // } else {
        //     return back()->with("incorrecto", "Error al eliminar");
        // }

    }

    /**
     * Remove the specified resource from storage.
     */
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
