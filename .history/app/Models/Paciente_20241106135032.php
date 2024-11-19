<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Odontograma;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ci',
        'expe',
        'nombre',
        'paterno',
        'materno',
        'celular',
        'direccion',
        'fecha_nac',
        'genero',
        'edad',
    ];
    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
    public function historial()
    {
        return $this->hasMany(Historial::class);
    }
    public function odontogramas(){
        return $this->hasMany(Odontograma::class, 'id_paciente');
    }

    // protected $table = 'paciente';
    
    // protected $primarykey = 'idpaciente';
    
    // public $timestamps = false;

    
    // protected $guarded =[
        
    // ];
    
}
