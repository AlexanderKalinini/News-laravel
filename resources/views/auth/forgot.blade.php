@extends('layout.layout')

@section('title')
  Forgot password
@endsection
@section('content')
  <div class="flex h-screen flex-col items-center justify-center space-y-10 bg-white">
    <div class="w-96 rounded bg-white p-5 shadow-xl">
      <h1 class="text-3xl font-medium">Восстановление пароля</h1>
      <form class="mt-5 space-y-5" method="POST" action={{ route('forgot_proc') }}>
        @csrf
        <input name="email" type="text" class="h-12 w-full rounded border px-3" placeholder="Email"
          value="{{ old('email') }}" />
        @error('email')
          <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div>
          <a href={{ route('login') }} class="rounded-md p-2 font-medium text-blue-900 hover:bg-blue-300">Вспомнил
            пароль</a>
        </div>
        <button type="submit"
          class="w-full rounded-md bg-blue-900 py-3 text-center font-medium text-white">Восстановить</button>
      </form>
    </div>
  </div>
@endsection
