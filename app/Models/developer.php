<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class developer extends Model
{
    public function game(){
        return $this->hasMany(Game::class);
    }
    
}
