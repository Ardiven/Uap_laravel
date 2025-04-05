<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class games extends Model
{
    use HasFactory;

    public function genre(): HasMany
    {
        return $this->hasMany(GenreDetails::class);
    }
    public function library()
    {
        return $this->hasMany(Library::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function developer()
    {
        return $this->belongsTo(developers::class);
    }
    // App\Models\Games.php
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_details', 'games_id', 'genre_id');
    }

}
