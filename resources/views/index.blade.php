<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Blog</title>

</head>

<body>
  <nav
    class="flex w-full flex-col content-center bg-white px-6 py-2 text-center font-sans shadow sm:flex-row sm:items-baseline sm:justify-between sm:text-left">
    <div class="inner mb-2 sm:mb-0">
      <a href="#" class="text-grey-darkest hover:text-blue-dark font-sans text-2xl font-bold no-underline">Laravel с
        нуля</a><br>
      <span class="text-grey-dark text-xs">Уроки от CutCode</span>
    </div>

    <div class="self-center sm:mb-0">
      <a href="#" class="text-md text-grey-darker hover:text-blue-dark ml-2 px-1 no-underline">Войти</a>

      <!--
            <a href="#" class="text-md text-grey-darker hover:text-blue-dark ml-2 px-1 no-underline">Выйти</a>
            -->
    </div>
  </nav>

  <div class="mb-20 mt-10 grid grid-cols-1 gap-10 md:grid-cols-3">

    <div class="max-w-xl px-4 py-8">
      <div class="bg-white shadow-2xl">
        <div>
          <a href="#">
            <img src="https://via.placeholder.com/600" alt="Post 1" />
          </a>
        </div>

        <div class="mt-2 bg-white px-4 py-2">
          <h2 class="text-2xl font-bold text-gray-800">Post 1</h2>

          <p class="my-3 mr-1 px-2 text-xs text-gray-700 sm:text-sm">
            Post preview description
          </p>
        </div>
      </div>
    </div>

    <div class="max-w-xl px-4 py-8">
      <div class="bg-white shadow-2xl">
        <div>
          <a href="#">
            <img src="https://via.placeholder.com/600" alt="Post 2" />
          </a>
        </div>

        <div class="mt-2 bg-white px-4 py-2">
          <h2 class="text-2xl font-bold text-gray-800">Post 2</h2>

          <p class="my-3 mr-1 px-2 text-xs text-gray-700 sm:text-sm">
            Post preview description
          </p>
        </div>
      </div>
    </div>

  </div>
</body>

</html>
