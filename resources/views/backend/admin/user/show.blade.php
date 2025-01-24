<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Użytkownik sklepu
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full">
                        <tbody>
                            @if ($item->profile == null)
                            <tr>
                                <x-table-data-inverse colspan="2">Brak profilu</x-table-data-inverse>
                            </tr>
                            @endif
                            <tr>
                                <x-table-data>#</x-table-data>
                                <x-table-data>{{ $item->id }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Imię</x-table-data>
                                <x-table-data>{{ $item->name }}</x-table-data>
                            </tr>
                            @if ($item->profile)
                            <tr>
                                <x-table-data>Nazwisko</x-table-data>
                                <x-table-data>{{ $item->profile->surname }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Telefon</x-table-data>
                                <x-table-data>{{ $item->profile->phone }}</x-table-data>
                            </tr>
                            @endif
                            <tr>
                                <x-table-data>E-mail</x-table-data>
                                <x-table-data>{{ $item->email }}</x-table-data>
                            </tr>
                            @if ($item->profile)
                            <tr>
                                <x-table-data>Ulica</x-table-data>
                                <x-table-data>{{ $item->profile->street }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Kod pocztowy</x-table-data>
                                <x-table-data>{{ $item->profile->zip_code }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Miasto</x-table-data>
                                <x-table-data>{{ $item->profile->city }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Województwo</x-table-data>
                                <x-table-data>{{ $item->profile->voivodeship->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Profil utworzono</x-table-data>
                                <x-table-data>{{ $item->profile->created_at }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Profil zmieniono</x-table-data>
                                <x-table-data>{{ $item->profile->updated_at }}</x-table-data>
                            </tr>
                            @endif
                            <tr>
                                <x-table-data>E-mail zweryfikowano</x-table-data>
                                <x-table-data>{{ $item->email_verified_at }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Konto utworzono</x-table-data>
                                <x-table-data>{{ $item->created_at }}</x-table-data>
                            </tr>
                        </tbody>
                    </table>
                    <x-btn-group>
                        <x-link href="{{ route('backend.admins.users.index') }}">Powrót</x-link>
                        <x-link href="{{ route('backend.admins.users.edit', $item) }}">Edytuj</x-link>
                    </x-btn-group>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>