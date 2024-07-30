@foreach($products as $product)
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
@endforeach
