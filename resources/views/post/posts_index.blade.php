@extends('layout.layout')
@section('title')
  News
@endsection
@section('content')
  @include('layout.partials.nav')
  <div class="mb-12 mt-10 grid grid-cols-1 gap-10 md:grid-cols-3">

    @foreach ($posts as $post)
      <div class="max-w-xl px-4 py-8">
        <div class="bg-white shadow-2xl">
          <div>
            <a href={{ route('showPost', $post) }}>
              <img
                src={{ Str::startsWith($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}
                alt="Post 1" />
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
    {{ $posts->links('vendor.pagination.tailwind') }}
  </div>
@endsection
