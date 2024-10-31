<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Genre; // Необходимо для получения жанров
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $faker = Faker::create('ru_RU');

    $genres = Genre::all();

    for ($i = 0; $i < 200; $i++) {
      $title = $faker->sentence(rand(2, 5)); 

      $randomGenres = $genres->random(rand(1, 3))->pluck('id');

      $posterPath = 'posters/default_poster.jpg';

      $movie = Movie::create([
        'title' => $title,
        'is_published' => false,
        'poster_url' => $posterPath,
      ]);

      $movie->genres()->attach($randomGenres);
    }
  }
}
