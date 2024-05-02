@extends('layouts.main')

@section('content')

<h1>Halaman Category {{ $title }}</h1>
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/blogs">
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
        <h2><a href="/blogs/{{ $blog->slug }}">{{ $blog->title}}</a></h2>
        <p>By <a href="/authors/{{ $blog->user->username }}">{{ $blog->user->name }}</a></p>
        <p>{{ $blog->excerpt }}</p>
    </article>
@endforeach

@endsection