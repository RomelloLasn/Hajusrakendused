@extends('layouts.app')

@section('title', 'Create Blog Post')

@section('content')
<div class="container" style="max-width: 600px; margin: 2rem auto;">
    <h1>Create Blog Post</h1>
    <form method="POST" action="{{ route('blog.store') }}">
        @csrf
        <div class="form-group" style="margin-bottom: 1.2rem;">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
            @error('title') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group" style="margin-bottom: 1.2rem;">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
            @error('description') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;">Create</button>
    </form>
</div>
@endsection