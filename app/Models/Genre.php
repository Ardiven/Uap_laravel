<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{


    public function genreDetails(){
        return $this->hasMany(GenreDetail::class);
    }
    // App\Models\Genre.php
    public function game()
    {
        return $this->belongsToMany(Game::class, 'genre_details', 'genre_id', 'game_id');
    }

}
