<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
  public function index()
  {
    $movies = Movie::all();
    return view("movies.index", compact("movies"));
  }

  public function create()
  {
    $genres = Genre::all();
    return view('movies.create', compact('genres'));
  }

  public function store(MovieRequest $request)
  {
    $data = $request->validated();

    if ($request->hasFile('poster_url')) {
      $data['poster_url'] = $request->file('poster_url')->store('posters', 'public');
    } else {
      $data['poster_url'] = 'posters/default_poster.jpg';
    }
    $movie = Movie::create([
      'title' => $data['title'],
      'poster_url' => $data['poster_url'],
      'is_published' => false, 
    ]);

    if (!empty($data['genres'])) {
      $movie->genres()->attach($data['genres']);
    }
    return redirect()->route("movies.index");
  }

  public function show(Movie $movie)
  {
    return view('movies.show', compact('movie'));
  }

  public function edit(Movie $movie)
  {
    $genres = Genre::all();
    return view('movies.edit', compact('movie', 'genres'));
  }

  public function update(MovieRequest $request, Movie $movie)
  {
    $data = $request->validated();

    if ($request->hasFile('poster_url')) {

      if ($movie->poster_url && $movie->poster_url !== 'posters/default_poster.jpg') {
        Storage::delete($movie->poster_url);
      }

      $data['poster_url'] = $request->file('poster_url')->store('posters', 'public');
    }

    unset($data['genres']);

    $movie->update($data);

    if ($request->has('genres')) {
      $movie->genres()->sync($request->input('genres'));
    }

    return redirect()->route('movies.index');
  }


  public function delete(Movie $movie)
  {
    if ($movie->poster_url && $movie->poster_url !== 'posters/default_poster.jpg') {
      Storage::delete($movie->poster_url);
    }

    $movie->delete();

    return redirect()->route('movies.index');
  }
}
