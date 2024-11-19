<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('usuario.index', compact('users'));    

    }
    public function create(Doctor $doctor)
    {
        return view('doctor.registrar', compact('doctor'));
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
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        
        $users->save();
    
        return redirect()->route('usuario.index')->with('success', 'Registro actualizado correctamente');
    }   
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('usuario.index')->with('success', 'Datos eliminados correctamente');        

    } 
}