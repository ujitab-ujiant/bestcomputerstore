<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Computer - Portal Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS Variables */
        :root {
            --primary-color: #16a34a;
            --primary-hover: #15803d;
            --sidebar-bg: #1a202c;
            --light-text: #e2e8f0;
        }

        /* Base Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7fafc;
        }

        /* Sidebar Styles */
        .sidebar {
            min-height: 100vh;
            background: var(--sidebar-bg);
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-brand .brand-icon {
            width: 38px;
            height: 38px;
            background: var(--primary-color);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: white;
            flex-shrink: 0;
        }

        .sidebar-brand .brand-text {
            color: white;
            font-size: 1.1rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .sidebar-brand .brand-sub {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.5);
            font-weight: 400;
            display: block;
        }

        .sidebar-user {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-user .user-avatar {
            width: 36px;
            height: 36px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: white;
            font-weight: 600;
            flex-shrink: 0;
        }

        .sidebar-user .user-greeting {
            color: rgba(255,255,255,0.6);
            font-size: 0.72rem;
        }

        .sidebar-user .user-name {
            color: white;
            font-weight: 600;
            font-size: 0.88rem;
            line-height: 1.2;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-section-label {
            padding: 0.5rem 1.5rem 0.25rem;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.08rem;
            color: rgba(255,255,255,0.3);
            font-weight: 600;
        }

        .sidebar-item {
            padding: 0.25rem 1rem;
        }

        .sidebar-link {
            color: var(--light-text);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.65rem 0.75rem;
            border-radius: 0.375rem;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .sidebar-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }

        .sidebar-link.active {
            background-color: var(--primary-color);
            color: white;
        }

        .sidebar-icon {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            font-size: 0.95rem;
        }

        .sidebar-divider {
            height: 1px;
            background: rgba(255,255,255,0.08);
            margin: 0.75rem 1.5rem;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 0;
            transition: all 0.3s;
            min-height: 100vh;
        }

        /* Top Navbar */
        .top-navbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.75rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .top-navbar .nav-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1a202c;
        }

        .top-navbar .nav-title span {
            color: var(--primary-color);
        }

        .top-navbar .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .notif-btn {
            position: relative;
            background: none;
            border: none;
            color: #4a5568;
            font-size: 1.15rem;
            cursor: pointer;
            padding: 0.4rem 0.5rem;
            border-radius: 0.375rem;
            transition: background 0.2s;
        }

        .notif-btn:hover {
            background: #f7fafc;
            color: var(--primary-color);
        }

        .notif-badge {
            position: absolute;
            top: 2px;
            right: 2px;
            background: #ef4444;
            color: white;
            border-radius: 9999px;
            font-size: 0.6rem;
            font-weight: 700;
            min-width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 3px;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 9999px;
            padding: 0.3rem 0.75rem 0.3rem 0.3rem;
            font-size: 0.85rem;
        }

        .user-pill .pill-avatar {
            width: 28px;
            height: 28px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .user-pill .pill-name {
            font-weight: 600;
            color: #15803d;
        }

        .page-content {
            padding: 2rem;
        }

        /* Mobile toggle button */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: #2d3748;
            font-size: 1.5rem;
            cursor: pointer;
            margin-right: 0.5rem;
        }

        /* Modal styles */
        .modal-header {
            border-bottom: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .modal-title {
            color: #dc3545;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar { width: 220px; }
            .main-content { margin-left: 220px; }
        }

        /* Sidebar Backdrop for Mobile */
        .sidebar-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(2px);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.25s ease, visibility 0.25s ease;
        }

        .sidebar-backdrop.show {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1050;
                box-shadow: 0 0 25px rgba(0,0,0,0.4);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .mobile-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 38px;
                height: 38px;
                border-radius: 8px;
                background: #f1f5f9;
            }
            .top-navbar {
                padding: 0.75rem 1rem;
            }
            .page-content {
                padding: 1rem 0.875rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    {{-- SIDEBAR --}}
    <div class="sidebar" id="customerSidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">
                <i class="fas fa-laptop"></i>
            </div>
            <div class="brand-text">
                Best Computer
                <span class="brand-sub">Portal Pelanggan</span>
            </div>
        </div>

        <div class="sidebar-user">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <div class="user-greeting">Halo,</div>
                <div class="user-name">{{ auth()->user()->name }}</div>
            </div>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-section-label">Menu Utama</div>

            <div class="sidebar-item">
                <a href="{{ route('customer.dashboard') }}" class="sidebar-link {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-home"></i></span>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="{{ route('customer.service-history') }}" class="sidebar-link {{ request()->routeIs('customer.service-history') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-clipboard-list"></i></span>
                    <span>Riwayat Servis</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="{{ route('customer.warranty.index') }}" class="sidebar-link {{ request()->routeIs('customer.warranty.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-shield-alt"></i></span>
                    <span>Garansi Saya</span>
                </a>
            </div>

            <div class="sidebar-divider"></div>
            <div class="sidebar-section-label">Akun</div>

            <div class="sidebar-item">
                <a href="{{ route('customer.profile') }}" class="sidebar-link {{ request()->routeIs('customer.profile') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fas fa-user-circle"></i></span>
                    <span>Profil Saya</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="{{ url('/servicestatus') }}" class="sidebar-link" target="_blank" rel="noopener noreferrer">
                    <span class="sidebar-icon"><i class="fas fa-globe"></i></span>
                    <span>Lacak Servis <i class="fas fa-external-link-alt ms-1" style="font-size:0.65rem; opacity:0.6;"></i></span>
                </a>
            </div>

            <div class="sidebar-divider"></div>

            <div class="sidebar-item">
                <button type="button" class="sidebar-link" style="width:100%; text-align:left; border:none; background:transparent; cursor:pointer;" onclick="confirmCustomerLogout()">
                    <span class="sidebar-icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span>Logout</span>
                </button>
            </div>
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="main-content">
        {{-- TOP NAVBAR --}}
        <div class="top-navbar">
            <div class="d-flex align-items-center">
                <button class="mobile-toggle d-md-none me-2" type="button" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="nav-title">Best <span>Computer</span></div>
            </div>

            <div class="nav-right">
                {{-- Notification Bell --}}
                @php 
                    $unreadCount = auth()->user()->unreadNotifications->count(); 
                    $unreadList = auth()->user()->unreadNotifications->take(5);
                @endphp
                <div class="dropdown">
                    <button class="notif-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Notifikasi">
                        <i class="fas fa-bell"></i>
                        @if($unreadCount > 0)
                            <span class="notif-badge">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</span>
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
                                    <div class="fw-semibold text-truncate">{{ $notif->data['message'] ?? 'Pemberitahuan Servis' }}</div>
                                    <small class="text-muted" style="font-size:0.7rem;">{{ $notif->created_at->diffForHumans() }}</small>
                                </a>
                            </li>
                        @empty
                            <li class="px-3 py-3 text-center text-muted">
                                Tidak ada notifikasi baru
                            </li>
                        @endforelse
                        <li class="px-3 py-1 text-center">
                            <a href="{{ route('notifications.index') }}" class="text-success text-decoration-none fw-semibold" style="font-size:0.78rem;">Lihat Semua Notifikasi</a>
                        </li>
                    </ul>
                </div>

                {{-- User Pill --}}
                <div class="user-pill">
                    <div class="pill-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <span class="pill-name">{{ Str::limit(auth()->user()->name, 20) }}</span>
                </div>
            </div>
        </div>

        {{-- PAGE CONTENT --}}
        <div class="page-content">
            @yield('content')
        </div>
    </div>

    {{-- Hidden Logout Form --}}
    <form id="customerLogoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Mobile sidebar toggle with backdrop
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('customerSidebar');
        let backdrop = document.querySelector('.sidebar-backdrop');
        if (!backdrop) {
            backdrop = document.createElement('div');
            backdrop.className = 'sidebar-backdrop';
            document.body.appendChild(backdrop);
        }

        function openCustomerSidebar() {
            if (sidebar) sidebar.classList.add('active');
            if (backdrop) backdrop.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeCustomerSidebar() {
            if (sidebar) sidebar.classList.remove('active');
            if (backdrop) backdrop.classList.remove('show');
            document.body.style.overflow = '';
        }

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                if (sidebar && sidebar.classList.contains('active')) {
                    closeCustomerSidebar();
                } else {
                    openCustomerSidebar();
                }
            });
        }

        backdrop.addEventListener('click', closeCustomerSidebar);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeCustomerSidebar();
        });

        if (sidebar) {
            sidebar.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) closeCustomerSidebar();
                });
            });
        }

        function confirmCustomerLogout() {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Apakah Anda yakin ingin keluar dari portal pelanggan?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-sign-out-alt me-1"></i> Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('customerLogoutForm').submit();
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
