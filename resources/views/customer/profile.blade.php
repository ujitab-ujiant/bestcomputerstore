@extends('layouts.customer')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold mb-1">Profil Saya</h4>
    <p class="text-muted small mb-0">Kelola informasi akun dan kata sandi login Anda.</p>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h6 class="fw-bold mb-0 text-success"><i class="fas fa-user-circle me-2"></i>Informasi Akun</h6>
            </div>
            <div class="card-body p-4">
                <div class="alert alert-light border py-2 px-3 small mb-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="fas fa-mobile-alt text-success fs-5"></i>
                        <div>
                            <div class="text-muted" style="font-size:0.75rem;">Nomor Telepon Login:</div>
                            <strong class="text-dark font-monospace">{{ $user->phone ?? 'Belum ada nomor HP' }}</strong>
                        </div>
                    </div>
                </div>

                <form action="{{ route('customer.profile.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled readonly style="background-color: #f1f5f9;">
                        <small class="text-muted">Email sistem otomatis dibuat dari nomor telepon Anda.</small>
                    </div>

                    <button type="submit" class="btn btn-success px-4 py-2 fw-semibold">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan Profil
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h6 class="fw-bold mb-0 text-success"><i class="fas fa-lock me-2"></i>Ubah Password</h6>
            </div>
            <div class="card-body p-4">
                <div class="alert alert-warning py-2 px-3 small mb-4">
                    <i class="fas fa-info-circle me-1"></i> Password bawaan akun Anda adalah <strong>4 digit terakhir nomor telepon</strong> saat mendaftar servis. Anda dapat menggantinya dengan password yang lebih aman di bawah ini.
                </div>

                <form action="{{ route('customer.profile.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="name" value="{{ $user->name }}">

                    <div class="mb-3">
                        <label for="current_password" class="form-label fw-semibold">Password Saat Ini</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required placeholder="Masukkan password saat ini">
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password Baru</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Minimal 4 karakter">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi password baru">
                    </div>

                    <button type="submit" class="btn btn-outline-success px-4 py-2 fw-semibold">
                        <i class="fas fa-key me-1"></i> Update Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
