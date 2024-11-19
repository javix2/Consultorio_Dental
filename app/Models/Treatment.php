<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion",
        "precio",
    ];
    //relacion uno a muchos inversa
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    //relacion uno a muchos
    public function record_treatments(){
        return $this->hasMany(RecordTreatm::class);
    }
}

