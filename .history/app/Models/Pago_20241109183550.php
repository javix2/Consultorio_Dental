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
        'historial_tratams_id', 
        'monto',
        'fecha',
        'estado',
    ];

    public function historial_tratams()
    {
        return $this->hasMany(HistorialTratam::class);
    }
    // public function tratamiento()
    // {
    //     return $this->belongsTo(Tratamiento::class);
    // }
    // public function cuotas()
    // {
    //     return $this->hasMany(cuota::class);
    // }
}
