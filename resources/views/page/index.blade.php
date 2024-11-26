<x-layout>
    <x-slot:title>Strona główna</x-slot>
    <h1>Strona główna</h1>
    @forelse ($products as $product)
    <x-products.product :product="$product" />
    @empty
    <p>Brak produktów</p>
    @endforelse
</x-layout>
