<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'Role_id';
    public function users()
    {
     return $this->hasMany(User::class, 'User_id', 'User_id');
    }
}
