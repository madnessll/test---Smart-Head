@extends('layouts.header_and_footer')
@section('title', 'Добавить фильм')
@section('content')

<body>
  <section class="content">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
      <div class="row">
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="mb-2">Название фильма</label>
            <input type="text" name="title" class="form-control border-0" id="exampleInputEmail1"
              placeholder="Введите название" value="{{ old('title') }}">
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="poster_url" class="mb-2">Загрузить постер</label>
            <input type="file" name="poster_url" class="form-control">
          </div>

          <div class="form-group mb-2">
            <label>Выберите жанры</label>
            <div class="mb-2">Чтобы выбрать несколько удерживайте shift</div>
            <select name="genres[]" class="form-control" multiple>
              @foreach($genres as $genre)
              <option value="{{ $genre->id }}">{{ $genre->name }}</option>
              @endforeach
            </select>
            @error('genres')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mt-5">
            <input type="submit" class="btn btn-block btn-success" value="Добавить">
          </div>
          <div class="mt-4">
            <a href="{{ route('movies.index') }}" class="btn btn-block btn-secondary">Назад</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>
@endsection