<x-layout>
    <x-slot:title>Sklepik</x-slot>
@if ($cart->itemsCount())
    <x-cart :cart="$cart" />
@endif
{{-- <div class="mx-2 mb-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl 2xl:grid-cols-4 gap-x-1 sm:gap-x-2 md:gap-x-4 lg:gap-x-4 xl:gap-x-6 2xl:gap-x-8 gap-y-2 sm:gap-y-2 md:gap-y-4 lg:gap-y-6 xl:gap-y-8 2xl:gap-y-10">
  <div class="border border-black bg-white p-8">01</div>
  <div class="border border-black bg-white p-8">02 <br> 02</div>
  <div class="border border-black bg-white p-8">03 <br> 03 <br> 03 <br> 03 <br> 03</div>
  <div class="border border-black bg-white p-8">04</div>
  <div class="border border-black bg-white p-8">05</div>
  <div class="border border-black bg-white p-8">06</div>
  <div class="border border-black bg-white p-8">07</div>
  <div class="border border-black bg-white p-8">08</div>
  <div class="border border-black bg-white p-8">09</div>2xl:grid-cols-4
  <div class="border border-black bg-white p-8">10</div>
</div> --}}
<div class="md:mx-4 gap-1 sm:gap-1 md:gap-4 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2">
@forelse ($products as $product)
    <x-products.product :product="$product" />
@empty
    <p>Brak produktów</p>
@endforelse
</div>
</x-layout>
