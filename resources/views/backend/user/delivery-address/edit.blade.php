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
                    <form action="{{ route('backend.users.profiles.delivery-adresses.update') }}" method="POST">
                        @csrf
                        @method('patch')
                        <x-form-group>
                            <x-input-label for="street">Ulica</x-input-label>
                            <x-text-input type="text" id="street" name="street" value="{{ old('street', $item->street) }}" placeholder="Pole obowiązkowe" minlength="3" maxlength="60" autofocus required />
                            <x-input-error :messages="$errors->get('street')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="zip_code">Kod pocztowy</x-input-label>
                            <x-text-input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $item->zip_code) }}" placeholder="Pole obowiązkowe" required />
                            <x-input-error :messages="$errors->get('zip_code')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="city">Miasto</x-input-label>
                            <x-text-input type="text" id="city" name="city" value="{{ old('city', $item->city) }}" placeholder="Pole obowiązkowe" maxlength="30" required />
                            <x-input-error :messages="$errors->get('city')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="voivodeship_id">Województwo</x-input-label>
                            <x-select-input id="voivodeship_id" name="voivodeship_id">
                                @foreach ($voivodeships as $voivodeship)
                                @if ( old('voivodeship_id', $item->voivodeship_id) == $voivodeship->id)
                                <option value="{{ $voivodeship->id }}" selected>{{ $voivodeship->name }}</option>
                                @else
                                <option value="{{ $voivodeship->id }}">{{ $voivodeship->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('voivodeship_id')" />
                        </x-form-group>
                        <x-link href="{{ route('backend.users.profiles.delivery-adresses.show') }}">Powrót</x-link>
                        <x-primary-button class="mt-4 ml-2">Edytuj</x-primary-button>
                    </form>
                    <form action="{{ route('backend.users.profiles.delivery-adresses.destroy') }}" method="POST">
                        @csrf
                        @method('delete')
                        <x-danger-button class="mt-1" :href="route('backend.users.profiles.delivery-adresses.destroy')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Usuń
                        </x-danger-button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>