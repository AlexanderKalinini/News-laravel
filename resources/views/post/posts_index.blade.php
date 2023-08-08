@extends('layout.layout')
@section('title')
  Home
@endsection
@section('content')
  <nav
    class="flex w-full flex-col content-center bg-white px-6 py-2 text-center font-sans shadow sm:flex-row sm:items-baseline sm:justify-between sm:text-left">
    <div class="inner mb-2 sm:mb-0">
      <a href={{ route('home') }}
        class="text-grey-darkest hover:text-blue-dark font-sans text-2xl font-bold no-underline">Home</a><br>
      <span class="text-grey-dark text-xs">Заголовок</span>
    </div>

    <div class="self-center sm:mb-0">
      @auth('web')
        <a href={{ route('logout') }} class="text-md text-grey-darker hover:text-blue-dark ml-2 px-1 no-underline">
          Выйти</a>
      @endauth

      @guest('web')
        <a href={{ route('login') }} class="text-md text-grey-darker hover:text-blue-dark ml-2 px-1 no-underline">
          Войти</a>
      @endguest
      <!--
                                <a href="#" class="text-md text-grey-darker hover:text-blue-dark ml-2 px-1 no-underline">Выйти</a>
                                -->
    </div>
  </nav>

  <div class="mb-20 mt-10 grid grid-cols-1 gap-10 md:grid-cols-3">

    @foreach ($posts as $post)
      <div class="max-w-xl px-4 py-8">
        <div class="bg-white shadow-2xl">
          <div>
            <a href="#">
              <img src="https://via.placeholder.com/600" alt="Post 1" />
            </a>
          </div>

          <div class="mt-2 bg-white px-4 py-2">
            <h2 class="text-2xl font-bold text-gray-800">{{ $post->title }}</h2>

            <p class="my-3 mr-1 px-2 text-xs text-gray-700 sm:text-sm">
              {{ $post->preview }}
            </p>
          </div>
        </div>
      </div>
    @endforeach
    {{ $posts->links() }}
  </div>
@endsection
