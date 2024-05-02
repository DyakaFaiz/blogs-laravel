@extends('dashboard.layouts.main')

@section('content')
<div class="table-responsive col-lg-10">
    <a href="/dashboard/blogs">back</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Excerpt</th>
        <th scope="col">Body</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $blog->title }}</td>
        <td>{{ $blog->category->name }}</td>
        <td>{{ $blog->excerpt }}</td>
        <td>{!! $blog->body !!}</td>
        <td>
            <a href="/dashboard/blogs/{{ $blog->slug }}/edit">Edit</a>
            

            <form action="/dashboard/blogs/{{ $blog->slug }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('are you sure?')" class="btn">Delete</button>
            </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection