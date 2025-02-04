<x-layout>
    <x-slot:title>Produkt</x-slot>

    @if ($cart->itemsCount())
    <x-cart :cart="$cart" />
    @endif

    <div class="md:flex md:gap-4 sm:mx-1 md:mx-4 mb-12 text-xs">
        <div class="md:w-1/2">
            <h2 class="border-t-1 hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 pl-1 sm:pl-0 mb-10">{{ $product->name }}</h2>
            <h3 class="border-t-1 hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 pl-1 sm:pl-0 mb-10">{{ $product->category->name }} {{ $product->concentration->name }}</h3>
            <p class="pl-1">{!! nl2br($product->description) !!}</p>
            <p class="mt-8">
                <a href="{{ URL::previous() }}" title="Powrót">← Powrót</a>
            </p>
        </div>
        <div class="md:w-1/2">
            <table class="w-full">
                <tbody>
                    @forelse ($product->types as $type)
                    <tr>
                        <td class="border-y-1 border-stone-900 dark:border-stone-600 py-2 pl-1 sm:pl-0">
                            @if($type->img)
                            <img src="{{ asset('storage/images/products/types') . '/' . $type->img }}" width="120" alt="{{ $type->name }}">
                            @else
                            -
                            @endif
                        </td>
                        <td class="border-y-1 border-stone-900 dark:border-stone-600">{{ $type->name }}</td>
                        <td class="border-y-1 border-stone-900 dark:border-stone-600">
                            @if ($type->description)
                            {!! nl2br($type->description) !!}
                            @endif
                        </td>
                        <td class="border-y-1 border-stone-900 dark:border-stone-600">
                            {{ $type->price }} zł
                        </td>
                        <td class="border-y-1 border-stone-900 dark:border-stone-600 text-right py-1 pr-1 sm:pr-0">
                            @if ($type->quantity > 0)
                            <form action="{{ route('cart.store', [$type->id]) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="border border-stone-900 dark:border-stone-600 hover:bg-stone-100 hover:border-dashed dark:hover:bg-stone-900 dark:hover:text-stone-300 py-1 px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 align-middle hidden md:inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="inline-block align-middle">Do koszyka</span>
                                </button>
                            </form>
                            @else
                            Wszystkie sprzedane
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td><span class="bg-yellow-300 px-2 py-1">Wszystkie sprzedane</span></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($product->img)
    <div class="sm:mx-1 md:mx-4">
        <img src="{{ asset('storage/images/products') . '/' . $product->img }}" alt="{{ $product->name }}">
    </div>
    @endif

    <p class="mt-8 sm:mx-1 md:mx-4">
        <a href="{{ URL::previous() }}" title="Powrót">← Powrót</a>
    </p>

    {{-- <div class="flex mb-24 mx-2 text-xs">
        <div class="w-2/6 border-t-[1px] hover:border-dashed border-stone-900 dark:border-stone-600 pt-4">
            @if($product->img)
            <img src="{{ asset('storage/images/products') . '/' . $product->img }}" alt="{{ $product->name }}">
            @else
            -
            @endif
        </div>
        <div class="pl-12">
            <h2 class="border-t-[1px] hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 mb-10">{{ $product->name }}</h2>
            <h3 class="border-t-[1px] hover:border-dashed border-stone-900 dark:border-stone-600 pt-4 mb-10">{{ $product->category->name }} {{ $product->concentration->name }}</h3>
            <p>{!! nl2br($product->description) !!}</p>
            <table>
                <tbody>
                    @forelse ($product->types as $type)
                    <tr>
                        <td class="border-b-1 border-stone-900 dark:border-stone-600 py-2">
                            @if($type->img)
                            <img src="{{ asset('storage/images/products/types') . '/' . $type->img }}" width="120" alt="{{ $type->name }}">
                            @else
                            -
                            @endif
                        </td>
                        <td class="border-b-1 border-stone-900 dark:border-stone-600">{{ $type->name }}</td>
                        <td class="border-b-1 border-stone-900 dark:border-stone-600">
                            @if ($type->description)
                            {!! nl2br($type->description) !!}
                            @endif
                        </td>
                        <td class="border-b-1 border-stone-900 dark:border-stone-600">
                            {{ $type->price }} zł
                        </td>
                        <td class="border-b-1 border-stone-900 dark:border-stone-600 pl-4">
                            @if ($type->quantity > 0)
                            <form action="{{ route('cart.store', [$type->id]) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="border border-stone-900 dark:border-stone-600 hover:bg-stone-100 hover:border-dashed dark:hover:bg-stone-900 dark:hover:text-stone-300 py-1 px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline-block align-middle">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="inline-block align-middle">Do koszyka</span>
                                </button>
                            </form>
                            @else
                            Wszystkie sprzedane
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>Brak</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <p class="mt-8">
                <a href="{{ URL::previous() }}" title="Powrót">← Powrót</a>
            </p>
        </div>
    </div> --}}
</x-layout>
