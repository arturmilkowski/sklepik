{{--  mx-2 border-stone-500 --}}
    <nav class="flex mx-2 gap-12 mb-24">
        <span class="w-2/6">-</span>
        <a href="{{ route('pages.index') }}" @if(Route::currentRouteName()=='pages.index' )class="active" @endif title="Strona główna">Start</a>
        <a href="{{ route('pages.about') }}" @if(Route::currentRouteName()=='pages.about' )class="active" @endif title="O firmie">O firmie</a>
        <a href="{{ route('pages.contacts.create') }}" @if(Route::currentRouteName()=='pages.contacts.create' )class="active" @endif title="Kontakt">Kontakt</a>
@auth
        <a href="{{ url('/dashboard') }}">Dashboard</a>
@else
        <a href="{{ route('login') }}">Zaloguj</a>
        <a href="{{ route('register') }}">Zarejestruj</a>
@endauth
    </nav>
