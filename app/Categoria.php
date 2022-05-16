<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function publicacions()
    {
        return $this->hasMany(Publicacion::class);
    }
}
