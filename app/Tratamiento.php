<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $table = 'tratamientos';
    protected $primaryKey = 'tratamiento_id';

    public function Plandetratamiento()
    {
     return $this->hasMany(Plandetratamiento::class, 'tratamiento_id', 'tratamiento_id');
    }
}
