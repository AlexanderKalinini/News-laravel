  <nav
    class="flex w-full flex-col content-center bg-white px-6 py-2 text-center font-sans shadow sm:flex-row sm:items-baseline sm:justify-between sm:text-left">
    <div class="inner mb-2 sm:mb-0">
      <a href={{ route('home') }}
        class="text-grey-darkest hover:text-blue-dark font-sans text-2xl font-bold no-underline">На главную
        страницу</a><br>
      <a class="text-rose-500" href={{ route('showContactForm') }}>Обратная связь</a>
    </div>

    <div class="self-center sm:mb-0">
      @auth('web')
        <a href={{ route('logout') }} class="text-md text-grey-darker hover:text-blue-dark ml-2 px-1 no-underline">
          Выйти</a>
      @endauth

      @guest('web')
        <a href={{ route('login') }} class="text-md text-grey-darker hover:text-blue-dark ml-2 px-1 no-underline">
          Войти</a>
      @endguest
    </div>
  </nav>
