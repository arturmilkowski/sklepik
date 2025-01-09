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
                    <form action="{{ route('backend.admins.products.products.update', $item) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('patch')
                        <input type="hidden" name="slug">
                        <x-form-group>
                            <x-input-label for="brand_id">Producent</x-input-label>
                            <x-select-input id="brand_id" name="brand_id">
                                @foreach ($brands as $brand)
                                @if ( old('brand_id', $item->brand_id) == $brand->id)
                                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                @else
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('brand_id')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="category_id">Kategoria</x-input-label>
                            <x-select-input id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                @if ( old('category_id', $item->category_id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('category_id')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="concentration_id">Koncentracja</x-input-label>
                            <x-select-input id="concentration_id" name="concentration_id">
                                @foreach ($concentrations as $concentration)
                                @if ( old('concentration_id', $item->concentration_id) == $concentration->id)
                                <option value="{{ $concentration->id }}" selected>{{ $concentration->name }}</option>
                                @else
                                <option value="{{ $concentration->id }}">{{ $concentration->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('concentration_id')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="name">Nazwa</x-input-label>
                            <x-text-input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" placeholder="Pole obowiązkowe" required autofocus />
                            <x-input-error :messages="$errors->get('name')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="description">Opis</x-input-label>
                            <x-textarea-input id="description" name="description" placeholder="Pole nieobowiązkowe">{{ old('description', $item->description) }}</x-textarea-input>
                            <x-input-error :messages="$errors->get('description')" />
                        </x-form-group>
                        <x-form-group-form-check>
                            {{-- <input type="checkbox" class="form-check-input" id="hide" name="hide" value="1" @if(old('hide', $item->hide))checked @endif> --}}
                            <x-form-group-form-check>
                                @if(old('hide', $item->hide))
                                <x-checkbox-input id="hide" name="hide" value="1" checked />
                                @else
                                <x-checkbox-input id="hide" name="hide" value="1" />
                                @endif
                                <input-label-form-check for="hide">Nie wyświetlaj</input-label-form-check>
                            </x-form-group-form-check>
                            {{-- <label class="form-check-label" for="hide">Nie wyświetlaj</label> --}}
                        </x-form-group-form-check>
                        <x-form-group>
                            <x-input-label for="img">Obrazek</x-input-label>
                            <input class="block w-full text-gray-800 text-sm

                            file:mr-4 file:px-4 file:py-2 file:text-sm file:border-0
                            
                            file:rounded-full file:font-semibold file:text-violet-700 file:bg-violet-50
                            
                            hover:file:bg-amber-100 hover:file:cursor-pointer" type="file" id="img" name="img">
                            {{-- @error('img')<div class="invalid-feedback">{{ $message }}
                </div>@enderror --}}
                <x-input-error :messages="$errors->get('img')" />
                </x-form-group>
                <x-form-group>
                    <x-input-label for="site_description">Opis w sekcji nagłówkowej</x-input-label>
                    <x-text-input type="text" id="site_description" name="site_description" value="{{ old('site_description', $item->site_description) }}" placeholder="Pole nieobowiązkowe" />
                    <x-input-error :messages="$errors->get('site_description')" />
                </x-form-group>
                <x-form-group>
                    <x-input-label for="site_keyword">Słowa kluczowe w sekcji nagłówkowej</x-input-label>
                    <x-text-input type="text" id="site_keyword" name="site_keyword" value="{{ old('site_keyword', $item->site_keyword) }}" placeholder="Pole nieobowiązkowe" />
                    <x-input-error :messages="$errors->get('site_keyword')" />
                </x-form-group>
                <x-primary-button>Edytuj</x-primary-button>
                </form>
                <form action="{{ route('backend.admins.products.products.destroy', $item) }}" method="POST">
                    @csrf
                    @method('delete')
                    <x-danger-button class="mt-1" :href="route('backend.admins.products.products.destroy', $item)" onclick="event.preventDefault(); this.closest('form').submit();">
                        Usuń
                    </x-danger-button>
                </form>
                <p>
                    <x-link href="{{ route('backend.admins.products.products.index') }}">Powrót</x-link>
                </p>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>