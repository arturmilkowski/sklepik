<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Typ produktu
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <x-table-data>#</x-table-data>
                                <x-table-data>{{ $item->id }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Produkt</x-table-data>
                                <x-table-data>{{ $item->product->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Nazwa</x-table-data>
                                <x-table-data>{{ $item->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Wielkość</x-table-data>
                                <x-table-data>{{ $item->size->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Cena</x-table-data>
                                <x-table-data>{{ $item->price }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Cena promocyjna</x-table-data>
                                <x-table-data>{{ $item->promo_price }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Ilość</x-table-data>
                                <x-table-data>{{ $item->quantity }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Ukryj</x-table-data>
                                <x-table-data>{{ $item->hide }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Opis</x-table-data>
                                <x-table-data>{{ $item->description }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Obrazek</x-table-data>
                                <x-table-data>
                                    @if ($item->img)
                                    <a href="{{ route('backend.admins.products.types.images.show', [$product, $item]) }}">
                                        <img width="200" src="{{ asset('storage/images/products/types') . '/' . $item->img }}" alt="{{ $item->name }}">
                                    </a>
                                    <form action="{{ route('backend.admins.products.types.images.show', [$product, $item]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button class="mt-1" :href="route('backend.admins.products.types.images.show', [$product, $item])" onclick="event.preventDefault(); this.closest('form').submit();">
                                            Usuń
                                        </x-danger-button>
                                    </form>
                                    @endif
                                </x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Utworzono</x-table-data>
                                <x-table-data>{{ $item->created_at->format("m.d.Y") }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Edytowano</x-table-data>
                                <x-table-data>@if ($item->updated_at ){{ $item->updated_at->format("m.d.Y") }}@endif</x-table-data>
                            </tr>
                        </tbody>
                    </table>
                    <x-btn-group>
                        <x-link href="{{ route('backend.admins.products.types.index', $product) }}">Powrót</x-link>
                        <x-link href="{{ route('backend.admins.products.types.edit', [$product, $item]) }}">Edytuj</x-link>
                    </x-btn-group>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>