    <footer class="mx-2 text-stone-500 text-xs">
        Root name: <strong>{{ Route::currentRouteName() }}</strong>
        &mdash; Root action: <strong>{{ Route::currentRouteAction() }}</strong>
        @auth
        &mdash;
        Zalogowany: {{ Auth::user()->name }} {{ Auth::user()->profile?->surname }}
        @endauth
        &mdash; Laravel: {{ Illuminate\Foundation\Application::VERSION }}
        &mdash; PHP: {{ PHP_VERSION }}
    </footer>
