<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class games extends Model
{

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
}
