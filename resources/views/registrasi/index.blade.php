@extends('layouts.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <main>
            <form action="/registrasi" method="POST">

                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" placeholder="Name" required>
                    <label for="name">Name</label>
                    
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror

                </div>
               
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" placeholder="Username" required>
                    <label for="username">Username</label>

                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror

                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                    <label for="email">Email address</label>
                    @error('email')

                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror

                </div>

                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror

                </div>

                  <button type="submit" class="d-block mt-3 btn btn-primary">Registrasi</button>
                  <a href="/login">Login</a>
            </form>
        </main>
    </div>
    </div>

@endsection