@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Blogs Category</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-10">
  <a href="/dashboard/categories/create">Add new category</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Category Name</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>
          <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn">Edit</a>

          <form action="/dashboard/categories/{{ $category->slug }}" method="POST">
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