<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicacionUser extends Model
{
    public function users()
    {
     return $this->hasOne(User::class);
    }

    public function publicacion()
    {
     return $this->hasOne(Publicacion::class);
    }
}
