<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Developer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function game(){
        return $this->hasMany(Game::class);
    }
    
}
