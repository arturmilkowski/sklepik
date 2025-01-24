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
                    <form action="{{ route('backend.admins.products.types.update', [$product, $item]) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('patch')
                        <x-form-group>
                            <x-input-label for="product_id">Produkt</x-input-label>
                            <x-select-input id="product_id" name="product_id">
                                @foreach ($products as $product_)
                                @if ( old('product_id', $item->product_id) == $product_->id)
                                <option value="{{ $product_->id }}" selected>{{ $product_->name }}</option>
                                @else
                                <option value="{{ $product_->id }}">{{ $product_->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('product_id')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="size_id">Wielkość</x-input-label>
                            <x-select-input id="size_id" name="size_id">
                                @foreach ($sizes as $size)
                                @if ( old('size_id', $item->size_id) == $size->id)
                                <option value="{{ $size->id }}" selected>{{ $size->name }}</option>
                                @else
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('size_id')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="name">Nazwa</x-input-label>
                            <x-text-input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" placeholder="Pole obowiązkowe" maxlength="40" required />
                            <x-input-error :messages="$errors->get('name')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="price">Cena</x-input-label>
                            <x-text-input type="number" id="price" name="price" value="{{ old('price', $item->price) }}" min="0" max="9999" placeholder="Pole obowiązkowe" required />
                            <x-input-error :messages="$errors->get('price')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="promo_price">Cena promocyjna</x-input-label>
                            <x-text-input type="number" id="promo_price" name="promo_price" value="{{ old('promo_price', $item->price) }}" min="0" max="9999" placeholder="Pole nieobowiązkowe" />
                            <x-input-error :messages="$errors->get('promo_price')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="quantity">Ilość</x-input-label>
                            <x-text-input type="number" id="quantity" name="quantity" value="{{ old('quantity', $item->quantity) }}" min="0" max="99" placeholder="Pole obowiązkowe" />
                            <x-input-error :messages="$errors->get('quantity')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="description" value="Opis" />
                            <x-textarea-input id="description" name="description" rows="5" placeholder="Pole nieobowiązkowe">{{ old('description', $item->description) }}</x-textarea-input>
                            <x-input-error :messages="$errors->get('description')" />
                        </x-form-group>
                        <x-form-group-form-check>
                            <x-form-group-form-check>
                                @if(old('hide', $item->hide))
                                <x-checkbox-input id="hide" name="hide" value="1" checked />
                                @else
                                <x-checkbox-input id="hide" name="hide" value="1" />
                                @endif
                                <input-label-form-check for="hide">Nie wyświetlaj</input-label-form-check>
                            </x-form-group-form-check>
                        </x-form-group-form-check>
                        <x-form-group>
                            <x-input-label for="img" value="Obrazek" />
                            <x-file-input id="img" name="img" />
                            <x-input-error :messages="$errors->get('img')" />
                        </x-form-group>
                        <x-primary-button>Edytuj</x-primary-button>
                    </form>
                    <form action="{{ route('backend.admins.products.types.destroy', [$product, $item]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <x-danger-button class="mt-1" :href="route('backend.admins.products.types.destroy', [$product, $item])" onclick="event.preventDefault(); this.closest('form').submit();">
                            Usuń
                        </x-danger-button>
                    </form>
                    <p>
                        <x-link href="{{ route('backend.admins.products.types.show', [$product, $item]) }}">Powrót</x-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>