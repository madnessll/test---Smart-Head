@extends('layouts.header_and_footer')
@section('title', 'Запись фильма')
@section('content')

<div class="content-wrapper text-light">
  <section class="content">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
      <div class="row">
        <div class="">
          <div class="mt-5 mb-3">Название: {{ $movie->title }}</div>
        </div>
        <div class="">
          <div class="">Картинка:</div>
          <img style="height: 400px;" src="{{ url('storage/' . $movie->poster_url) }}" class="mt-2"></img>
        </div>
        <div class="mt-3">
          <div class="mb-2">Жанры:</div>
          <ul class="list-unstyled">
            @foreach($movie->genres as $genre)
            <li>-- {{ $genre->name }}</li>
            @endforeach
          </ul>
        </div>
        <div class="ml-5 col-1 pb-5">
          <a href="{{ route('movies.index') }}" class="btn btn-block btn-dark btn-custom">Назад</a>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection