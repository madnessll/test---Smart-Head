<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Жанры</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
  integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/my.css') }}" />
</head>

<body>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col text-center mb-3">
        <a href="#" class="btn btn-primary mt-5 mb-5">Добавить</a>
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
                    <a href="#"><i class="far fa-eye"></i></a>
                  </td>
                  <td class="text-center">
                    <a href="#"><i class="fas fa-pencil-alt"></i></a>
                  </td>
                  <td class="text-center">
                    <form action="#" method="POST" style="display:inline;">
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
  </div>
</section>



</body>

</html>