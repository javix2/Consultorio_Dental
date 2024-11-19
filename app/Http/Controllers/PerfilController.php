<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{


    public function index()
    {
        // $users = User::all();
        // return view('perfil.index', compact('users'));  
          
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


    public function edit()
    {
        
        $user = Auth::user();
        return view('perfil.index', compact('user'));
    }

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'current_password' => 'required',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => [
            'nullable',
            'min:8',  // La contraseña debe tener al menos 8 caracteres
            'confirmed', // Confirmación de la contraseña
            'regex:/[A-Z]/',  // Al menos una letra mayúscula
            'regex:/[a-z]/',  // Al menos una letra minúscula
            'regex:/[0-9]/',  // Al menos un número
            'regex:/[@$!%*?&]/',  // Al menos un carácter especial
        ],
    ],[
        'password.regex' => 'La contraseña debe incluir al menos una letra mayúscula, una minúscula, un número y un carácter especial.',
    ]);

    // Verificar que la contraseña actual sea correcta
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->with('error', 'La contraseña actual no es correcta.');
    }

    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save(); 
    return redirect()->back()->with('success', 'Datos actualizados correctamente.');

}
  
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('usuario.index')->with('success', 'Datos eliminados correctamente');        

    } 
}