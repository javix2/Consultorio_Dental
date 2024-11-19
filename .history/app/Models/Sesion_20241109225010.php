<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'historial_tratam_id',
        'fecha',
        'sesion',
        'medicamento',
        'descripcion',
        'estado',
    ];

    public function historialtrata()
    {
        return $this->belongsTo(HistorialTratam::class);
    }
}
