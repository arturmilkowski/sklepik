<x-layout>
    <x-slot:title>Sklepik</x-slot>
@if ($cart->itemsCount())
    <x-cart :cart="$cart" />
@endif
@forelse ($products as $product)
    <x-products.product :product="$product" />
@empty
    <p>Brak produktów</p>
@endforelse
</x-layout>
