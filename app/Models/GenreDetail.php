<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenreDetail extends Model
{
    use HasFactory;
    public function game()
{
    return $this->belongsTo(Game::class, 'game_id');
}

public function genre()
{
    return $this->belongsTo(Genre::class, 'genre_id');
}

}
