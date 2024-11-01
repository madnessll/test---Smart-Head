<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $table = "movies";
    protected $guarded = false;
    public $timestamps = false;

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }

    public function publish()
    {
        $this->update(['is_published' => true]);
    }
}
