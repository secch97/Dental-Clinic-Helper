<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacita extends Model
{
    protected $table = 'reservacitas';
    protected $primaryKey = 'reservaCitas_id';
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'User_id', 'User_id');
    }

    
    
}
