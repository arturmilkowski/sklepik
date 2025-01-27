        <div class="flex mb-24 mx-2 text-xs">
            <div class="w-2/6 border-t-[1px] hover:border-dashed border-stone-900 pt-4">
@if($product->img)
                <a href="{{ route('products.show', $product) }}" title="{{ $product->name }}">
                    <img src="{{ asset('storage/images/products') . '/' . $product->img }}" alt="{{ $product->name }}">
                </a>
@else
                -
@endif
            </div>
            <div class="pl-12">
                <h2 class="border-t-[1px] hover:border-dashed border-stone-900 pt-4 mb-10">
                    <a href="{{ route('products.show', $product) }}" title="{{ $product->name }}">
                        {{ $product->name }}
                    </a>
                </h2>
                <h3 class="border-t-[1px] hover:border-dashed border-stone-900 pt-4 mb-10">
                    {{ $product->category->name }} {{ $product->concentration->name }}
                </h3>
                <p>{!! nl2br($product->description) !!}</p>
                <p class="mt-8">
                    <x-link-btn href="{{ route('products.show', $product) }}" title="{{ $product->name }}">Pokaż →</x-link-btn>
                </p>
            </div>
        </div>
