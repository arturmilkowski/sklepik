<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Kategorie produktów
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>
                        <a href="{{ route('backend.admins.products.categories.create') }}">Dodaj</a>
                    </p>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nazwa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($collection as $item)
                            <tr>
                                <x-table-data>{{ $item->id }}</x-table-data>
                                <x-table-data>
                                    <a href="{{ route('backend.admins.products.categories.show', $item) }}">
                                        {{ $item->name }}
                                    </a>
                                </x-table-data>
                            </tr>
                            @empty
                            <tr>
                                <td>Brak danych</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>