<?php


namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $blogPost = BlogPost::create($validated);

        // Redirect to the show page for the new post
        return redirect()->route('blog.show', $blogPost)->with('success', 'Post created successfully.');
    }

    public function show(BlogPost $blogPost)
    {
        return view('blog.show', compact('blogPost'));
    }

    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit', compact('blogPost'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $blogPost->update($validated);

        return redirect()->route('blog.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect()->route('blog.index')->with('success', 'Post deleted successfully.');
    }
}