<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edycja
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('backend.admins.orders.update', ['order' => $item]) }}" method="POST">
                        @csrf
                        @method('patch')
                        <x-form-group>
                            <x-input-label for="status_id">Status</x-input-label>
                            <x-select-input id="status_id" name="status_id">
                                @foreach ($statuses as $status)
                                @if ( old('status_id', $item->status_id) == $status->id)
                                <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                                @else
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('status_id')" />
                        </x-form-group>
                        <x-primary-button>Edytuj</x-primary-button>
                    </form>
                    <form action="{{ route('backend.admins.orders.destroy', ['order' => $item]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <x-danger-button class="mt-1" :href="route('backend.admins.orders.destroy', ['order' => $item])" onclick="event.preventDefault(); this.closest('form').submit();">
                            Usuń
                        </x-danger-button>
                    </form>
                    <x-btn-group>
                        <x-link href="{{ route('backend.admins.orders.show', $item) }}">Powrót do zamówień</x-link>
                        <x-link href="{{ url()->previous() }}">Powrót do poprzedniej strony</x-link>
                    </x-btn-group>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>