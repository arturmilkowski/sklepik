<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edycja
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('backend.admins.users.destroy', $item) }}" method="POST">
                        @csrf
                        @method('delete')
                        <x-danger-button class="mt-1" :href="route('backend.admins.users.destroy', $item)" onclick="event.preventDefault(); this.closest('form').submit();">
                            Usuń
                        </x-danger-button>
                    </form>
                    <p>
                        <x-link href="{{ route('backend.admins.users.show', $item) }}">Powrót</x-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>