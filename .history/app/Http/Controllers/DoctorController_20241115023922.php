<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::with('user')->get();
        $user = User::all();

        return view('doctor.index', compact('doctors','user'));

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
        return view('doctor.crear');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->txtnombre . ' ' . $request->txtpaterno . ' ' . $request->txtmaterno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Doctor::create([
            'nombre' => $request->txtnombre,
            'paterno' => $request->txtpaterno,
            'materno' => $request->txtmaterno,
            'ci' => $request->txtci,
            'celular' => $request->txtcelular,
            'especialidad' => $request->txtespe,
            'direccion' => $request->txtdireccion,
            'user_id' => $user->id,
        ]);
        return redirect()->back()->with('success', 'Doctor creado con éxito.');
    }
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $user = $doctor->user; 
        $doctor->ci = $request->ci;
        $doctor->especialidad = $request->espe;
        $doctor->nombre = $request->nombre;
        $doctor->paterno = $request->paterno;
        $doctor->materno = $request->materno;
        $doctor->celular = $request->celular;
        $doctor->direccion = $request->direccion;
        // $doctor->name = $request->name;
        $doctor->save();

        $user->name = $request->nombre . ' ' . $request->paterno . ' ' . $request->materno;
        $user->save(); 

        return redirect()->route('doctor.index')->with('success', 'Registro actualizado correctamente');
    }
    public function update_user(Request $request,$id)
    {
        $request->validate([
            // 'name' => $request->username,
            'current_password' => ['required','current_password'],
            'password' => ['required','confirmed','min:6'],           
        ]);  
        // Encuentra el usuario a actualizar
        $user = User::findOrFail($id);

        // Actualiza la contraseña
        $user->update([
            'password' => bcrypt($request->password),
        ]);
        // Redirige a la vista de edición con un mensaje de éxito
        // return redirect()->route('doctor.editar', $id)->with('success', 'Contraseña actualizada correctamente');
        return redirect()->back()->with('success', 'Contraseña actualizada correctamente');

        // return view('doctor.editar')->with('success', 'Contraseña actualizada correctamente');

        // return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor eliminado exitosamente.');
    }

    
    public function delete($id){

    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     Doctor::destroy($id);
    //     return redirect()->route('doctor.index')->with('success', 'Datos eliminados correctamente');        
    // }
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
