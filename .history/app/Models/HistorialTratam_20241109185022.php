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
        'paciente_id',
        'tratamiento_id', 
        'monto_total',
        'saldo',
        'cuota',
    ];

    public function Pagos()
    {
        return $this->hasMany(Pago::class);
    }

}
