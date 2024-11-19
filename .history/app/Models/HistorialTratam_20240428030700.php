<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistorialTratam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'estado',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function tratamiento()
    {
        return $this->belongsTo(tratamiento::class);
    }
    public function sesions()
    {
        return $this->hasMany(Sesion::class);
    }
}
