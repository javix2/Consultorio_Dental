<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordTreatm extends Model
{
    use HasFactory;
    protected $fillable = [
        "fecha_pago",
        "monto",
        "saldo",
        "estado",
        "num_pieza",
    ];
    //relacion uno a muchos 
    public function records(){
        return $this->hasMany(Record::class);
    }
    //relacion uno a muchos inversa
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function treatment(){
        return $this->belongsTo(Treatment::class);
    }
}
