<table border="1">
    <thead>
        <tr>
            <td>#</td>
            <td>nazwa</td>
            <td>pojemność</td>
            <td>koncentracja</td>
            <td>kategoria</td>
            <td>cena</td>
            <td>ilość</td>
            <td>wartość</td>
            <td>dodaj jeden</td>
            <td>usuń jeden</td>
        </tr>
    </thead>
    @foreach ($cart->getItems() as $item)
    <tr>
        <td>{{ $item->type_id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->type_name }}</td>
        <td>{{ $item->concentration }}</td>
        <td>{{ $item->category }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ number_format($item->subtotal_price, 2) }}</td>
        <td>
            <form action="{{ route('cart.store', [$item->type_id]) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="">+</button>
            </form>
        </td>
        <td>
            <form action="{{ route('cart.destroy', [$item->type_id]) }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="">-</button>
            </form>
        </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="10">
            <a href="{{ route('cart.destroy.all') }}" title="Usuwa cały koszyk">
                usuń koszyk
            </a>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            Produkty razem: {{ $cart->totalPrice() }} zł
        </td>
    </tr>
</table>
<br>
<table border="1">
    <tbody>
        <tr>
            <td>
                <a href="{{ route('cart.destroy.all') }}" title="Usuwa cały koszyk">
                    Usuń koszyk
                </a>
            </td>
            <td>
                <a href="{{-- route('orders.checkout.index') --}}" title="Do kasy">
                    Do kasy
                </a>
            </td>
        </tr>
    </tbody>
</table>