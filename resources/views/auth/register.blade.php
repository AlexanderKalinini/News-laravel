@extends('layout.layout')
@section('title')
  Registration
@endsection
@section('content')
  <div class="flex h-screen flex-col items-center justify-center space-y-10 bg-white">
    <div class="w-96 rounded bg-white p-5 shadow-xl">
      <h1 class="text-3xl font-medium">Регистрация</h1>

      <form action={{ route('reg_process') }} class="mt-5 space-y-5" method="POST">
        @csrf
        <input name="name" value="{{ old('name') }}" type="text"
          class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Имя" />
        @error('name')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
        <input name="email" value="{{ old('email') }}" type="text"
          class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Email" />
        @error('email')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
        <input name="password" type="password" class="h-12 w-full rounded border border-gray-800 px-3"
          placeholder="Пароль" />
        @error('password')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
        <input name="password_confirmation" type="password" class="h-12 w-full rounded border border-gray-800 px-3"
          placeholder="Подтверждение пароля" />
        @error('password_confirmation')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div>
          <a href={{ route('login') }} class="rounded-md p-2 font-medium text-blue-900 hover:bg-blue-300">Есть
            аккаунт?</a>
        </div>

        <button type="submit"
          class="w-full rounded-md bg-blue-900 py-3 text-center font-medium text-white">Зарегистрироваться</button>
      </form>
    </div>
  </div>
@endsection
