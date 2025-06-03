@extends('layouts.app')

@section('title', 'Ubah Kata Sandi')

@section('content')
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('profile') }}" class="text-decoration-none text-dark me-3">
            <i class="fa-solid fa-arrow-left fa-lg"></i>
        </a>
        <h5 class="mb-0 fw-bold">Ubah Kata Sandi</h5>
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

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <div>
                    <h6 class="mb-1">Keamanan Akun</h6>
                    <small class="text-muted">Pastikan kata sandi Anda kuat dan mudah diingat</small>
                </div>
            </div>

            <form action="{{ route('profile.updatePassword') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Current Password -->
                <div class="mb-3">
                    <label for="current_password" class="form-label fw-semibold">
                        <i class="fa-solid fa-key me-2"></i>Password Lama
                    </label>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                        id="current_password" name="current_password" placeholder="Masukkan password lama">
                    @error('current_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="mb-3">
                    <label for="new_password" class="form-label fw-semibold">
                        <i class="fa-solid fa-lock me-2"></i>Password Baru
                    </label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        id="new_password" name="new_password" placeholder="Masukkan password baru (minimal 6 karakter)">
                    @error('new_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm New Password -->
                <div class="mb-4">
                    <label for="new_password_confirmation" class="form-label fw-semibold">
                        <i class="fa-solid fa-shield-alt me-2"></i>Konfirmasi Password Baru
                    </label>
                    <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                        id="new_password_confirmation" name="new_password_confirmation" placeholder="Ulangi password baru">
                    @error('new_password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password Strength Info -->
                <div class="alert alert-info d-flex align-items-start"
                    style="background-color: #e7f3ff; border-color: #b3d9ff;">
                    <i class="fa-solid fa-info-circle me-2 mt-1" style="color: #0066cc;"></i>
                    <div>
                        <small>
                            <strong>Tips Password Kuat:</strong><br>
                            • Minimal 6 karakter<br>
                            • Kombinasi huruf besar, kecil, dan angka<br>
                            • Hindari informasi pribadi yang mudah ditebak
                        </small>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary py-2">
                        <i class="fa-solid fa-save me-2"></i>
                        Ubah Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Show/Hide Password Toggle Script -->
    <script>
        // Optional: Add show/hide password functionality
        function togglePassword(fieldId, iconId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
@endsection
