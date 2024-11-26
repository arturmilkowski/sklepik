    <nav>
        <ul>
            <li><a href="{{ route('pages.index') }}" @if(Route::currentRouteName()=='pages.index' )class="active" @endif title="Strona główna">Start</a></li>
            <li><a href="{{ route('pages.about') }}" @if(Route::currentRouteName()=='pages.about' )class="active" @endif title="O firmie">O firmie</a></li>
            <li><a href="{{ route('pages.contacts.create') }}" @if(Route::currentRouteName()=='pages.contact' )class="active" @endif title="Kontakt">Kontakt</a></li>
        </ul>
    </nav>
