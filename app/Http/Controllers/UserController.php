<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('authors', [
            "title" => "Blog",
            // "blogs" => Blog::all()
        ]);
    }

    // Route model binding
    public function show(User $author)
    {
        return view('author', [
            "title" => "Author",
            "author" => $author->name,
            "authors" => $author->blog
        ]);
    }
}
