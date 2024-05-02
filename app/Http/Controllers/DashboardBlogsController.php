<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.blogs.index', [
            'blogs' => Blog::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blogs.create', [
            'categories' => Category::all(),
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'title' => 'required|min:4',
            'slug' => 'required|unique:blogs',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData['image'] = $request->file('image')->store('post-images');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $validatedData['published_at'] = now();

        Blog::create($validatedData);

        return redirect('/dashboard/blogs')->with('success', "Blog berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('dashboard.blogs.show', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', [
            'categories' => Category::all(),
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $rules = [
            'title' => 'required|min:4',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if ($request->slug != $blog->slug) {
            $rules['slug'] = 'required|unique:blogs';
        }


        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Blog::where('id', $blog->id)->update($validatedData);

        return redirect('/dashboard/blogs')->with('success', "Blog terupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::delete($blog->image);
        }

        Blog::destroy($blog->id);

        return redirect('/dashboard/blogs')->with('success', "Berhasil menghapus data");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
