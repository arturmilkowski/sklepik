<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dodawanie
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('backend.admins.customers.store') }}" method="POST">
                        @csrf
                        <x-form-group>
                            <x-input-label for="name">Imię</x-input-label>
                            <x-text-input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Pole obowiązkowe" maxlength="30" required />
                            <x-input-error :messages="$errors->get('name')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="surname">Nazwisko</x-input-label>
                            <x-text-input type="text" id="surname" name="surname" value="{{ old('surname') }}" placeholder="Pole obowiązkowe" maxlength="30" required />
                            <x-input-error :messages="$errors->get('name')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="street">Ulica</x-input-label>
                            <x-text-input type="text" id="street" name="street" value="{{ old('street') }}" placeholder="Pole obowiązkowe" minlength="3" maxlength="60" required />
                            <x-input-error :messages="$errors->get('street')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="zip_code">Kod pocztowy</x-input-label>
                            <x-text-input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" placeholder="Pole obowiązkowe" required />
                            <x-input-error :messages="$errors->get('zip_code')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="city">Miasto</x-input-label>
                            <x-text-input type="text" id="city" name="city" value="{{ old('city') }}" placeholder="Pole obowiązkowe" maxlength="30" required />
                            <x-input-error :messages="$errors->get('city')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="voivodeship_id">Województwo</x-input-label>
                            <x-select-input id="voivodeship_id" name="voivodeship_id">
                                @foreach ($voivodeships as $voivodeship)
                                @if ( old('voivodeship_id') == $voivodeship->id)
                                <option value="{{ $voivodeship->id }}" selected>{{ $voivodeship->name }}</option>
                                @else
                                <option value="{{ $voivodeship->id }}">{{ $voivodeship->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('voivodeship_id')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="email">E-mail</x-input-label>
                            <x-text-input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Pole obowiązkowe" maxlength="60" required />
                            <x-input-error :messages="$errors->get('email')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="phone">Telefon</x-input-label>
                            <x-text-input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Pole nieobowiązkowe" />
                            <x-input-error :messages="$errors->get('phone')" />
                        </x-form-group>
                        <x-link href="{{ route('backend.admins.customers.index') }}">Powrót</x-link>
                        <x-primary-button class="mt-4 ml-2">Dodaj</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>