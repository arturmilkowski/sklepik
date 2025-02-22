<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Obrazek
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('backend.admins.products.products.show', $item) }}">
                        <img src="{{ asset('storage/images/products') . '/' . $item->img }}" alt="{{ $item->name }}">
                    </a>
                    <p class="mt-2">
                        <x-link href="{{ route('backend.admins.products.products.show', $item) }}">
                            Powrót
                        </x-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>