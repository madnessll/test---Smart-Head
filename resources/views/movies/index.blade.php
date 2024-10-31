@extends('layouts.header_and_footer')
@section('title', 'Фильмы')
@section('content')


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col text-center">
        <a href="{{ route('movies.create') }}" class="btn btn-primary mt-5 mb-5">Добавить новый фильм</a>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap mx-auto table-dark" style="max-width: 100%; margin-bottom: 0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Опубликовано</th>
                  <th colspan="3" class="text-center">Действия</th>
                </tr>
              </thead>
              <tbody>
                @foreach($movies as $movie)
                <tr>
                  <td>{{ $movie->id }}</td>
                  <td>{{ $movie->title }}</td>
                  <td>{{ $movie->is_published ? 'Да' : 'Нет' }}</td>
                  <td class="text-center">
                    <a href="{{ route('movies.show', $movie->id) }}"><i class="far fa-eye"></i></a>
                  </td>
                  <td class="text-center">
                    <a href="{{ route('movies.edit', $movie->id) }}"><i class="fas fa-pencil-alt"></i></a>
                  </td>
                  <td class="text-center">
                    <form action="{{ route('movies.delete', $movie->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('delete')
                      <button type="submit" class="border-0 bg-transparent">
                        <i class="fas fa-trash text-danger" role="button"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="text-center mb-5 mt-5">
        <a href="{{ route('main.index') }}" class="btn btn-secondary">Назад</a>
      </div>
    </div>
  </div>
</section>



</body>

</html>
@endsection