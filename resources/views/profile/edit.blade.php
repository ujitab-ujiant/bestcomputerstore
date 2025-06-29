@extends('layouts.app')

@section('content')
<div class="top-navbar">
    <div class="page-title">
        <h1>Pengaturan Profil</h1>
    </div>
    <div class="user-info">
        <span class="user-name">{{ Auth::user()->name }}</span>
        <span class="user-role">{{ ucfirst(Auth::user()->role) }}</span>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Update Profile</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('update-profile') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email (Username)</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password (untuk verifikasi)</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                            <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer" onclick="togglePasswordVisibility('current_password', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Change Password</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('change-password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="change_current_password" class="form-label">Current Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" id="change_current_password" name="current_password" required>
                            <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer" onclick="togglePasswordVisibility('change_current_password', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer" onclick="togglePasswordVisibility('password', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer" onclick="togglePasswordVisibility('password_confirmation', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .top-navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    
    .page-title h1 {
        color: #2d3748;
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .user-info {
        display: flex;
        align-items: center;
    }
    
    .user-name {
        margin-right: 1rem;
        font-weight: 500;
    }
    
    .user-role {
        background-color: var(--primary-color);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.875rem;
    }
</style>
@endpush

@push('scripts')
<script>
    function togglePasswordVisibility(inputId, iconElement) {
        const input = document.getElementById(inputId);
        const icon = iconElement.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endpush