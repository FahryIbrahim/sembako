@foreach($products as $product)
            <p>{{ $product->name }}   Rp {{ number_format($product->price, 0, ',', '.') }}</p>
@endforeach
