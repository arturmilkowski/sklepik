<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dodawanie
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{-- route('backend.admins.products.brands.store') --}}" method="POST">
                        @csrf
                        <input type="hidden" name="slug">
                        <div>
                            <label for="name">Firma</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Pole obowiązkowe" autofocus>
                            @error('name')<div>{{ $message }}</div>@enderror
                        </div>
                        <x-primary-button class="mt-4">Dodaj</x-primary-button>
                    </form>
                    <p>
                        <a href="{{ route('backend.admins.products.brands.index') }}">Powrót</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>