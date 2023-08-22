<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Blog</title>

</head>

<body>
  <div class="flex h-screen flex-col items-center justify-center space-y-10 bg-white">
    <div class="w-96 rounded bg-white p-5 shadow-xl">
      <h1 class="text-3xl font-medium">Вход</h1>

      <form method="POST" action="" class="mt-5 space-y-5">
        <input name="email" type="text" value="{{ old('email') }}"
          class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Email" />
        <input name="password" type="password" class="h-12 w-full rounded border border-gray-800 px-3"
          placeholder="Пароль" />
        <button type="submit"
          class="w-full rounded-md bg-blue-900 py-3 text-center font-medium text-white">Войти</button>
      </form>
    </div>
  </div>
</body>

</html>
