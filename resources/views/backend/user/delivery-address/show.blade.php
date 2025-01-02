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
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <x-table-data>#</x-table-data>
                                <x-table-data>{{ $item->id }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Ulica i numer mieszkania (domu)</x-table-data>
                                <x-table-data>{{ $item->profile->deliveryAddress?->street }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Kod pocztowy</x-table-data>
                                <x-table-data>{{ $item->profile->deliveryAddress?->zip_code }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Województwo</x-table-data>
                                <x-table-data>{{ $item->profile->deliveryAddress?->voivodeship->name }}</x-table-data>
                            </tr>
                        </tbody>
                    </table>
                    <x-btn-group>
                        <x-link href="{{ route('backend.users.profiles.show') }}">Powrót</x-link>
                        <x-link href="{{ route('backend.users.profiles.delivery-adresses.edit') }}">Edytuj</x-link>
                    </x-btn-group>
                </div>
            </div>
        </div>
</x-app-layout>