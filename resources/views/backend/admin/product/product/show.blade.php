<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produkt
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
                            </tr>
                            <tr>
                                <x-table-data>Firma</x-table-data>
                                <x-table-data>{{ $item->brand->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Kategoria</x-table-data>
                                <x-table-data>{{ $item->category->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Koncentracja</x-table-data>
                                <x-table-data>{{ $item->concentration->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Nazwa</x-table-data>
                                <x-table-data>
                                    <a href="{{ route('backend.admins.products.products.show', $item) }}">
                                        {{ $item->name }}
                                    </a>
                                </x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Opis</x-table-data>
                                <x-table-data>{{ $item->description }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Obrazek</x-table-data>
                                <x-table-data>
                                    @if($item->img)
                                    <a href="{{ route('backend.admins.products.products.images.show', $item) }}">
                                        <img width="200" src="{{ asset('storage/images/products') . '/' . $item->img }}" alt="{{ $item->name }}">
                                    </a>
                                    <form action="{{ route('backend.admins.products.products.images.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button class="mt-1" :href="route('backend.admins.products.products.images.destroy', $item)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            Usuń
                                        </x-danger-button>
                                    </form>
                                    @endif
                                </x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Opis w sekcji nagłówkowej strony</x-table-data>
                                <x-table-data>{{ $item->site_description }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Słowa kluczowe w sekcji nagłówkowej strony</x-table-data>
                                <x-table-data>{{ $item->site_keyword }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Ukryj</x-table-data>
                                <x-table-data>{{ $item->hide }}</x-table-data>
                            </tr>
                        </tbody>
                    </table>
                    <x-btn-group>
                        <x-link href="{{ route('backend.admins.products.products.index') }}">Powrót</x-link>
                        <x-link href="{{ route('backend.admins.products.products.edit', $item) }}">Edytuj</x-link>
                        <x-link href="{{ route('backend.admins.products.types.index', $item) }}">Typy</x-link>
                    </x-btn-group>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>