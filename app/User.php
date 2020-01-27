<?php

namespace App;

use App\Food\IngredientUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The ingredients that belong to the user.
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Food\Ingredient')
            ->using(IngredientUser::class)
            ->as('inventory')
            ->withPivot([
                'quantity', 'unit',
            ])
            ->withTimestamps();
    }
}
