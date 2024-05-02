@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Blogs</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-10">
  <a href="/dashboard/blogs/create">Add new blogs</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">images</th>
        <th scope="col">Excerpt</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($blogs as $blog)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $blog->title }}</td>
        <td>{{ $blog->category->name }}</td>
        <td><img src="{{ asset('storage/'.$blog->image) }}" width="200" alt=""></td>
        <td>{{ $blog->excerpt }}</td>
        <td>
          <a href="/dashboard/blogs/{{ $blog->slug }}" class="btn">Detail</a>

          <a href="/dashboard/blogs/{{ $blog->slug }}/edit" class="btn">Edit</a>

          <form action="/dashboard/blogs/{{ $blog->slug }}" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="btn" onclick="return confirm('are you sure?')">Delete</button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection