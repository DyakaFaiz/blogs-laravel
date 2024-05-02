@extends('layouts.main')

@section('content')

<h1>Halaman Categories</h1>

@foreach ($categories as $category)
    <article class="mt-4 shadow p-3">
        <ul>
            <li>
                <h2><a href="/categories/{{ $category->slug }}">{{ $category->name}}</a></h2>
            </li>
        </ul>
    </article>
@endforeach

@endsection