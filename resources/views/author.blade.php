@extends('layouts.main')

@section('content')

<h1>Halaman Author {{ $author }}</h1>

@foreach ($authors as $author)
    <article class="mt-4 shadow p-3">
        <h2><a href="/blogs/{{ $author->slug }}">{{ $author->title}}</a></h2>
        <p>Category : <a href="/categories/{{ $author->category->slug }}">{{ $author->category->name }}</a></p>
        <p>{{ $author->excerpt }}</p>
    </article>
@endforeach

@endsection