<x-layout>
    <x-slot:title>Produkt</x-slot>
    <h1>Produkt</h1>
    @if ($cart->itemsCount())
    <x-cart :cart="$cart" />
    @endif
    <div class="product-show">
        <div class="product-show-image">
            @if($product->img)
            <img src="{{ asset('storage/images/products') . '/' . $product->img }}" alt="{{ $product->name }}">
            @else
            -
            @endif
        </div>
        <div class="product-show-content">
            <h1>{{ $product->name }}</h1>
            <h2>{{ $product->category->name }} {{ $product->concentration->name }}</h2>
            <p>{!! $product->description !!}</p>
            <table border="1">
                <tbody>
                    @forelse ($product->types as $type)
                    <tr>
                        <td>
                            @if($type->img)
                            <img src="{{ asset('storage/images/products/types') . '/' . $type->img }}" width="120" alt="{{ $type->name }}">
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ $type->name }}</td>
                        <td>
                            @if ($type->description)
                            {!! $type->description !!}
                            @endif
                        </td>
                        <td>
                            {{ $type->price }} zł
                        </td>
                        <td>
                            @if ($type->quantity > 0)
                            <form action="{{ route('cart.store', [$type->id]) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit">Do koszyka</button>
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
        </div>
    </div>

    <p><a href="{{ URL::previous() }}">Powrót</a></p>
</x-layout>
