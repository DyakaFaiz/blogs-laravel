@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add blogs</h1>
  </div>
<div class="col-md-10">
    <form action="/dashboard/blogs" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3"> 
            <input type="text" class="form-control @error('title')
                is-invalid
            @enderror" name="title" id="title" placeholder="Title" value="{{ old('title') }}" required autofocus>
            <label for="title">Title</label>

            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" readonly>
            <label for="slug">Slug</label>
        </div>

        <div class="input-group mb-3">
            <label for="category">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
              <option selected>Choose...</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar blog</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            <img class="img-fluid" id="img-preview" width="350">

            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

        <input id="body" type="hidden" name="body">
        <trix-editor input="body"></trix-editor>
        
        <button type="submit">Simpan</button>
    </form>
</div>

<script>
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/blogs/checkSlug?title=' + title.value)
        .then(response=> response.json())
        .then(data => slug.value = data.slug)
    });


</script> 

@endsection