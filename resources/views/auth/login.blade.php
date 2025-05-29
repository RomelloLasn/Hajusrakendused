@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container" style="max-width: 400px; margin: 2rem auto;">
    <h1 style="text-align:center; margin-bottom:2rem;">Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required autofocus>
            @error('email') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
    </form>
    <p style="text-align:center; margin-top:1.5rem;">
        Don't have an account?
        <a href="{{ route('register') }}">Register now</a>
    </p>
</div>
@endsection