    <footer class="mx-1 sm:mx-1 md:mx-4 text-stone-500 text-xs mt-12">
        Udine 2025 &bull;
        <a href="{{ route('pages.cookie') }}" title="Informacje o plikach cookie">
            Pliki cookie
        </a>
        @if (App::environment(['local', 'staging']))
        &bull;
        Root name: <strong>{{ Route::currentRouteName() }}</strong>
        &mdash; Root action: <strong>{{ Route::currentRouteAction() }}</strong>
        @auth
        &mdash;
        Zalogowany: {{ Auth::user()->name }} {{ Auth::user()->profile?->surname }}
        @endauth
        &mdash; Laravel: {{ Illuminate\Foundation\Application::VERSION }}
        &mdash; PHP: {{ PHP_VERSION }}
        @endif
    </footer>
