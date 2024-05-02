@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit blogs</h1>
  </div>
<div class="col-md-10">
    <form action="/dashboard/blogs/{{ $blog->slug }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-floating mb-3"> 
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ old('title', $blog->title) }}" required>
            <label for="title">Title</label>

            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{ $blog->slug }}" readonly>
            <label for="slug">Slug</label>
        </div>

        <div class="mb-3">
            <input type="hidden" name="oldImage" value="{{ $blog->image }}">
            <label for="image" class="form-label">Gambar blog</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @if ($blog->image)
                <img src="{{ asset('storage/'.$blog->image) }}" class="img-fluid d-block" id="img-preview" width="350">
            @else
                <img class="img-fluid" id="img-preview" width="350">
            @endif

            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

        <div class="input-group mb-3">
            <label for="category">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
              <option selected>Choose...</option>
              @foreach ($categories as $category)
              @if(old('category_id',$blog->category_id) == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
              @endforeach
            </select>
        </div>

        <input id="body" type="hidden" value="{{ $blog->body }}" name="body">
        <trix-editor input="body"></trix-editor>
        
        <button type="submit">Update</button>
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