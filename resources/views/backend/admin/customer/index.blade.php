<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Klienci &mdash; osoby, które dokonały zakupów bez rejestracji
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-3">
                        <x-link href="{{ route('backend.admins.customers.create') }}">Dodaj</x-link>
                    </p>
                    @if ($collection->count())
                    <table class="w-full">
                        <thead>
                            <tr>
                                <x-table-header>#</x-table-header>
                                <x-table-header>Imię i nazwisko</x-table-header>
                                <x-table-header>E-mail</x-table-header>
                                <x-table-header>Telefon</x-table-header>
                                <x-table-header>Miasto</x-table-header>
                                <x-table-header>Utworzono</x-table-header>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $item)
                            <tr>
                                <x-table-data>{{ $item->id }}</x-table-data>
                                <x-table-data>
                                    <x-link href="{{ route('backend.admins.customers.show', $item) }}">{{ $item->name }} {{ $item->surname }}</x-link>
                                </x-table-data>
                                <x-table-data>{{ $item->email }}</x-table-data>
                                <x-table-data>{{ $item->phone }}</x-table-data>
                                <x-table-data>{{ $item->city }}</x-table-data>
                                <x-table-data>{{ $item->created_at->format("m.d.Y") }}</x-table-data>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $collection->links() }}
                    @else
                    <div>Brak danych</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>