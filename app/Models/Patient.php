<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        "ci",
        "nombre",
        "paterno",
        "materno",
        "celular",
        "direccion",
        "expe",
        "fecha_nac",
        "genero",
        "edad",

    ];
    //relacion uno a muchos
    public function odontograms(){
        return $this->hasMany(Odontogram::class);
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    public function record_treatms(){
        return $this->hasMany(RecordTreatm::class);
    }

    //relacion uno a uno
    public function record(){
        return $this->belongsTo(Record::class);
    }
}
