<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $table = "genres";
    protected $guarded = false;
    public $timestamps = false;
    
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'genre_movie');
    }
}
