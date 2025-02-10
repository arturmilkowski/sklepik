    <nav class="flex justify-end mx-1 sm:mx-1 md:mx-4 gap-1 sm:gap-2 md:gap-4 lg:gap-6 xl:gap-8 2xl:gap-8 mb-24 text-xs sm:text-base md:text-base lg:text-base xl:text-lg 2xl:text-xl">
        <a href="{{ route('pages.index') }}" class="{{ Route::is('pages.index') ? 'text-orange-500' : '' }} hover:text-black dark:hover:text-orange-800" title="Strona główna">Start</a>
        <a href="{{ route('pages.about') }}" class="{{ Route::is('pages.about') ? 'text-orange-500' : '' }} hover:text-black dark:hover:text-orange-800" title="O firmie">O firmie</a>
        <a href="{{ route('pages.term_condition') }}" class="{{ Route::is('pages.term_condition') ? 'text-orange-500' : '' }} hover:text-black dark:hover:text-orange-800" title="Regulamin sklepu">Regulamin</a>
        <a href="{{ route('pages.contacts.create') }}" class="{{ Route::is('pages.contacts.create') ? 'text-orange-500' : '' }} hover:text-black dark:hover:text-orange-800" title="Kontakt">Kontakt</a>
@auth
        <a href="{{ url('/dashboard') }}" class="hover:text-black dark:hover:text-orange-800">Dashboard</a>
@else
        <a href="{{ route('login') }}" class="hover:text-black dark:hover:text-orange-800">Zaloguj</a>
        <a href="{{ route('register') }}" class="hover:text-black dark:hover:text-orange-800">Zarejestruj</a>
@endauth
    </nav>
