<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odontogram extends Model
{
    use HasFactory;
    protected $fillable = [
        "numero_diente",
        "estado",
        "patient_id"
    ];
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
