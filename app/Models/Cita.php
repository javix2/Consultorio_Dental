<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    const ESTADOS = ['Por atender', 'Atendida', 'Cancelada', 'Reprogramada'];
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'paciente_id',
        'doctor_id', 
        'tratamiento_id', 
        'fecha',
        'hora_inicial',
        'motivo',
        'estado',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function tratamiento()
    {
        return $this->belongsTo(tratamiento::class);
    }
}
