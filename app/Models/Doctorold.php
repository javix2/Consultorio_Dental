<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorold extends Model
{
    use HasFactory;

    protected $table = 'doctor';
    
    protected $primarykey = 'iddoctor';
    
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'direccion',
        'celular',
        'ci',
        'exped',
        'usuario',
        'contraseña'
    ];
    protected $guarded =[
        
    ];

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class);
    }
}
