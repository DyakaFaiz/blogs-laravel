<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs', [
            "title" => "Blog",
            "page" => "Blog",
            // "blogs" => Blog::all()
            "blogs" => Blog::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);
    }

    // Route model binding
    public function show(Blog $post)
    {
        return view('blog', [
            "page" => "Blogs",
            "title" => "Blogs",
            "blogs" => $post
        ]);
    }
}
