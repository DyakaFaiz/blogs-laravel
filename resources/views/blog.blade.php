@extends('layouts.main')

@section('content')
<article class="mt-4 shadow p-3">
    <p>Oleh <a href="/blogs?author={{ $blogs->user->username }}">{{ $blogs->user->name }}</a> in <a href="/blogs?category={{ $blogs->category->slug }}">{{ $blogs->category->name }}</a></p>
    <h2>{{ $blogs->title }}</h2>
    <p>{!! $blogs->body !!}</p>
    <a href="/blogs">Back to blogs</a>
</article>
@endsection