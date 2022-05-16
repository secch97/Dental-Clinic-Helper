<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    public function users()
    {
     return $this->hasOne(User::class);
    }

    public function categoria()
    {
     return $this->hasOne(Categoria::class);
    }

    public function publicacionusers()
    {
        return $this->hasMany(PublicacionUser::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
