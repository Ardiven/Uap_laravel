<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class developers extends Model
{
    public function game(){
        return $this->hasMany(Games::class);
    }
    
}
