<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenreDetails extends Model
{
    use HasFactory;
    public function game()
    {
        return $this->belongsTo(Games::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
