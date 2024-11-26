    <nav>
        <ul>
            <li><a href="{{ route('pages.index') }}" @if(Route::currentRouteName()=='pages.index' )class="active" @endif title="Strona główna">Start</a></li>
            <li><a href="{{ route('pages.about') }}" @if(Route::currentRouteName()=='pages.about' )class="active" @endif title="O firmie">O firmie</a></li>
            <li><a href="{{ route('pages.contacts.create') }}" @if(Route::currentRouteName()=='pages.contacts.create' )class="active" @endif title="Kontakt">Kontakt</a></li>
@auth
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
@else
            <li><a href="{{ route('login') }}">Zaloguj</a></li>
            <li><a href="{{ route('register') }}">Zarejestruj</a></li>
@endauth
        </ul>
    </nav>
