<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistorialTratam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'paciente_id',
        'tratamiento_id', 
        'monto_total',
        'saldo',
        'cuota',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function tratamiento()
    {
        return $this->belongsTo(tratamiento::class);
    }
    public function pagos()
    {
        return $this->hasMany(Pago::class, 'historial_tratams_id');
    }
    public function sesions()
    {
        return $this->hasMany(Sesion::class, 'historial_tratams_id');
    }
}
