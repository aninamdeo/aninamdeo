<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()->paginate(9);
        return view('blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $blog->increment('views');
        $related = Blog::published()->where('id', '!=', $blog->id)->where('category', $blog->category)->limit(3)->get();
        return view('blog.show', compact('blog', 'related'));
    }
}
