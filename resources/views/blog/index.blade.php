@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    @if ($posts->count())
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                    <div>
                        <a href="{{ route('blog.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('blog.destroy', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-3">
            {{ $posts->links() }}
        </div>
    @else
        <p>No blog posts found. <a href="{{ route('blog.create') }}">Create one now!</a></p>
    @endif
</div>
@endsection