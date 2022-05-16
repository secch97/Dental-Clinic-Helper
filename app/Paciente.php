<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'paciente_id';

    public function Plandetratamiento()
    {
     return $this->hasMany(Plandetratamiento::class, 'paciente_id', 'paciente_id');
    }
}
