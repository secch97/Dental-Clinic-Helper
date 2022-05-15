<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'citas_id';
    public $timestamps = false;

    public function plandetratamiento()
    {
        return $this->hasOne(Plandetratamiento::class, 'plandetratamientos_id', 'plandetratamientos_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'User_id', 'User_id');
    }

    
    
}
