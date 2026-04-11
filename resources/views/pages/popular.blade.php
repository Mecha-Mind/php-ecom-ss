@extends('layouts.app')

@section('content')

<h1>Most Popular Games</h1>

    @foreach($products as $index => $product)

        <section class="featured-card {{ $index % 2 ? 'reverse' : '' }}">
            <div class="featured-image">
                <img src="{{ asset('images/'.$product->image) }}" alt="">
            </div>

            <div class="featured-content">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>

                <a href="#" class="btn">
                    Play Now
                </a>
            </div>
        </section>

    @endforeach

@endsection