@extends('layout.layout')

@section('title')
  Login
@endsection

@section('content')
  <div class="flex h-screen flex-col items-center justify-center space-y-10 bg-white">
    <div class="w-96 rounded bg-white p-5 shadow-xl">
      <h1 class="text-3xl font-medium">Вход</h1>

      <form method="POST" action={{ route('log_proc') }} class="mt-5 space-y-5">
        @csrf
        <input name="email" type="text" class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Email"
          value="{{ old('email') }}" />

        <input name="password" type="password" class="h-12 w-full rounded border border-gray-800 px-3"
          placeholder="Пароль" />
        @error('password')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
        @error('email')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div>
          <a href={{ route('forgot') }} class="rounded-md p-2 font-medium text-blue-900 hover:bg-blue-300">Забыли
            пароль?</a>
        </div>

        <div>
          <a href={{ route('reg') }} class="rounded-md p-2 font-medium text-blue-900 hover:bg-blue-300">Регистрация</a>
        </div>

        <button type="submit" class="w-full rounded-md bg-blue-900 py-3 text-center font-medium text-white">
          Войти
        </button>
      </form>
    </div>
  </div>
@endsection
