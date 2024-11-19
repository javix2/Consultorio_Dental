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
        // $doctors = Doctor::paginate(5);
        // $users = User::get();
        // return view('doctor.index', compact('doctors','users'));

        $doctors = Doctor::with('user')->get();
        $user = User::all();

        return view('doctor.index', compact('doctors','user'));

    //     $doctors = Doctor::with('user')->get();
    // return view('doctors.index', compact('doctors'));

        

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
        return view('doctor.crear');
    }

    // public function storeData(Request $request)
    // {
    //     // Guardar datos personales en la sesión o base de datos temporal
    //     $request->session()->put('personal_data', $request->all());

    //     return redirect()->route('doctors.createAccount');

    // }
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->username,
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
        $doctor->ci = $request->ci;
        $doctor->especialidad = $request->espe;
        $doctor->nombre = $request->nombre;
        $doctor->paterno = $request->paterno;
        $doctor->materno = $request->materno;
        $doctor->celular = $request->celular;
        $doctor->direccion = $request->direccion;
        // $doctor->name = $request->name;
        $doctor->save();
        return redirect()->route('doctor.index')->with('success', 'Registro actualizado correctamente');
    }
    public function update_user(Request $request){
        $user = User::findOrFail();
        $user->email = $request->email;

        $request->validate([
            // 'name' => $request->username,
            'email' => ['require','email'],
            'password' => ['require','confirmed','min:16'],           
        ]);  
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);


    }
    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //      // Crear un nuevo doctor
    //     $doctors = new Doctor();
    //     $doctors->nombre = $request->txtnombre;
    //     $doctors->paterno = $request->txtpaterno;
    //     $doctors->materno = $request->txtmaterno;
    //     $doctors->ci = $request->txtci;
    //     $doctors->especialidad = $request->txtespe;
    //     $doctors->celular = $request->txtcelular;
    //     $doctors->direccion = $request->txtdireccion;

    //     $doctors->save();

    //     // Redireccionar o mostrar un mensaje de éxito
    //     return redirect()->route('doctor.index')->with('success', 'Datos registrado correctamente.');
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.show', compact('doctor'));
    }

    // public function show(string $id)
    // {
    //     $doctor = Doctor::findOrFail($id);
    //     return view('doctor.index', ['doctor' => $doctor]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }
    // public function edit(string $id)
    // {
    //     $doctor = Doctor::find($id);
    //     return view('doctor.editar', compact('doctor'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     // $request->validate([
    //     //     'nombre' => 'required|string|max:255',
    //     //     'apellido_paterno' => 'required|string|max:255',
    //     //     'apellido_materno' => 'required|string|max:255',
    //     //     'direccion' => 'required|string|max:255',
    //     //     'telefono' => 'required|string|max:15',
    //     // ]);

    //     $doctor = Doctor::findOrFail($id);
    //     $doctor->update($request->all());

    //     return redirect()->route('doctors.index')->with('success', 'Doctor actualizado exitosamente.');
    // }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor eliminado exitosamente.');
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
