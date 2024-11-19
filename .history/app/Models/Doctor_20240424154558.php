<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "ci",
        "nombre",
        "paterno",
        "materno",
        "celular",
        "direccion",
        "expe"

    ];
    //relacion uno a muchos
    public function citas(){
        return $this->hasMany(Cita::class);
    }
}
