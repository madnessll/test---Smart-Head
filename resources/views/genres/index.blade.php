@extends('layouts.header_and_footer')
@section('title', 'Жанры')
@section('content')


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col text-center">
        <a href="{{ route('genres.create') }}" class="btn btn-primary mt-5 mb-5">Добавить новый жанр</a>
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
                  <th colspan="3" class="text-center">Действия</th>
                </tr>
              </thead>
              <tbody>
                @foreach($genres as $genre)
                <tr>
                  <td>{{ $genre->id }}</td>
                  <td>{{ $genre->name }}</td>
                  <td class="text-center">
                    <a href="{{ route('genres.show', $genre->id) }}"><i class="far fa-eye"></i></a>
                  </td>
                  <td class="text-center">
                    <a href="{{ route('genres.edit', $genre->id) }}"><i class="fas fa-pencil-alt"></i></a>
                  </td>
                  <td class="text-center">
                    <form action="{{ route('genres.delete', $genre->id) }}" method="POST" style="display:inline;">
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