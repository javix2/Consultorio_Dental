<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'paciente_id',
        'tratamiento_id', 
        'monto',
        'fecha_pago',
        'completado',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class);
    }
    // public function cuotas()
    // {
    //     return $this->hasMany(cuota::class);
    // }
}
