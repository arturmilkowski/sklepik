<x-layout>
    <x-slot:title>Produkt</x-slot>
    {{-- <h2 class="mx-2">Produkt</h2> --}}
    @if ($cart->itemsCount())
    <x-cart :cart="$cart" />
    @endif
    <div class="flex mb-24 mx-2">
        <div class="w-2/6 border-t-[1px] hover:border-dashed border-stone-900 pt-4">
            @if($product->img)
            <img src="{{ asset('storage/images/products') . '/' . $product->img }}" alt="{{ $product->name }}">
            @else
            -
            @endif
        </div>
        <div class="pl-12">
            <h2 class="border-t-[1px] hover:border-dashed border-stone-900 pt-4 mb-10">{{ $product->name }}</h2>
            <h3 class="border-t-[1px] hover:border-dashed border-stone-900 pt-4 mb-10">{{ $product->category->name }} {{ $product->concentration->name }}</h3>
            <p>{!! nl2br($product->description) !!}</p>
            <table>
                <tbody>
                    @forelse ($product->types as $type)
                    <tr>
                        <td class="border-b-[1px] border-stone-900 py-2">
                            @if($type->img)
                            <img src="{{ asset('storage/images/products/types') . '/' . $type->img }}" width="120" alt="{{ $type->name }}">
                            @else
                            -
                            @endif
                        </td>
                        <td class="border-b-[1px] border-stone-900">{{ $type->name }}</td>
                        <td class="border-b-[1px] border-stone-900">
                            @if ($type->description)
                            {!! nl2br($type->description) !!}
                            @endif
                        </td>
                        <td class="border-b-[1px] border-stone-900">
                            {{ $type->price }} zł
                        </td>
                        <td class="border-b-[1px] border-stone-900 pl-4">
                            @if ($type->quantity > 0)
                            <form action="{{ route('cart.store', [$type->id]) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="border border-stone-900 hover:border-dashed hover:bg-stone-50 px-1 hover:background">Do koszyka</button>
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
    </div>
</x-layout>
