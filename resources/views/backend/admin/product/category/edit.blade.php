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
                    <form action="{{ route('backend.admins.products.categories.update', $item) }}" method="POST" novalidate>
                        @csrf
                        @method('patch')
                        <input type="hidden" name="slug">
                        <div>
                            <label for="name">Kategoria</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" placeholder="Pole obowiązkowe" required autofocus>
                            <x-input-error :messages="$errors->get('name')" />
                        </div>
                        <x-primary-button>Edytuj</x-primary-button>
                    </form>
                    <form action="{{ route('backend.admins.products.categories.destroy', $item) }}" method="POST">
                        @csrf
                        @method('delete')
                        <x-primary-button :href="route('backend.admins.products.categories.destroy', $item)" onclick="event.preventDefault(); this.closest('form').submit();">
                            Usuń
                        </x-primary-button>
                    </form>
                    <p>
                        <a href="{{ route('backend.admins.products.categories.index') }}">Powrót</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>