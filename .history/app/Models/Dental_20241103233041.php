<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dental extends Model
{
    use HasFactory;

    // Define la tabla si el nombre no sigue la convención plural de Laravel
    protected $table = 'dentals';

    // Define los campos que son asignables en masa
    protected $fillable = [
        'num_diente',
        'lado_diente',
        'estado',
    ];

    // Define la relación con el modelo Odontograma
    public function odontogramas()
    {
        return $this->hasMany(Odontograma::class);
    }
}
