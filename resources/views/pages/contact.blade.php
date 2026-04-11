@extends('layouts.app')

@section('content')

    <h1>Contact</h1>
    <form id="contact-form" method="POST" action="{{route('contact.send')}}">
    @csrf

    <input name="name" required>
    <input type="email" name="email" required>
    <textarea name="message" required></textarea>

    <button>Send</button>
    </form>

    @if(session('success'))
    <p class="success">{{session('success')}}</p>
    @endif

@endsection