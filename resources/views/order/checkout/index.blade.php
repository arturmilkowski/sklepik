<x-layout>
    <x-slot:title>Kasa</x-slot>
    <h1>Kasa</h1>
    @if ($cart->itemsCount())
    <x-cart-no-edit :cart="$cart" />
    @endif
    <main>
        <div>Dostawa: {{ $deliveryName }}</div>
        <div>Sposób: {{ $deliveryMethod }}</div>
        <div>Koszt: {{ $deliveryCost }} zł</div>
        <div>Koszt razem z dostwą: {{ $totalPriceAndDeliveryCost }}</div>
        <p class="flex gap-8 mt-6">
            @guest
            <a href="{{ route('login') }}">Zaloguj się i kup</a>
            |
            <a href="{{ route('register') }}">Załóż konto</a>
            |
            <a href="{{-- route('orders.without-registration.create') --}}">Zamów bez rejestracji</a>
            @endguest
            @auth
            <a href="{{-- route('orders.with-registration.create') --}}">Zamów</a>
            @endauth
        </p>
    </main>
</x-layout>