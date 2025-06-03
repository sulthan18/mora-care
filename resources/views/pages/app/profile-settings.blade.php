@extends('layouts.app')

@section('title', 'Pengaturan Akun')

@section('content')
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('profile') }}" class="text-decoration-none text-dark me-3">
            <i class="fa-solid fa-arrow-left fa-lg"></i>
        </a>
        <h5 class="mb-0 fw-bold">Pengaturan Akun</h5>
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

    <form action="{{ route('profile.updateSettings') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Avatar Section -->
        <div class="text-center mb-4">
            <div class="position-relative d-inline-block">
                <img src="{{ asset('storage/' . auth()->user()->resident->avatar) }}" 
                     alt="avatar" 
                     class="avatar mb-3" 
                     id="avatar-preview" 
                     style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                
                <label for="avatar" class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                       style="width: 32px; height: 32px; cursor: pointer; border: 2px solid white;">
                    <i class="fa-solid fa-camera fa-sm"></i>
                </label>
                
                <input type="file" 
                       class="d-none @error('avatar') is-invalid @enderror" 
                       id="avatar" 
                       name="avatar" 
                       accept="image/*"
                       onchange="previewAvatar(this)">
            </div>
            
            <p class="text-muted small mt-2">Klik ikon kamera untuk mengubah foto profil</p>
            
            @error('avatar')
                <div class="text-danger small">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
            <input type="text" 
                   class="form-control @error('name') is-invalid @enderror" 
                   id="name" 
                   name="name"
                   value="{{ old('name', auth()->user()->name) }}" 
                   placeholder="Masukkan nama lengkap">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Email Display (Read Only) -->
        <div class="mb-4">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" 
                   class="form-control" 
                   id="email" 
                   value="{{ auth()->user()->email }}" 
                   readonly
                   style="background-color: #f8f9fa;">
            <small class="text-muted">Email tidak dapat diubah</small>
        </div>

        <!-- Submit Button -->
        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-primary py-2">
                <i class="fa-solid fa-save me-2"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>

    <script>
        function previewAvatar(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').src = e.target.result;
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection