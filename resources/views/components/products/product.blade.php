        <div class="product">
            <div class="image">
                @if($product->img)
                <a href="{{-- route('products.show', $product) --}}" title="{{ $product->name }}">
                    <img src="{{ asset('storage/images/products') . '/' . $product->img }}" alt="{{ $product->name }}">
                </a>
                @else
                -
                @endif
            </div>
            <div class="content">
                <h2>
                    <a href="{{-- route('products.show', $product) --}}" title="{{ $product->name }}">
                        {{ $product->name }}
                    </a>
                </h2>
                <h3>{{ $product->category->name }} {{ $product->concentration->name }}</h3>
                <p>{!! $product->description !!}</p>
                <p>
                    <a href="{{-- route('products.show', $product) --}}" title="{{ $product->name }}">Pokaż</a>
                </p>
            </div>
        </div>
