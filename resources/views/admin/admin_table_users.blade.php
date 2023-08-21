@extends('admin.layout.layout')

@section('title')
  Create article
@endsection

@section('content')
  <div class="container mx-auto px-6 py-8">
    <h3 class="text-3xl font-medium text-gray-700">Пользователи</h3>

    <div class="mt-8 flex flex-col">

      <div class="-my-2 overflow-x-auto py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="inline-block min-w-full overflow-hidden border-b border-gray-200 align-middle shadow sm:rounded-lg">
          @foreach ($users as $user)
            <table class="min-w-full">
              <thead>
                <tr>
                  <th
                    class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                    {{ $user->name }}</th>
                  <th class="border-b border-gray-200 bg-gray-50 px-6 py-3"></th>
                </tr>
              </thead>

              <tbody class="bg-white">

                <tr>
                  <td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
                    <div class="text-sm leading-5 text-gray-900">{{ $user->email }}</div>
                  </td>

                  <td
                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-right text-sm font-medium leading-5">
                    <form action={{ route('admin.users.destroy', $user->user_id) }} method="POST">
                      @csrf
                      @method('DELETE')
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
          {{ $users->links('vendor.pagination.tailwind') }}
        </div>
      @endsection
