<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenreDetails extends Model
{
    public function game()
    {
        return $this->belongsTo(Games::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
