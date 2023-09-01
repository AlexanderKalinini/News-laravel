<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title', 'Blog') </title>
  <link rel="apple-touch-icon" sizes="180x180" href={{ asset('emblem.jpg') }} />
  <link rel="icon" type="image/jpg" sizes="32x32" href={{ asset('emblem.jpg') }} />
  <link rel="icon" type="image/jpg" sizes="16x16" href={{ asset('mblem.jpg') }} />
  @vite('resources/css/app.css')
</head>

@yield('content')

</html>
