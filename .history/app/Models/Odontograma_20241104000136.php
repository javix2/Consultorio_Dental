<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\Dental;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Odontograma extends Model
{
    use HasFactory;

    protected $fillable = [
        "num_diente",
        "lado_diente",
        "estado",
        "nota"
    ];
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
    
}
