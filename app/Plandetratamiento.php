<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plandetratamiento extends Model
{
    protected $table = 'plandetratamientos';
    protected $primaryKey = 'plandetratamientos_id';

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'paciente_id', 'paciente_id');
    }

    
    public function tratamiento()
    {
        return $this->hasOne(Tratamiento::class, 'tratamiento_id', 'tratamiento_id');
    }

   
    public function user()
    {
        return $this->hasOne(User::class, 'User_id', 'User_id');
    }

    public function cita()
    {
     return $this->hasMany(Cita::class, 'plandetratamientos_id', 'plandetratamientos_id');
    }
   

}
