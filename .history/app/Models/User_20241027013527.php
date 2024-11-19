<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Model;
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
        // return $this->hasOne(Doctor::class);
        return $this->belongsTo(Paciente::class);

    }

    public function adminlte_image()
    {
        // $user = Auth::user();
        // $imageData = $user->image;

        // return response()->make($imageData);

        //  return 'https://picsum.photos/300/300';
        
        // Verifica si el usuario tiene una imagen almacenada
        if ($this->image) {
            // Retorna la URL completa de la imagen almacenada en `storage`
            return Storage::url($this->image); // Utiliza Storage::url para obtener la URL correcta
        }

        // Si no tiene una imagen, retorna una imagen por defecto
        return asset('images/default-profile.png'); // Cambia a la ruta de tu imagen por defecto
    
        
    }
    public function adminlte_desc()
    {
        return 'Administrador';
    }
}
