<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Typy produktu
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-3">
                        <x-link href="{{ route('backend.admins.products.types.create', $product) }}">Dodaj</x-link>
                    </p>
                    @if ($collection->count())
                    <table class="w-full">
                        <thead>
                            <tr>
                                <x-table-header>#</x-table-header>
                                <x-table-header>Produkt</x-table-header>
                                <x-table-header>Typ produktu</x-table-header>
                                <x-table-header>Cena</x-table-header>
                                <x-table-header>Cena promocyjna</x-table-header>
                                <x-table-header>Ilość</x-table-header>
                                <x-table-header>Czy aktywny</x-table-header>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $item)
                            <tr>
                                <x-table-data>{{ $item->id }}</x-table-data>
                                <x-table-data>{{ $item->product->name }}</x-table-data>
                                <x-table-data>
                                    <x-link href="{{ route('backend.admins.products.types.show', [$product, $item]) }}">{{ $item->name }}</x-link>
                                </x-table-data>
                                <x-table-data>{{ $item->price }}</x-table-data>
                                <x-table-data>{{ $item->promo_price }}</x-table-data>
                                <x-table-data>{{ $item->quantity }}</x-table-data>
                                <x-table-data>{{ $item->active }}</x-table-data>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div>Brak danych</div>
                    @endif
                    <x-btn-group>
                        <x-link href="{{ route('backend.admins.products.products.show', $product) }}">Powrót</x-link>
                    </x-btn-group>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>