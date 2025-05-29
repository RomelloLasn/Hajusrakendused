{{-- filepath: resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container" style="max-width: 400px; margin: 2rem auto;">
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required autofocus>
            @error('name') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            @error('email') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            @error('password') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</div>
@endsection