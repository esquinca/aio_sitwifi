<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'itconcierges';

    protected $fillable = [
        'Nombre', 'Privilegio', 'jefedirecto_id','Nickname', 'email', 'avatar', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }
}
