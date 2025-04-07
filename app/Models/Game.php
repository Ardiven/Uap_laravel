<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class game extends Model
{
    use HasFactory;


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
        return $this->belongsTo(developer::class);
    }
    // App\Models\Games.php
    public function genreDetails()
    {
        return $this->hasMany(GenreDetail::class, 'game_id');
    }
    
    // Akses langsung ke Genre lewat relasi genreDetails
    public function genres()
    {
        return $this->hasManyThrough(
            Genre::class,           // Target model
            GenreDetail::class,    // Perantara
            'game_id',             // FK di GenreDetails yang mengarah ke Games
            'id',                   // PK di Genre (tujuan akhir)
            'id',                   // PK di Games (sumber)
            'genre_id'              // FK di GenreDetails yang mengarah ke Genre
        );
    }
    

}
