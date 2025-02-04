<x-layout>
    <x-slot:title>Pliki cookie</x-slot>
    {{-- <h1 class="mx-1 sm:mx-1 md:mx-4 text-stone-700 text-base">Pliki cookie</h1> --}}
    <h2 class="border-t-1 hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 mx-1 sm:mx-1 md:mx-4 text-xs mb-10">Pliki cookie</h2>
    <div class="mx-1 sm:mx-1 md:mx-4 text-stone-500 text-xs mt-12">
        Plików cookie, używam jedynie w celach logowania się do aplikacji.                        
        <br>
        <strong>Nie wykorzystuje ciastek do celów reklamowych, śledzenia użytkownika czy zapisywania położenia</strong>.
        <br>
        {{-- <a href="{{ route('frontend.pages.privacy_policy') }}" title="">Polityka prywatności</a>. --}}
    </div>

    <br>
    <div class="md:flex md:gap-4 sm:mx-1 md:mx-4 mb-12 text-xs">
        <div class="md:w-1/2">
            <h2 class="border-t-1 hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 pl-1 sm:pl-0 mb-10">Pliki cookie</h2>
            {{-- <h3 class="border-t-1 hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 pl-1 sm:pl-0 mb-10">H 3</h3>
            <p class="pl-1">$product->description</p>
            <p class="mt-8">
                <a href="{{ URL::previous() }}" title="Powrót">← Powrót</a>
            </p> --}}
        </div>
        <div class="md:w-1/2 border-t-1 hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 pl-1 sm:pl-0 mb-10">
            {{-- <h2 class="border-t-1 hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 pl-1 sm:pl-0 mb-10">H 2</h2> --}}
            {{-- <h3 class="border-t-1 hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 pl-1 sm:pl-0 mb-10">H 3</h3> --}}
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint corporis, blanditiis excepturi quis mollitia quas? Cumque voluptas unde impedit commodi necessitatibus provident, deleniti consequatur, minima vero vitae obcaecati neque esse.
        </div>
    </div>
</x-layout>