@extends('admin.layout.layout')

@section('title')
  Dashboard
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

    </main>
  </div>
  </div>
  </div>
@endsection
