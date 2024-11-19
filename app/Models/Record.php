<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
        "fecha_aper",
        "habitos_alim",
        "enfermedad_act",
        "alergias",
        "medicamento",
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
