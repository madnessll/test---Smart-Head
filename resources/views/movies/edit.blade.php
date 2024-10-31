@extends('layouts.header_and_footer')
@section('title', 'Редактирование фильма')
@section('content')

<section class="content">
  <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
    <div class="row">
      <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group mb-3">
          <label for="exampleInputpost">Название фильма</label>
          <input type="text" name="title" class="form-control border-0" id="exampleInputpost"
            placeholder="Введи название" value="{{ $movie->title }}">
          @error('title')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mt-3">
          <div>Текущая картинка</div>
          <img style=" height: 400px;" src="{{ url('storage/' . $movie->poster_url) }}" class=""></img>
          <div class="form-group mb-3 mt-3">
            <label for="poster_url" class="mb-2">Загрузить постер</label>
            <input type="file" name="poster_url" class="form-control">
          </div>
        </div>

        <div class="form-group mb-3 col-12">
          <label class="mb-3">Выберите жанры</label>
          <div class="mb-3">Те жанры, которые помечены серым уже выбраны</div>
          <select name="genres[]" class="form-control" multiple>
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}" @if($movie->genres->contains($genre->id)) selected @endif>
              {{ $genre->name }}
            </option>
            @endforeach
          </select>
          @error('genres')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>


        <div class="form-group col-1 mt mb-3">
          <input type="submit" class="btn btn-block btn-dark btn-custom" value="Изменить">
        </div>
        <div class="ml-5 col-1 pb-5">
          <a href="{{ route('movies.index') }}" class="btn btn-block btn-secondary">Назад</a>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection