<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('perfil.index', compact('users'));  
          

    }
    public function updateImage(){
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validaciones
        ]);

        if ($request->hasFile('profile_image')) {
            // Guardar la imagen en la carpeta 'public/storage/profiles'
            $path = $request->file('profile_image')->store('profiles', 'public');

            // Actualizar el campo profile_image en la base de datos
            $user = Auth::user();
            $user->profile_image = $path;
            $user->save();
        }

        return redirect()->back()->with('success', 'Imagen de perfil actualizada correctamente.');

    }
    public function create($doctorId)
    {
        // $doctor = Doctor::find($doctorId);

        // // Verifica si el doctor existe
        // if (!$doctor) {
        //     abort(404); // O maneja el caso de doctor no encontrado de alguna otra manera
        // }

        // return view('doctor.registrar', compact('doctor'));
    }

    public function store(Request $request, Doctor $doctor)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        $doctor->update(['user_id' => $user->id]);

        return redirect()->route('doctors.index')->with('success', 'Usuario creado y asociado exitosamente.');
    }

    // public function store(Request $request)
    // { 
    //     // dd($request);
    //     $users = new User();
    //     $users->name = $request->name;
    //     $users->email = $request->email;
    //     $users->password = $request->password;
        
    //     $users->save();

    //     // Redireccionar o mostrar un mensaje de éxito
    //     return redirect()->route('usuario.index')->with('success', 'Usuario creado correctamente.');
                
    // }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'username' => 'required|string|max:255|unique:users,username,' . $id,
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        //     'password' => 'nullable|string|min:8|confirmed',
        // ]);

        $user = User::findOrFail($id);
        $user->name = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('doctors.index')->with('success', 'Usuario actualizado con éxito.');
    }

    // public function update(Request $request, $id)
    // {
    //     $users = User::findOrFail($id);

    //     $users->name = $request->input('name');
    //     $users->email = $request->input('email');
    //     $users->password = $request->input('password');
        
    //     $users->save();
    
    //     return redirect()->route('usuario.index')->with('success', 'Registro actualizado correctamente');
    // }   
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('usuario.index')->with('success', 'Datos eliminados correctamente');        

    } 
}