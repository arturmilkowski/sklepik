<footer>
    <hr>
    Root name: <strong>{{ Route::currentRouteName() }}</strong>
    &mdash; Root action: <strong>{{ Route::currentRouteAction() }}</strong>
    @auth
    &mdash;
    Zalogowany: {{ Auth::user()->name }} {{ Auth::user()->profile?->surname }}
    @endauth
    &mdash; Laravel: {{ Illuminate\Foundation\Application::VERSION }}
    &mdash; PHP: {{ PHP_VERSION }}
</footer>
<div class="flex justify-center mt-16 px-1 sm:items-center sm:justify-between">
    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
        <div class="flex items-center gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
            Root name: {{ Route::currentRouteName() }}
            &mdash;
            Root action: {{ Route::currentRouteAction() }}
        </div>
    </div>
    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
        Laravel: {{ Illuminate\Foundation\Application::VERSION }} &mdash; PHP: {{ PHP_VERSION }}
    </div>
</div>