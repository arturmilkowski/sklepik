        <div class="border border-stone-50 dark:border-stone-900 hover:border-stone-400 dark:hover:border-stone-600 hover:border-dashed bg-white p-6" style="background-image: url('{{ asset('storage/images/products') . '/' . $product->img }}');">
            <h2 class="mb-6">
                <a href="{{ route('products.show', $product) }}" title="{{ $product->name }}">
                    <span class="bg-stone-50 py-0.5 px-1">
                        {{ $product->name }}
                    </span>
                </a>
            </h2>
            <h3>
                <span class="bg-stone-50 py-0.5 px-1">
                    {{ $product->category->name }} {{ $product->concentration->name }}
                </span>
            </h3>
            <p class="py-12">{!! nl2br($product->description) !!}</p>
            <p class="">
                <a class="bg-stone-50 hover:bg-white py-2 px-4" href="{{ route('products.show', $product) }}" title="{{ $product->name }}">Pokaż →</a>
            </p>
        </div>
        {{-- <div class="flex mb-24 mx-2 text-xs">
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
        </div> --}}
