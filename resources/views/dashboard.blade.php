@extends('layouts.app')

@push('styles')
    @vite('resources/css/dashboard.css')
@endpush

@section('content')
<div class="top-navbar">
    <div class="welcome-text">
        <h1>
            @if(Auth::user()->role === 'admin')
                Admin Dashboard
            @else
                Teknisi Dashboard
            @endif
        </h1>
        <p>Selamat datang, {{ Auth::user()->name }}</p>
    </div>
    <div class="user-info">
        <span class="user-name">{{ Auth::user()->name }}</span>
        <span class="user-role">{{ ucfirst(Auth::user()->role) }}</span>
        {{-- Hanya admin yang bisa ganti password --}}
        @if(Auth::user()->role === 'admin')
            <button class="btn btn-sm btn-outline-dark ms-2" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                <i class="fas fa-key"></i> Ganti Password
            </button>
        @endif
    </div>
</div>

@if(Auth::user()->role === 'technician')
    <div class="technician-welcome">
        <h2><i class="fas fa-tools me-2"></i>Selamat Bekerja, {{ Auth::user()->name }}!</h2>
        <p>Kelola service order yang ditugaskan kepada Anda dengan efektif dan profesional.</p>
    </div>
@endif

@if(Auth::user()->role === 'admin')
    <div class="stats-grid">
        <div class="stats-card stats-pending">
            <h3>Pending Orders</h3>
            <p class="number">{{ $pendingCount }}</p>
            <p class="subtitle">Menunggu proses</p>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
        
        <div class="stats-card stats-process">
            <h3>In Process</h3>
            <p class="number">{{ $processCount }}</p>
            <p class="subtitle">Sedang dikerjakan</p>
            <div class="icon">
                <i class="fas fa-cog"></i>
            </div>
        </div>
        
        <div class="stats-card stats-completed">
            <h3>Completed</h3>
            <p class="number">{{ $completedCount }}</p>
            <p class="subtitle">Telah selesai</p>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
        
        <div class="stats-card stats-technicians">
            <h3>Total Teknisi</h3>
            <p class="number">{{ $techniciansCount ?? 0 }}</p>
            <p class="subtitle">Teknisi aktif</p>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
        
        <div class="stats-card stats-products">
            <h3>Total Produk</h3>
            <p class="number">{{ $productsCount ?? 0 }}</p>
            <p class="subtitle">Produk tersedia</p>
            <div class="icon">
                <i class="fas fa-box"></i>
            </div>
        </div>
    </div>
@else
    <div class="stats-grid technician-grid">
        <div class="stats-card stats-pending">
            <h3>Pending Orders</h3>
            <p class="number">{{ $pendingCount ?? 0 }}</p>
            <p class="subtitle">Menunggu proses</p>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
        
        <div class="stats-card stats-process">
            <h3>In Process</h3>
            <p class="number">{{ $processCount ?? 0 }}</p>
            <p class="subtitle">Sedang dikerjakan</p>
            <div class="icon">
                <i class="fas fa-cog"></i>
            </div>
        </div>
        
        <div class="stats-card stats-completed">
            <h3>Completed</h3>
            <p class="number">{{ $completedCount ?? 0 }}</p>
            <p class="subtitle">Telah selesai</p>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>
@endif

<div class="section-divider"></div>

