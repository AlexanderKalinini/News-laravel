@extends('admin.layout.layout')

@section('title')
  Create article
@endsection

@section('content')
  <div class="flex flex-1 flex-col overflow-hidden">
    <header class="flex items-center justify-between border-b-4 border-indigo-600 bg-white px-6 py-4">
      <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
          <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round"></path>
          </svg>
        </button>
      </div>

      <div class="flex items-center">
        <div x-data="{ dropdownOpen: false }" class="relative">
          <button @click="dropdownOpen = ! dropdownOpen"
            class="relative block h-8 w-8 overflow-hidden rounded-full shadow focus:outline-none">
            <img class="h-full w-full object-cover"
              src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=296&amp;q=80"
              alt="Your avatar">
          </button>

          <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 h-full w-full"
            style="display: none;"></div>

          <div x-show="dropdownOpen" class="absolute right-0 z-10 mt-2 w-48 overflow-hidden rounded-md bg-white shadow-xl"
            style="display: none;">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Выйти</a>
          </div>
        </div>
      </div>
    </header>

    <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-200">
      <div class="container mx-auto px-6 py-8">
        <h3 class="text-3xl font-medium text-gray-700">Добавить статью</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
          <form enctype="multipart/form-data" class="mt-5 space-y-5" method="POST" action="">

            <input name="title" type="text" class="h-12 w-full rounded border border-gray-800 px-3"
              placeholder="Название" value="" />

            <input name="preview" type="text" class="h-12 w-full rounded border border-gray-800 px-3"
              placeholder="Кратко" value="" />

            <input name="description" type="text" class="h-12 w-full rounded border border-gray-800 px-3"
              placeholder="Описание" value="" />

            <div>
              <img class="h-64 w-64" src="https://via.placeholder.com/600" alt="">
            </div>

            <input name="thumbnail" type="file" class="h-12 w-full" placeholder="Обложка" />

            <button type="submit"
              class="w-full rounded-md bg-blue-900 py-3 text-center font-medium text-white">Сохранить</button>
          </form>
        </div>
      </div>
    </main>
  </div>
  </div>
  </div>
@endsection
