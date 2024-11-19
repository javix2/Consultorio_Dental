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
    // public function index2()
    // {
    //     return view('perfil.index2');  
          
    // }
    // public function updateImage(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validaciones de imagen
    //     ]);

    //     // Obtén el usuario autenticado
    //     $user = User::findOrFail($id);

    //     // Verifica que se haya cargado el archivo
    //     if ($request->hasFile('image')) {
    //         // Guarda la imagen en 'public/storage/profiles'
    //         $path = $request->file('image')->store('profiles', 'public');

    //         // Guarda el path de la imagen en el usuario y luego guarda el usuario
    //         $user->profile_image = $path;
    //         $user->save(); // Esto debería funcionar si $user es una instancia válida del modelo User
    //     }

    //     return redirect()->back()->with('success', 'Imagen de perfil actualizada correctamente.');

    // }
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