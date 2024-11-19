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
    public function edit()
    {
        // $user = User::findOrFail($id); // Buscar el usuario
        // return view('perfil.index', compact('user')); // Pasar el usuario a la vista
        $user = Auth::user();
        return view('perfil.index', compact('user'));
    }

public function update(Request $request, $id)
{
    // Obtener el usuario después de validar la existencia
    $user = User::findOrFail($id);

    // Validar los campos, incluyendo la verificación de la contraseña actual
    $request->validate([
        'current_password' => [
            'required',
            function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('La contraseña actual no es correcta.');
                }
            },
        ],
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|min:8|confirmed',
    ]);

    // Actualizar los datos del usuario
    $user->name = $request->name;
    $user->email = $request->email;

    // Solo actualizar la contraseña si se proporcionó una nueva
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->back();

}






// public function update(Request $request, $id)
// {
//     $user = User::findOrFail($id);

//     // Validar los campos
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email,'.$id,
//         'current_password' => 'required',
//         'password' => 'nullable|min:8|confirmed'
//     ]);

//     // Verificar la contraseña actual
//     if (!Hash::check($request->current_password, $user->password)) {
//         return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
//     }

//     // Actualizar los datos del usuario
//     $user->name = $request->name;
//     $user->email = $request->email;

//     if ($request->filled('password')) {
//         $user->password = bcrypt($request->password);
//     }

//     $user->save();

//     return redirect()->route('perfil.index')->with('success', 'Usuario actualizado exitosamente');
// }

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