@if(Auth::user()->role === 'admin')
<div class="row">
    <div class="col-lg-6">
        <div class="management-section">
            <div class="management-header">
                <h5><i class="fas fa-cogs me-2"></i>Management Center</h5>
            </div>
            <div class="quick-actions">
                <a href="{{ route('technicians.index') }}" class="action-btn action-technicians">
                    <div class="action-btn-content">
                        <div class="action-btn-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="action-btn-text">
                            <h6>Manage Teknisi</h6>
                            <p>Kelola Akun Teknisi</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </a>
                
                <a href="{{ route('service-orders.index') }}" class="action-btn action-orders">
                    <div class="action-btn-content">
                        <div class="action-btn-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="action-btn-text">
                            <h6>Manage Service Orders</h6>
                            <p>Monitor semua service orders</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </a>
                
                <a href="{{ route('admin.products.index') }}" class="action-btn action-products">
                    <div class="action-btn-content">
                        <div class="action-btn-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="action-btn-text">
                            <h6>Manage Products</h6>
                            <p>Kelola katalog produk dan inventory</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </a>
                
                <a href="{{ route('profile') }}" class="action-btn action-profile">
                    <div class="action-btn-content">
                        <div class="action-btn-icon">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="action-btn-text">
                            <h6>Pengaturan Profil</h6>
                            <p>Pengaturan profil dan sistem</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="activity-section">
            <div class="activity-header">
                <h5><i class="fas fa-chart-line me-2"></i>Aktivitas Terkini</h5>
            </div>
            <div class="quick-stats">
                <div class="quick-stat-item">
                    <div class="icon text-primary">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div>
                        <h6>Hari Ini</h6>
                        <p>{{ $todayOrders ?? 0 }} Orders</p>
                    </div>
                </div>
                
                <div class="quick-stat-item">
                    <div class="icon text-success">
                        <i class="fas fa-calendar-week"></i>
                    </div>
                    <div>
                        <h6>Minggu Ini</h6>
                        <p>{{ $weeklyOrders ?? 0 }} Orders</p>
                    </div>
                </div>
                
                <div class="quick-stat-item">
                    <div class="icon text-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <h6>Bulan Ini</h6>
                        <p>{{ $monthlyOrders ?? 0 }} Orders</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="recent-table">
    <div class="card">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-history me-2"></i>
                    @if(Auth::user()->role === 'admin')
                        Recent Service Orders
                    @else
                        My Recent Service Orders
                    @endif
                </h5>
                <small class="text-muted">
                    @if(Auth::user()->role === 'admin')
                        Menampilkan 10 order terbaru
                    @else
                        Menampilkan tugas terbaru Anda
                    @endif
                </small>
            </div>
        </div>
        <div class="card-body p-0">
            @if(isset($recentOrders) && count($recentOrders) > 0)
            {{-- 1. Mobile View: Detail Cards --}}
            <div class="d-block d-md-none p-3 bg-light rounded-4">
                @foreach($recentOrders as $order)
                    <article class="card border-0 shadow-sm rounded-4 mb-3 bg-white overflow-hidden">
                        <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-light text-success border font-monospace fw-bold">{{ $order->service_code }}</span>
                                <small class="text-muted ms-2" style="font-size: 0.7rem;"><i class="far fa-calendar-alt me-1"></i>{{ $order->created_at->format('d M Y') }}</small>
                            </div>
                            <div>
                                @if($order->status == 'pending')
                                    <span class="badge bg-primary rounded-pill">Pending</span>
                                @elseif($order->status == 'process')
                                    <span class="badge bg-warning text-dark rounded-pill">Process</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge bg-success rounded-pill">Completed</span>
                                @else
                                    <span class="badge bg-danger rounded-pill">Cancelled</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h6 class="fw-bold text-dark mb-0">{{ $order->customer_name }}</h6>
                                    <div class="d-flex align-items-center gap-1 text-muted small mt-0.5">
                                        <i class="fas fa-laptop text-success"></i>
                                        <span>{{ $order->laptop_name }}</span>
                                        <span class="badge bg-light text-secondary border ms-1" style="font-size: 0.65rem;">{{ $order->laptop_type }}</span>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->role === 'admin')
                            <div class="small text-muted mb-2.5 pb-2 border-bottom">
                                <i class="fas fa-user-cog me-1 text-secondary"></i>
                                <span>Teknisi: <strong>{{ $order->technician_name ?? 'Belum ditugaskan' }}</strong></span>
                            </div>
                            @endif
                            <div class="d-flex gap-2 pt-1">
                                <a href="{{ route('service-orders.show', $order->id) }}" class="btn btn-sm btn-info text-white rounded-3 flex-fill text-center fw-semibold py-1.5">
                                    <i class="fas fa-eye me-1"></i> Detail
                                </a>
                                @if(Auth::user()->role === 'admin' || $order->technician_id === Auth::id())
                                    <a href="{{ route('service-orders.edit', $order->id) }}" class="btn btn-sm btn-warning text-white rounded-3 px-3 py-1.5 fw-semibold" title="Edit">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- 2. Desktop View: Table --}}
            <div class="d-none d-md-block table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3 py-3">Service Code</th>
                            <th>Customer</th>
                            <th>Laptop</th>
                            @if(Auth::user()->role === 'admin')
                                <th>Teknisi</th>
                            @endif
                            <th>Status</th>
                            <th>Created</th>
                            <th class="text-end pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                        <tr>
                            <td class="ps-3">
                                <strong class="text-success font-monospace">{{ $order->service_code }}</strong>
                            </td>
                            <td class="fw-bold text-dark">{{ $order->customer_name }}</td>
                            <td>
                                <div>
                                    <strong>{{ $order->laptop_name }}</strong>
                                    <br><small class="text-muted">{{ $order->laptop_type }}</small>
                                </div>
                            </td>
                            @if(Auth::user()->role === 'admin')
                            <td>
                                <span class="badge bg-secondary-subtle text-dark border">
                                    {{ $order->technician_name ?? 'Belum ditugaskan' }}
                                </span>
                            </td>
                            @endif
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-pill fw-semibold">Pending</span>
                                @elseif($order->status == 'process')
                                    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2.5 py-1 rounded-pill fw-semibold">Process</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-pill fw-semibold">Completed</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2.5 py-1 rounded-pill fw-semibold">Cancelled</span>
                                @endif
                            </td>
                            <td class="small text-muted">{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td class="text-end pe-3">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('service-orders.show', $order->id) }}" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if(Auth::user()->role === 'admin' || $order->technician_id === Auth::id())
                                        <a href="{{ route('service-orders.edit', $order->id) }}" class="btn btn-sm btn-warning text-white">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ Auth::user()->role === 'admin' ? '7' : '6' }}" class="text-center py-4 text-muted">
                                Belum ada service order
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5 text-muted">
                <i class="fas fa-inbox mb-2" style="font-size: 2.5rem; opacity: 0.4;"></i>
                <p class="mb-0">Belum ada service order terbaru</p>
            </div>
            @endif
        </div>
        <div class="card-footer bg-light py-3">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('service-orders.index') }}" class="btn btn-primary">
                    <i class="fas fa-list me-1"></i>
                    @if(Auth::user()->role === 'admin')
                        View All Orders
                    @else
                        View My Orders
                    @endif
                </a>
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('service-orders.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-1"></i>Add New Order
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Modal Change Password - Hanya ditampilkan untuk Admin --}}
@if(Auth::user()->role === 'admin')
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">
                    <i class="fas fa-key me-2"></i>Ganti Password
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('change-password') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                            <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer" onclick="togglePasswordVisibility('current_password', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer" onclick="togglePasswordVisibility('password', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer" onclick="togglePasswordVisibility('password_confirmation', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
    @vite('resources/js/dashboard.js')
@endpush