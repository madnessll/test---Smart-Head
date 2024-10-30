@extends('layouts.header_and_footer')
@section('title', 'Жанр')
@section('content')
<div class="content-wrapper text-light">
  <section class="content">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
      <div class="row">
        <div class="col-12 ml-5">
          <div class="mt-5 mb-3">Название: {{ $genre->name }}</div>
          {{-- <div class="mt-2 mb-5">{{ $genre->name }}</div> --}}
        </div>
        <div class="ml-5 col-1 pb-5">
          <a href="{{ route('genres.index') }}" class="btn btn-block btn-dark btn-custom">Назад</a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection