<div>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>nazwa</th>
                <th>pojemność</th>
                <th>koncentracja</th>
                <th>kategoria</th>
                <th>cena</th>
                <th>ilość</th>
                <th>wartość</th>
            </tr>
        </thead>
        <tbody>
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
            </tr>
            @endforeach
            <tr>
                <td colspan="10">
                    Produkty razem: {{ $cart->totalPrice() }} zł
                </td>
            </tr>
        </tbody>
    </table>
</div>