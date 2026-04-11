@props(['product'])

<a class="card">
    <h3>{{ $product->name }}</h3>
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name}}" loading="lazy">

    <div class="card-body">
        <p>{{ $product->price }}</p>
    </div>
</a>