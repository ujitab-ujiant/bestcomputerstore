<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Computer Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/layouts/app.css', 'resources/js/layouts/app.js'])
    @stack('styles')
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <span>Best Computer</span>
        </div>
        <div class="sidebar-menu">
            <div class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-tachometer-alt"></i></span>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('service-orders.index') }}" class="sidebar-link {{ request()->routeIs('service-orders.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-clipboard-list"></i></span>
                    <span>Service Orders</span>
                </a>
            </div>
            @if(Auth::user()->role == 'admin')
            <div class="sidebar-item">
                <a href="{{ route('technicians.index') }}" class="sidebar-link {{ request()->routeIs('technicians.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-users"></i></span>
                    <span>Manage Teknisi</span>
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-box"></i></span>
                    <span>Manage Produk</span>
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('profile') }}" class="sidebar-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-user-cog"></i></span>
                    <span>Pengaturan Profil</span>
                </a>
            </div>
            @endif
            <div class="sidebar-item">
                <a href="{{ url('/') }}" class="sidebar-link" target="_blank">
                    <span class="sidebar-icon"><i class="fas fa-globe"></i></span>
                    <span>Visit Website</span>
                </a>
            </div>
            <div class="sidebar-item">
                <button type="button" class="sidebar-link" style="width:100%; text-align:left; border:none; background:transparent; cursor:pointer" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <span class="sidebar-icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span>Logout</span>
                </button>
            </div>
        </div>
    </div>

    <div class="main-content">
        <button class="mobile-toggle d-md-none" type="button">
            <i class="fas fa-bars"></i>
        </button>

        @yield('content')
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Logout
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Apakah Anda yakin ingin keluar dari sistem?</p>
                    <small class="text-muted">Anda perlu login kembali untuk mengakses dashboard.</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Batal
                    </button>
                    <form action="{{ route('logout') }}" method="post" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt me-1"></i>Ya, Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>