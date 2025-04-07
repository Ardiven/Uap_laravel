<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class screenshoot extends Model
{
    public function game(){
        return $this->belongsTo(Game::class);
    }
}
