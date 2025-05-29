@extends('layouts.app')

@section('title', $blogPost->title)

@section('content')
<div class="container" style="max-width: 700px; margin: 2rem auto;">
    <h1>{{ $blogPost->title }}</h1>
    <p style="margin-top:1.5rem;">{{ $blogPost->description }}</p>
    <p style="color: #888; font-size: 0.95rem;">
        Posted:
        {{ $blogPost->created_at ? $blogPost->created_at->format('d.m.Y H:i') : 'Unknown' }}
    </p>

    <hr>

    <h3>Comments</h3>
    @if($blogPost->comments && $blogPost->comments->count())
        @foreach($blogPost->comments as $comment)
            <div style="margin-bottom: 1.2rem; padding: 0.7rem 1rem; background: #f7f7f9; border-radius: 5px;">
                <strong>{{ $comment->user->name }}</strong>
                <span style="color: #aaa; font-size: 0.9em;">{{ $comment->created_at ? $comment->created_at->diffForHumans() : 'Unknown' }}</span>
                <p style="margin: 0.5rem 0 0 0;">{{ $comment->content }}</p>
                @can('delete', $comment)
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:#d32f2f; background:none; border:none; cursor:pointer;">Delete</button>
                    </form>
                @endcan
            </div>
        @endforeach
    @else
        <p>No comments yet.</p>
    @endif

    @auth
    <form action="{{ route('comments.store', ['blogPost' => $blogPost->id]) }}" method="POST" style="margin-top:2rem;">
        @csrf
        <div class="form-group">
            <label for="content">Add a comment:</label>
            <textarea name="content" id="content" rows="3" class="form-control" required></textarea>
            @error('content') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>
    @else
        <p style="margin-top:2rem;">You must <a href="{{ route('login') }}">login</a> to comment.</p>
    @endauth
</div>
@endsection