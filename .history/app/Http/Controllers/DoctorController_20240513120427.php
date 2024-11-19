<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::paginate(5);
        return view('doctor.index', compact('doctors'));

        // $datos = DB::select("select * from doctor");
        // return view('doctor.index')->with("datos", $datos);
    }
    public function list() {
        $doctors = Doctor::all();
        return response()->json($doctors);
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
        // dd($request->all());
         // Crear un nuevo doctor
        $doctors = new Doctor();
        $doctors->nombre = $request->txtnombre;
        $doctors->paterno = $request->txtpaterno;
        $doctors->materno = $request->txtmaterno;
        $doctors->ci = $request->txtci;
        $doctors->expe = $request->txtexpe;
        $doctors->celular = $request->txtcelular;
        $doctors->direccion = $request->txtdireccion;

        $doctors->save();

        // Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('doctor.index')->with('success', 'Datos registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctor.index', ['doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = Doctor::find($id);
        return view('doctor.editar', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // $doc ->update($request->all()); 
        $doctor = Doctor::findOrFail($id);

        $doctor->ci = $request->ci;
        $doctor->expe = $request->expe;
        $doctor->nombre = $request->nombre;
        $doctor->paterno = $request->paterno;
        $doctor->materno = $request->materno;
        $doctor->celular = $request->celular;
        $doctor->direccion = $request->direccion;
        $doctor->save();
    
        return redirect()->route('doctor.index')->with('success', 'Registro actualizado correctamente');
    }
    public function delete($id){
        // try {
        //     $sql = 
        //     DB::delete(" delete from doctor where ci = $id");
        
        // } catch (\Throwable $th) {
        //     $sql = 0;
        // }
        // if ($sql == true) {
        //     return back()->with("correcto", "Eliminado correctamente");
        // } else {
        //     return back()->with("incorrecto", "Error al eliminar");
        // }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Doctor::destroy($id);
        return redirect()->route('doctor.index')->with('success', 'Datos eliminados correctamente');        
    }
    public function imprimir($id)
    {
        // Obtener el doctor por su ID
        $doc = Doctor::findOrFail($id);

        // Cargar la vista de impresión con los datos del doctor
        $pdf = pdf::loadView('doctor.reporte', compact('doc'));

        // Devolver el archivo PDF para ser descargado o visualizado
        return $pdf->stream('detalle_doctor.pdf');
    }
}
