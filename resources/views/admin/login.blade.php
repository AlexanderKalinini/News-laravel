@extends('layout.layout')

@section('title')
  Admin login
@endsection

@section('content')
  <div class="flex h-screen flex-col items-center justify-center space-y-10 bg-white">
    <div class="w-96 rounded bg-white p-5 shadow-xl">
      <h1 class="text-center text-3xl font-medium">Вход в административную панель</h1>

      <form method="POST" action={{ route('admin.login_process') }} class="mt-5 space-y-5">
        @csrf
        <input name="email" type="text" value="{{ old('email') }}"
          class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Email" />
        @error('email')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
        <input name="password" type="password" class="h-12 w-full rounded border border-gray-800 px-3"
          placeholder="Пароль" />
        @error('password')
          <p class="text-red-500">{{ $message }}</p>
        @enderror

        <button type="submit" class="w-full rounded-md bg-blue-900 py-3 text-center font-medium text-white">
          Войти
        </button>
      </form>
    </div>
  </div>
@endsection
