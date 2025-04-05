<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function game(){
        return $this->belongsTo(Games::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
