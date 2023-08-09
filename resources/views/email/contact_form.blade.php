@extends('layout.layout')

@section('title')
  Contact form
@endsection
@section('content')
  @include('layout.partials.nav')

  <div class="flex h-screen flex-col items-center justify-center space-y-10 bg-white">
    <div class="w-96 rounded bg-white p-5 shadow-xl">
      <h1 class="text-3xl font-medium">Свяжитесь со мной</h1>
      <form class="mt-5 space-y-5" method="POST" action={{ route('sendContactForm') }}>
        @csrf
        <input name="email" type="text" class="h-12 w-full rounded border border border-gray-800 border-red-500 px-3"
          placeholder="Email" />
        <p class="text-red-500">Ошибка</p>

        <input name="text" type="text" class="h-12 w-full rounded border border-gray-800 px-3"
          placeholder="Сообщение" />

        <button type="submit"
          class="w-full rounded-md bg-blue-900 py-3 text-center font-medium text-white">Написать</button>
      </form>
    </div>
  </div>
@endsection
