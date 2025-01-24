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
                    <form action="{{ route('backend.admins.products.products.store') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="slug">
                        <x-form-group>
                            <x-input-label for="brand_id" value="Producent" />
                            <x-select-input id="brand_id" name="brand_id">
                                @foreach ($brands as $brand)
                                @if ( old('brand_id') == $brand->id)
                                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                @else
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('brand_id')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="category_id" value="Kategoria" />
                            <x-select-input id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                @if ( old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('category_id')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="concentration_id" value="Koncentracja" />
                            <x-select-input id="concentration_id" name="concentration_id">
                                @foreach ($concentrations as $concentration)
                                @if ( old('concentration_id') == $concentration->id)
                                <option value="{{ $concentration->id }}" selected>{{ $concentration->name }}</option>
                                @else
                                <option value="{{ $concentration->id }}">{{ $concentration->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('concentration_id')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="name" value="Nazwa" />
                            <x-text-input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Pole obowiązkowe" autofocus />
                            <x-input-error :messages="$errors->get('name')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="description" value="Opis" />
                            <x-textarea-input id="description" name="description" rows="5" placeholder="Pole nieobowiązkowe">{{ old('description') }}</x-textarea-input>
                            <x-input-error :messages="$errors->get('description')" />
                        </x-form-group>
                        <x-form-group-form-check>
                            @if(old('hide'))
                            <x-checkbox-input id="hide" name="hide" value="1" checked />
                            @else
                            <x-checkbox-input id="hide" name="hide" value="1" />
                            @endif
                            <input-label-form-check for="hide">Nie wyświetlaj</input-label-form-check>
                        </x-form-group-form-check>
                        <x-form-group>
                            <x-input-label for="img" value="Obrazek" />
                            <x-file-input id="img" name="img" />
                            <x-input-error :messages="$errors->get('img')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="site_description" value="Opis w sekcji nagłówkowej" />
                            <x-text-input type="text" id="site_description" name="site_description" value="{{ old('site_description') }}" placeholder="Pole nieobowiązkowe" />
                            <x-input-error :messages="$errors->get('site_description')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="site_keyword" value="Słowa kluczowe w sekcji nagłówkowej" />
                            <x-text-input type="text" id="site_keyword" name="site_keyword" value="{{ old('site_keyword') }}" placeholder="Pole nieobowiązkowe" />
                            <x-input-error :messages="$errors->get('site_keyword')" />
                        </x-form-group>
                        <x-link href="{{ route('backend.admins.products.products.index') }}">Powrót</x-link>
                        <x-primary-button class="mt-4 ml-2">Dodaj</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>