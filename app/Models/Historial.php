<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'paciente_id','distrto','no_hc','fecha_aper','apoderado',
        'parentesco','direccion','celular','motivo','enf_act','alergias',
        'medicamentos','hab_alimen','hab_higiene','tabaco','otro','cardiovas',
        'pulmonares','renales','renales','gastrointes','endocrinas','osteoarticu',
        'metabolicas','infecciosas','interve_prev','notas'

    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
