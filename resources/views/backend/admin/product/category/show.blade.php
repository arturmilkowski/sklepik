<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Kategoria
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nazwa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <x-table-data>#</x-table-data>
                                <x-table-data>{{ $item->id }}</x-table-data>
                            <tr>
                                <x-table-data>Nazwa</x-table-data>
                                <x-table-data>
                                    <a href="{{ route('backend.admins.products.categories.show', $item) }}">
                                        {{ $item->name }}
                                    </a>
                                </x-table-data>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        <a href="{{ route('backend.admins.products.categories.index') }}">Powrót</a>
                        |
                        <a href="{{ route('backend.admins.products.categories.edit', $item) }}">
                            Edytuj
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>