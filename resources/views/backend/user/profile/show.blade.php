<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($hasCart)
                    <div class="pb-8">
                        <x-link href="{{ route('orders.with-registration.create') }}" title="">Przejdź do zamówienia</x-link>
                    </div>
                    @endif
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
                                <x-table-data>{{ $item->profile->surname }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>E-mail</x-table-data>
                                <x-table-data>{{ $item->email }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Telefon</x-table-data>
                                <x-table-data>{{ $item->profile->phone }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Ulica i numer mieszkania (domu)</x-table-data>
                                <x-table-data>{{ $item->profile->street }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Kod pocztowy</x-table-data>
                                <x-table-data>{{ $item->profile->zip_code }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Województwo</x-table-data>
                                <x-table-data>{{ $item->profile->voivodeship->name }}</x-table-data>
                            </tr>
                        </tbody>
                    </table>
                    <x-btn-group>
                        <x-link href="{{ route('profile.edit') }}">Edytuj</x-link>
                        @if($item->profile->deliveryAddress)
                        <x-link href="{{ route('backend.users.profiles.delivery-adresses.show') }}">Dostawa na inny adres</x-link>
                        @else
                        <x-link href="{{ route('backend.users.profiles.delivery-adresses.create') }}">Dodaj inny adres dostawy</x-link>
                        @endif
                    </x-btn-group>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>