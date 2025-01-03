<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Klient i jego zamówienie
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <x-table-data>#</x-table-data>
                                <x-table-data>{{ $item->id }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Imię</x-table-data>
                                <x-table-data>{{ $item->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Nazwisko</x-table-data>
                                <x-table-data>{{ $item->surname }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Ulica</x-table-data>
                                <x-table-data>{{ $item->street }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Kod pocztowy i miasto</x-table-data>
                                <x-table-data>{{ $item->zip_code }} {{ $item->city }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Województwo</x-table-data>
                                <x-table-data>{{ $item->voivodeship?->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>E-mail</x-table-data>
                                <x-table-data><a href="mailto:{{ $item->email }}" title="Wysyła email">{{ $item->email }}</a></x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Telefon</x-table-data>
                                <x-table-data>{{ $item->phone }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Utworzono</x-table-data>
                                <x-table-data>{{ $item->created_at }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Edytowano</x-table-data>
                                <x-table-data>{{ $item->updated_at }}</x-table-data>
                            </tr>
                        </tbody>
                    </table>
                    <x-btn-group>
                        <x-link href="{{ route('backend.admins.customers.index') }}">Powrót</x-link>
                        <x-link href="{{ route('backend.admins.customers.edit', $item) }}">Edytuj</x-link>
                    </x-btn-group>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($item->order)
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <x-table-data>id</x-table-data>
                                <x-table-data>{{ $item->order->id }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>orderable id</x-table-data>
                                <x-table-data>{{ $item->order->orderable_id }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>type</x-table-data>
                                <x-table-data>{{ $item->order->orderable_type }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Status</x-table-data>
                                <x-table-data>{{ $item->order->status->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Dokument zakupu</x-table-data>
                                <x-table-data>{{ $item->order->saleDocument->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Cena wszystkich produktów [zł]</x-table-data>
                                <x-table-data>{{ $item->order->total_price }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Cena dostawy [zł]</x-table-data>
                                <x-table-data>{{ $item->order->delivery_cost }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Cena produktów i cena dostawy razem [zł]</x-table-data>
                                <x-table-data>{{ $item->order->total_price_and_delivery_cost }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Dostawca</x-table-data>
                                <x-table-data>{{ $item->order->delivery_name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Komentarz</x-table-data>
                                <x-table-data>{{ $item->order->comment }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Utworzono</x-table-data>
                                <x-table-data>{{ $item->order->created_at }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Edytowano</x-table-data>
                                <x-table-data>{{ $item->order->updated_at }}</x-table-data>
                            </tr>
                        </tbody>
                    </table>
                    <x-btn-group>
                        <x-link href="{{ route('backend.admins.customers.index') }}">Powrót</x-link>
                        <x-link href="{{ route('backend.admins.customers.orders.edit', $item) }}">Edytuj</x-link>
                    </x-btn-group>
                    @else
                    <div>Brak zamówienia</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>