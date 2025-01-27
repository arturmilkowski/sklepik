    <nav class="flex mx-2 gap-1 mb-24 text-xs">
        <span class="w-2/6">-</span>
        <a href="{{ route('pages.index') }}" class="{{ Route::is('pages.index') ? 'text-orange-500' : '' }} hover:text-black dark:hover:text-orange-800" title="Strona główna">Start</a>
        <a href="{{ route('pages.about') }}" class="{{ Route::is('pages.about') ? 'text-orange-500' : '' }} hover:text-black dark:hover:text-orange-800" title="O firmie">O firmie</a>
        <a href="{{ route('pages.contacts.create') }}" class="{{ Route::is('pages.contacts.create') ? 'text-orange-500' : '' }} hover:text-black dark:hover:text-orange-800" title="Kontakt">Kontakt</a>
@auth
        <a href="{{ url('/dashboard') }}" class="hover:text-black dark:hover:text-orange-800">Dashboard</a>
@else
        <a href="{{ route('login') }}" class="hover:text-black dark:hover:text-orange-800">Zaloguj</a>
        <a href="{{ route('register') }}" class="hover:text-black dark:hover:text-orange-800">Zarejestruj</a>
@endauth
    </nav>
