<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieService
{
  public function createMovie($data)
  {
    $movie = Movie::create([
      'title' => $data['title'],
      'poster_url' => $this->handlePosterUpload($data),
      'is_published' => false,
    ]);

    if (!empty($data['genres'])) {
      $movie->genres()->attach($data['genres']);
    }

    return $movie;
  }

  public function updateMovie($movie, $data)
  {
    if (isset($data['poster_url'])) {
      $this->deleteOldPoster($movie);
      $data['poster_url'] = $this->handlePosterUpload($data);
    }

    unset($data['genres']);
    $movie->update($data);

    if (isset($data['genres'])) {
      $movie->genres()->sync($data['genres']);
    }
  }

  public function deleteMovie($movie)
  {
    $this->deleteOldPoster($movie);
    $movie->delete();
  }

  protected function handlePosterUpload($data)
  {
    if (isset($data['poster_url'])) {
      return $data['poster_url']->store('posters', 'public');
    }
    return 'posters/default_poster.jpg';
  }

  protected function deleteOldPoster($movie)
  {
    if ($movie->poster_url && $movie->poster_url !== 'posters/default_poster.jpg') {
      Storage::delete($movie->poster_url);
    }
  }
}
