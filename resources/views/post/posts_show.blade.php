@extends('layout.layout')
@section('title')
  {{ $post->title }}
@endsection
@section('content')
  @include('layout.partials.nav')
  <div class="m-0 mb-20 mt-10 flex justify-center gap-10">
    <div>
      <div class="max-w-xl px-4 py-8">
        <div class="bg-white shadow-2xl">
          <div>
            <img src={{ asset('storage/' . $post->thumbnail) }} alt="thumbnail" />
          </div>
          <div class="mt-2 bg-white px-4 py-2">
            <h2 class="text-2xl font-bold text-gray-800">{{ $post->title }}</h2>
            <p class="my-3 mr-1 px-2 text-xs text-gray-700 sm:text-sm">
              {{ $post->description }}
            </p>
          </div>
        </div>

        <div>
          <section class="mt-4 rounded-b-lg">
            <form method="POST" action={{ route('sendComment', ['post_id' => $post->id]) }}>
              @csrf
              <textarea name="text"
                class="focus:shadow-outline mb-4 w-full rounded-lg border border-0 border-red-500 p-4 text-2xl shadow-inner"
                placeholder="Ваш комментарий..." spellcheck="false"></textarea>
              @error('text')
                <p class="text-red-500">{{ $message }}</p>
              @enderror
              <button type="submit"
                class="w-full rounded-lg bg-purple-400 px-4 py-2 text-lg font-bold text-white shadow-md">Написать</button>
            </form>
            @foreach ($comments as $comment)
              <div id="task-comments" class="pt-4">
                <div
                  class="mb-4 flex flex-col items-center justify-center rounded-lg bg-white p-3 shadow-lg md:items-start">
                  <div class="mr-2 flex flex-row justify-center">
                    <h3 class="text-center text-lg font-semibold text-purple-600 md:text-left">{{ $comment->name }}
                    </h3>
                  </div>
                  <p style="width: 90%" class="text-center text-lg text-gray-600 md:text-left">{{ $comment->text }}</p>
                </div>
              </div>
            @endforeach
          </section>

        </div>
      </div>
    </div>
  @endsection
