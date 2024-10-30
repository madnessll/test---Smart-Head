<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Главная страница</title>
  
  <link rel="stylesheet" href="{{ asset('css/my.css') }}" />
</head>
<body>
  <section class="main">
    <h2 class="main__title">Главная страница</h2>
    <div class="main__links">
      <a href="{{ route('genres.index') }}" class="main__link">Жанры</a>
      <a href="#" class="main__link">Фильмы</a>
    </div>
  </section>
</body>
</html>