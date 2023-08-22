@extends('admin.layout.layout')

@section('title')
  Create article
@endsection

@section('content')
  <div class="container mx-auto px-6 py-8">
    <h3 class="text-3xl font-medium text-gray-700">Добавить статью</h3>

    <div class="mt-8">

    </div>

    <div class="mt-8">
      <form enctype="multipart/form-data" class="mt-5 space-y-5" method="POST" action={{ route('admin.posts.store') }}>
        @csrf
        <input name="title" value="{{ old('title') }}" type="text"
          class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Название" value="" />

        <input name="preview" type="text" value="{{ old('preview') }}"
          class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Кратко" value="" />

        <input name="description" type="text" value="{{ old('description') }}"
          class="h-12 w-full rounded border border-gray-800 px-3" placeholder="Описание" value="" />

        <div>
          <img class="h-64 w-64" src="https://via.placeholder.com/600" alt="">
        </div>

        <input name="thumbnail" value="{{ old('thumbnail') }}" type="file" class="h-12 w-full" placeholder="Обложка" />

        <button type="submit"
          class="w-full rounded-md bg-blue-900 py-3 text-center font-medium text-white">Сохранить</button>
      </form>
    </div>
  </div>
@endsection
