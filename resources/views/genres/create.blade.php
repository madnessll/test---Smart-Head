@extends('layouts.header_and_footer')
@section('title', 'Добавить жанр')
@section('content')

<body>
  <section class="content">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
      <div class="row">
        <form action="{{ route('genres.store') }}" method="POST" style="width: 300px">
          @csrf
          <div class="form-group mb-4">
            <label for="exampleInputEmail1">Нейминг категории</label>
            <input type="text" name="name" class="form-control border-0" id="exampleInputEmail1"
              placeholder="Введи название" value="{{ old('name') }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-1 mt mb-4">
            <input type="submit" class="btn btn-block btn-dark btn-custom" value="Добавить">
          </div>
          <div class="ml-5 col-1 pb-5">
            <a href="{{ route('genres.index') }}" class="btn btn-block btn-secondary">Назад</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>
@endsection