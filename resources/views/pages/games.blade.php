@extends('layouts.app')

@section('content')

<h1>All Games 🎮</h1>

<div class="games-grid">
    @foreach($games as $game)
        <a href="{{ route('game.show', $game->slug) }}">
            <img src="/images/{{ $game->image }}">
            <h3>{{ $game->name }}</h3>
        </a>
    @endforeach
</div>

@endsection