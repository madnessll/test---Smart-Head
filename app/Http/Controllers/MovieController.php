<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Services\MovieService;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
  protected $movieService;

  public function __construct(MovieService $movieService)
  {
    $this->movieService = $movieService;
  }

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
    $this->movieService->createMovie($data);
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
    $this->movieService->updateMovie($movie, $data);
    return redirect()->route('movies.index');
  }


  public function delete(Movie $movie)
  {

    $this->movieService->deleteMovie($movie);
    return redirect()->route('movies.index');
  }


  public function publish(Movie $movie)
  {
    $movie->update(['is_published' => true]);

    return redirect()->route('movies.index');
  }
}
