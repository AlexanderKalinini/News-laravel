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
        <h3 class="text-3xl font-medium text-gray-700">Статьи</h3>

        <div class="mt-8">
          <a href="" class="text-indigo-600 hover:text-indigo-900">Добавить</a>
        </div>

        <div class="mt-8 flex flex-col">

          <div class="-my-2 overflow-x-auto py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
              class="inline-block min-w-full overflow-hidden border-b border-gray-200 align-middle shadow sm:rounded-lg">
              @foreach ($posts as $post)
                <table class="min-w-full">
                  <thead>
                    <tr>
                      <th
                        class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                        {{ $post->title }}</th>
                      <th class="border-b border-gray-200 bg-gray-50 px-6 py-3"></th>
                    </tr>
                  </thead>

                  <tbody class="bg-white">

                    <tr>
                      <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                        <div class="text-sm leading-5 text-gray-900">{{ $post->preview }}</div>
                      </td>

                      <td
                        class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-right text-sm font-medium leading-5">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Редактировать</a>
                        <form action={{ route('admin.posts.destroy', ['post' => $post->id]) }} method="DELETE">
                          @csrf
                          <button type="submit" class="text-red-600 hover:text-red-900">Удалить</button>
                        </form>

                      </td>
                    </tr>

                  </tbody>
                </table>
              @endforeach
              <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                <div class="flex flex-1 justify-between sm:hidden">
                  <a href="#"
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                  <a href="#"
                    class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                </div>

              </div>
              {{ $posts->links('vendor.pagination.tailwind') }}
    </main>
  @endsection
