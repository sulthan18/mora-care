@extends('layouts.no-nav')

@section('title', 'Masuk')

@section('content')
    <h5 class="fw-bold mt-5">Selamat datang di Moracare 👋</h5>
    <p class="text-muted mt-2">Silahkan masuk untuk melanjutkan</p>

    <button class="btn btn-primary py-2 w-100 mt-4" type="button">
        <i class="fa-brands fa-google me-2"></i>
        Masuk dengan Google
    </button>

    <div class="d-flex align-items-center mt-2">
        <hr class="flex-grow-1">
        <span class="mx-2">atau</span>
        <hr class="flex-grow-1">
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert"
            style="background-color: #e6f9e6; border-color: #b2e2b2;">
            <i class="fas fa-check-circle me-2" style="color: #28a745"></i>
            <div>
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" placeholder="Masukkan email Anda">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" placeholder="Masukkan password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary w-100 mt-2" type="submit" color="primary" id="btn-login">
            Masuk
        </button>

        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('register') }}" class="text-decoration-none text-primary">Belum punya akun?</a>
            <a href="" class="text-decoration-none text-primary">Lupa
                Password</a>
        </div>

    </form>
@endsection
