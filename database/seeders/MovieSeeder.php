<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MovieSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $movies = [
      ['title' => 'Общество онор', 'poster_url' => 'onor.jpg'],
      ['title' => 'Переводчик', 'poster_url' => 'translator.jpg'],
      ['title' => 'Sheker', 'poster_url' => 'sheker.jpg'],
      ['title' => 'Основатель', 'poster_url' => 'founder.jpg'],
    ];

    foreach ($movies as $movieData) {
      $posterPath = isset($movieData['poster']) && $movieData['poster']
      ? 'posters/' . $movieData['poster']
      : 'default_poster.jpg';


      if (!Storage::exists('public/' . $posterPath)) {
        $posterPath = 'posters/default_poster.jpg';
      }

      Movie::create([
        'title' => $movieData['title'],
        'is_published' => false, 
        'poster_url' => $posterPath,
      ]);
    }
  }
}
