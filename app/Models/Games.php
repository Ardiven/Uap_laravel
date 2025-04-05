<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class games extends Model
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
        return $this->belongsTo(developers::class);
    }
    // App\Models\Games.php
    public function genreDetails()
    {
        return $this->hasMany(GenreDetails::class, 'games_id');
    }
    
    // Akses langsung ke Genre lewat relasi genreDetails
    public function genres()
    {
        return $this->hasManyThrough(
            Genre::class,           // Target model
            GenreDetails::class,    // Perantara
            'games_id',             // FK di GenreDetails yang mengarah ke Games
            'id',                   // PK di Genre (tujuan akhir)
            'id',                   // PK di Games (sumber)
            'genre_id'              // FK di GenreDetails yang mengarah ke Genre
        );
    }
    

}
