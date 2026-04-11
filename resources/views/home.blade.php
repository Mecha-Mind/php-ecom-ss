@extends('layouts.app')

@section('content')

    <section class="hero">
        <h1>Play & Enjoy 🎮</h1>
        <p>Discover the best games online</p>

        <a href="{{route('popular')}}" class="hero-btn">Start Playing</a>
    </section>

    <x-products-section :products="$products" />
@endsection