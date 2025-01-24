<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Zamówienie
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
                                <x-table-data>Orderable ID</x-table-data>
                                <x-table-data>{{ $item->orderable_id }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Orderable type</x-table-data>
                                <x-table-data>{{ $item->orderable_type }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Status</x-table-data>
                                <x-table-data>{{ $item->status->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Koszt produktów [zł]</x-table-data>
                                <x-table-data>{{ $item->total_price }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Koszt dostawy [zł]</x-table-data>
                                <x-table-data>{{ $item->delivery_cost }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Razem</x-table-data>
                                <x-table-data>{{ $item->total_price_and_delivery_cost }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Dostawca</x-table-data>
                                <x-table-data>{{ $item->delivery_name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Klient</x-table-data>
                                <x-table-data>
                                    <ul>
                                        @if ($item->orderable->profile)
                                        <li>{{ $item->orderable->name }} {{ $item->orderable->profile->surname }}</li>
                                        <li>{{ $item->orderable->profile->street }}</li>
                                        <li>{{ $item->orderable->profile->zip_code }} {{ $item->orderable->profile->city }}</li>
                                        <li>{{ $item->orderable->email }}</li>
                                        <li>{{ $item->orderable->profile->phone ?? '' }}</li>
                                        <li>{{ $item->orderable->profile->voivodeship?->name }}</li>
                                        @else
                                        <li>{{ $item->orderable->name }} {{ $item->orderable->surname }}</li>
                                        <li>{{ $item->orderable->street }}</li>
                                        <li>{{ $item->orderable->zip_code }} {{ $item->orderable->city }}</li>
                                        <li>{{ $item->orderable->email }}</li>
                                        <li>{{ $item->orderable->phone ?? '' }}</li>
                                        <li>{{ $item->orderable->voivodeship?->name }}</li>
                                        @endif
                                    </ul>
                                </x-table-data>
                            </tr>
                            @if ($item->orderable->profile?->deliveryAddress)
                            <tr>
                                <x-table-data>Dostawa na inny adres</x-table-data>
                                <x-table-data>
                                    <ul>
                                        <li>{{ $item->orderable->profile->deliveryAddress->street }}</li>
                                        <li>{{ $item->orderable->profile->deliveryAddress->zip_code }} {{ $item->orderable->profile->deliveryAddress->city }}</li>
                                        <li>{{ $item->orderable->profile->deliveryAddress->voivodeship->name }}</li>
                                    </ul>
                                </x-table-data>
                            </tr>
                            @endif
                            <tr>
                                <x-table-data>Komentarz</x-table-data>
                                <x-table-data>{{ $item->comment }}</x-table-data>
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
                        <x-link href="{{ route('backend.admins.orders.index') }}">Powrót</x-link>
                        <x-link href="{{ url()->previous() }}">Powrót do poprzedniej strony</x-link>
                        <x-link href="{{ route('backend.admins.orders.edit', $item) }}">Edytuj</x-link>
                    </x-btn-group>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Produkty</h3>
                    @if (count($item->items) > 0)
                    <table class="w-full">
                        <thead>
                            <tr>
                                <x-table-header>#</x-table-header>
                                <x-table-header>type id</x-table-header>
                                <x-table-header>type size id</x-table-header>
                                <x-table-header>type name</x-table-header>
                                <x-table-header>Name</x-table-header>
                                <x-table-header>Koncentracja</x-table-header>
                                <x-table-header>Kategoria</x-table-header>
                                <x-table-header>Cena [zł]</x-table-header>
                                <x-table-header>Ilość [szt]</x-table-header>
                                <x-table-header>Wartość [zł]</x-table-header>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->items as $orderItem)
                            <x-table-data>{{ $orderItem->id }}</x-table-data>
                            <x-table-data>{{ $orderItem->type_id }}</x-table-data>
                            <x-table-data>{{ $orderItem->type_size_id }}</x-table-data>
                            <x-table-data>{{ $orderItem->type_name }}</x-table-data>
                            <x-table-data>{{ $orderItem->name }}</x-table-data>
                            <x-table-data>{{ $orderItem->concentration }}</x-table-data>
                            <x-table-data>{{ $orderItem->category }}</x-table-data>
                            <x-table-data>{{ $orderItem->price }}</x-table-data>
                            <x-table-data>{{ $orderItem->quantity }}</x-table-data>
                            <x-table-data>{{ $orderItem->subtotal_price }}</x-table-data>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div>Brak danych</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>