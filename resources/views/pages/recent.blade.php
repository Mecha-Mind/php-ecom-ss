@extends('layouts.app')

@section('content')

<h1>Recently Added</h1>

<div class="grid">
    @foreach($products as $product)
        <x-product-card :product="$product" />
    @endforeach
</div>

@endsection