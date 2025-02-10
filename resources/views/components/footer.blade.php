    <footer class="mx-1 sm:mx-1 md:mx-4 text-stone-500 text-xs mt-12">
        <div>
            Udine 2025 &bull;
            <a href="{{ route('pages.cookie') }}" title="Informacje o plikach cookie">Cookie</a>
            &bull;
            <a href="{{ route('pages.privacy_policy') }}" title="Polityka prywatności">Prywatność</a>
            &bull;
            <a href="{{ route('pages.term_condition') }}" title="Regulamin">Regulamin</a>
        </div>
        <div>
        @if (App::environment(['local', 'staging']))
        Root name: <strong>{{ Route::currentRouteName() }}</strong>
        &mdash; Root action: <strong>{{ Route::currentRouteAction() }}</strong>
        @auth
        &mdash;
        Zalogowany: {{ Auth::user()->name }} {{ Auth::user()->profile?->surname }}
        @endauth
        &mdash; L: {{ Illuminate\Foundation\Application::VERSION }}
        &mdash; P: {{ PHP_VERSION }}
        @endif
        </div>
    </footer>
