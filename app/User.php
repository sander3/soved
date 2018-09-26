<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Soved\Laravel\Magic\Auth\Traits\CanMagicallyLogin;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Soved\Laravel\Magic\Auth\Contracts\CanMagicallyLogin as CanMagicallyLoginContract;

class User extends Authenticatable implements CanMagicallyLoginContract
{
    use Notifiable, CanMagicallyLogin;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
