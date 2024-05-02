@extends('layouts.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <main>

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            
            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('loginError') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <form action="/login" method="POST">

                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username')
                        is-invalid
                    @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                    <label for="username">Username</label>
                    
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label f
                    or="password">Password</label>
                </div>

                  <button type="submit" class="d-block mt-3 btn btn-primary">Login</button>
                  <a href="/registrasi">Registrasi</a>
            </form>
        </main>
    </div>
    </div>

@endsection