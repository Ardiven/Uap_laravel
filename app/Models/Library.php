<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{

    protected $fillable = ['user_id', 'game_id', 'rating'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
