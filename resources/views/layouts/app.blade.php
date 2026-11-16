<!DOCTYPE html>
<html lang="id">
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
                <a href="{{ route('admin.customers.index') }}" class="sidebar-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-user-friends"></i></span>
                    <span>Kelola Pelanggan</span>
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('admin.warranty.index') }}" class="sidebar-link {{ request()->routeIs('admin.warranty.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-shield-alt"></i></span>
                    <span>Klaim Garansi</span>
                    @php $pendingWarranty = \App\Models\WarrantyClaim::where('status','pending')->count(); @endphp
                    @if($pendingWarranty > 0)
                    <span class="badge bg-danger ms-auto">{{ $pendingWarranty }}</span>
                    @endif
                </a>
            </div>
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
                <a href="{{ route('admin.landing-pages.index') }}" class="sidebar-link {{ request()->routeIs('admin.landing-pages.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-window-maximize"></i></span>
                    <span>Kelola Landing Page</span>
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
                <button type="button" class="sidebar-link" style="width:100%; text-align:left; border:none; background:transparent; cursor:pointer" onclick="confirmStaffLogout()">
                    <span class="sidebar-icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span>Logout</span>
                </button>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
            <button class="mobile-toggle d-md-none border-0 bg-transparent text-dark fs-5" type="button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="ms-auto d-flex align-items-center gap-3">
                @php 
                    $unreadCount = auth()->user()->unreadNotifications->count(); 
                    $unreadList = auth()->user()->unreadNotifications->take(5);
                @endphp
                <div class="dropdown">
                    <button class="btn btn-light btn-sm position-relative rounded-pill px-3 shadow-sm border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell text-secondary me-1"></i> Notifikasi
                        @if($unreadCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                            </span>
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 py-2" style="width: 320px; font-size: 0.85rem;">
                        <li class="px-3 py-2 border-bottom d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-dark">Notifikasi ({{ $unreadCount }})</span>
                            @if($unreadCount > 0)
                                <a href="javascript:void(0)" onclick="markAllNotificationsRead()" class="text-success text-decoration-none" style="font-size:0.75rem;">Tandai Dibaca</a>
                            @endif
                        </li>
                        @forelse($unreadList as $notif)
                            <li class="px-3 py-2 border-bottom">
                                <a href="{{ $notif->data['url'] ?? '#' }}" class="text-dark text-decoration-none d-block">
                                    <div class="fw-semibold text-truncate">{{ $notif->data['message'] ?? 'Pemberitahuan' }}</div>
                                    <small class="text-muted" style="font-size:0.7rem;">{{ $notif->created_at->diffForHumans() }}</small>
                                </a>
                            </li>
                        @empty
                            <li class="px-3 py-3 text-center text-muted">Tidak ada notifikasi baru</li>
                        @endforelse
                        <li class="px-3 py-1 text-center">
                            <a href="{{ route('notifications.index') }}" class="text-success text-decoration-none fw-semibold" style="font-size:0.78rem;">Lihat Semua Notifikasi</a>
                        </li>
                    </ul>
                </div>
                <div class="d-none d-sm-flex align-items-center gap-2">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                    <span class="fw-semibold text-dark small">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    {{-- Hidden Logout Form --}}
    <form id="staffLogoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmStaffLogout() {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Apakah Anda yakin ingin keluar dari sistem dashboard?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-sign-out-alt me-1"></i> Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('staffLogoutForm').submit();
                }
            });
        }

        function markAllNotificationsRead() {
            fetch('{{ route("notifications.read-all") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(() => {
                window.location.reload();
            });
        }

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
            timer: 3500,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Perhatian',
            text: '{{ session("error") }}'
        });
        @endif
    </script>
    @stack('scripts')
</body>
</html>
