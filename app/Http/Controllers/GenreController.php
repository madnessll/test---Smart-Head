<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
  public function index()
  {
    $genres = Genre::all();
    return view("genres.index", compact("genres"));
  }

  public function create()
  {
    return view('genres.create');
  }

  public function store(GenreRequest $request)
  {
    $data = $request->validated();

    Genre::create($data);

    return redirect()->route('genres.index');
  }

  public function show(Genre $genre)
  {
    return view('genres.show', compact('genre'));
  }

  public function edit(Genre $genre)
  {
    return view('genres.edit', compact('genre'));
  }

  public function update(GenreRequest $request, Genre $genre)
  {
    $data = $request->validated();
    $genre->update($data);
    return redirect()->route("genres.show", $genre->id);
  }

  public function delete(Genre $genre)
  {
    $genre->delete();
    return redirect()->route('genres.index');
  }
}
