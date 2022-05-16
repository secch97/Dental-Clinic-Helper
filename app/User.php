<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'nombre', 'usuario', 'email', 'password',
    ];

    protected $primaryKey = 'User_id';
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne(Role::class, 'Role_id', 'Role_id');
    }

     public function isRole()
     {
        return $this->Role_id;
     }

     public function plandetratamiento()
     {
      return $this->hasMany(Plandetratamiento::class, 'User_id', 'User_id');
     }

     public function cita()
     {
      return $this->hasMany(Cita::class, 'User_id', 'User_id');
     }

     public function reservacita()
     {
      return $this->hasMany(Reservacita::class, 'User_id', 'User_id');
     }


    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
