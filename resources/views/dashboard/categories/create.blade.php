@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add categories</h1>
  </div>
<div class="col-md-10">
    <form action="/dashboard/categories" method="POST">
        @csrf
        <div class="form-floating mb-3"> 
            <input type="text" class="form-control @error('name')
                is-invalid
            @enderror" name="name" id="name" placeholder="name" value="{{ old('name') }}" required autofocus>
            <label for="name">Name</label>

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" readonly>
            <label for="slug">Slug</label>
        </div>

        <button type="submit">Simpan</button>
    </form>
</div>

<script>
    const name = document.getElementById('name');
    const slug = document.getElementById('slug');

    name.addEventListener('change', function(){
        fetch('/dashboard/categories/checkSlug?name=' + name.value)
        .then(response=> response.json())
        .then(data => slug.value = data.slug)
    });


</script> 

@endsection