<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class GenreMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = Movie::all();

        foreach ($movies as $movie) {
            $genreIds = Genre::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $movie->genres()->attach($genreIds);
        }
    }
}
