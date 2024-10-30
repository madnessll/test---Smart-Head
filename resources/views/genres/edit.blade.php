@extends('layouts.header_and_footer')
@section('title', 'Редактирование жанра')
@section('content')

<section class="content">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
      <div class="row">
        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group mb-3">
            <label for="exampleInputpost">Название жанра</label>
            <input type="text" name="name" class="form-control border-0" id="exampleInputpost"
              placeholder="Введи название" value="{{ $genre->name }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-1 mt mb-3">
            <input type="submit" class="btn btn-block btn-dark btn-custom" value="Изменить">
          </div>
          <div class="ml-5 col-1 pb-5">
            <a href="{{ route('genres.index') }}" class="btn btn-block btn-secondary">Назад</a>
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection