@extends('admin.layout.layout')

@section('title')
  Create article
@endsection

@section('content')
  <div class="container mx-auto px-6 py-8">
    <h3 class="text-3xl font-medium text-gray-700">Редактировать статью {{ $post->id }}</h3>
    <div class="mt-8">
    </div>
    <div class="mt-8">
      <form enctype="multipart/form-data" class="mt-5 space-y-5" method="POST"
        action={{ route('admin.posts.update', $post) }}>
        @csrf
        @method('PATCH')
        <input name="title" type="text" class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Название"
          value="{{ $post->title }}" />
        @error('title')
          <p class="text-red-500">{{ $post->message }}</p>
        @enderror
        <input name="preview" type="text" class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Кратко"
          value="{{ $post->preview }}" />
        @error('preview')
          <p class="text-red-500">{{ $post->message }}</p>
        @enderror
        <textarea name="description" type="text" value="{{ old('description') }}"
          class="min-h-[300px] w-full resize-none overflow-scroll truncate rounded border border-gray-800 px-3"
          placeholder="Описание">{{ $post->description }}</textarea>
        @error('description')
          <p class="text-red-500">{{ $post->message }}</p>
        @enderror
        <div>
          <img class="h-64 w-64" src={{ asset('storage/' . $post->thumbnail) }} alt="thumbnail">
        </div>

        <input name="thumbnail" type="file" class="h-12 w-full" placeholder="Обложка" />
        @error('thubnail')
          <p class="text-red-500">{{ $post->message }}</p>
        @enderror
        <button type="submit"
          class="w-full rounded-md bg-blue-900 py-3 text-center font-medium text-white">Сохранить</button>
      </form>
    </div>
  </div>
@endsection
