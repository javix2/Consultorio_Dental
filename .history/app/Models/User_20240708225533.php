<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function adminlte_image()
    {
        // $user = Auth::user();
        // $imageData = $user->image;

        // return response()->make($imageData);

        //  return 'https://picsum.photos/300/300';
        // Verificar si el usuario tiene una imagen de perfil
        if ($this->image) {
            // Devolver la URL de la imagen de perfil almacenada en la base de datos
            return asset('storage' . $this->image); // Ajusta la ruta según tu estructura de almacenamiento de imágenes
        } else {
            // Si el usuario no tiene una imagen de perfil, mostrar una imagen por defecto
            return asset('img/fff.png'); // Ruta de la imagen por defecto
        }
    }
    public function adminlte_desc()
    {
        return 'Administrador';
    }
}
