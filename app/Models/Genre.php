<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function genreDetails(){
        return $this->hasMany(GenreDetails::class);
    }
}
