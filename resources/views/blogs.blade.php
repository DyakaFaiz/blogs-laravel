@extends('layouts.main')

@section('content')
<h1>Halaman Blog</h1>
@if($blogs->count())

<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/blogs">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if(request('author'))
                <input type="hidden" name="authors" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input value="{{ request('search') }}" type="text" class="form-control" name="search" placeholder="Search..">
                <div class="input-group-append">
                    <button class="input-group-text">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

@foreach ($blogs as $blog)
    <article class="mt-4 shadow p-3">
        <img src="{{ asset('storage/'.$blog->image) }}" width="250" alt="">
        <h2><a href="/blogs/{{ $blog->slug }}">{{ $blog->title}}</a></h2>
        
        <p>Oleh <a href="/blogs?author={{ $blog->user->username }}">{{ $blog->user->name }}</a> in <a href="/blogs?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a></p>
        
        <p>{{ $blog->excerpt }}</p>

        <a href="/blogs/{{ $blog->slug }}">Read More...</a>

        <p>{{ $blog->created_at->diffForHumans() }}</p>
    </article>
@endforeach
<div class="mt-5">
    {{ $blogs->links() }}
</div>
@else
    <p>No Post Found</p>
@endif


@endsection