@extends('layouts.customer')

@section('content')
{{-- Welcome Banner --}}
<div class="mb-4 p-4 rounded-3" style="background: linear-gradient(135deg, #16a34a, #15803d); color: white;">
    <div class="d-flex align-items-center gap-3">
        <div style="width:50px;height:50px;background:rgba(255,255,255,0.2);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;">
            <i class="fas fa-hand-wave"></i>
        </div>
        <div>
            <h4 class="mb-1 fw-bold">Selamat datang, {{ auth()->user()->name }}!</h4>
            <p class="mb-0" style="opacity:0.9;">Pantau status servis perangkat Anda di sini.</p>
        </div>
    </div>
</div>

{{-- Stats Cards --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center py-4">
                <div class="mb-2 mx-auto d-flex align-items-center justify-content-center rounded-circle"
                     style="width:48px;height:48px;background:#dbeafe;">
                    <i class="fas fa-ticket-alt text-primary" style="font-size:1.2rem;"></i>
                </div>
                <h3 class="fw-bold mb-0">{{ $totalCount ?? $totalOrders ?? 0 }}</h3>
                <small class="text-muted">Total Tiket Servis</small>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center py-4">
                <div class="mb-2 mx-auto d-flex align-items-center justify-content-center rounded-circle"
                     style="width:48px;height:48px;background:#fef3c7;">
                    <i class="fas fa-spinner text-warning" style="font-size:1.2rem;"></i>
                </div>
                <h3 class="fw-bold mb-0">{{ $activeCount ?? $activeOrders ?? 0 }}</h3>
                <small class="text-muted">Aktif</small>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center py-4">
                <div class="mb-2 mx-auto d-flex align-items-center justify-content-center rounded-circle"
                     style="width:48px;height:48px;background:#dcfce7;">
                    <i class="fas fa-check-circle text-success" style="font-size:1.2rem;"></i>
                </div>
                <h3 class="fw-bold mb-0">{{ $completedCount ?? $completedOrders ?? 0 }}</h3>
                <small class="text-muted">Selesai</small>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center py-4">
                <div class="mb-2 mx-auto d-flex align-items-center justify-content-center rounded-circle"
                     style="width:48px;height:48px;background:#f0fdf4;">
                    <i class="fas fa-shield-alt text-success" style="font-size:1.2rem;"></i>
                </div>
                <h3 class="fw-bold mb-0">{{ $warrantyActiveCount ?? $warrantyActive ?? 0 }}</h3>
                <small class="text-muted">Garansi Aktif</small>
            </div>
        </div>
    </div>
</div>

{{-- Recent Service Orders --}}
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
        <h6 class="mb-0 fw-bold"><i class="fas fa-clock me-2 text-muted"></i>Servis Terbaru</h6>
        <a href="{{ route('customer.service-history') }}" class="btn btn-sm btn-outline-success">
            Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>
    <div class="card-body p-0">
        @if(isset($recentOrders) && $recentOrders->count() > 0)
        {{-- 1. Mobile View: Detail Cards --}}
        <div class="d-block d-md-none p-3 bg-light rounded-4">
            @foreach($recentOrders as $order)
                <article class="card border-0 shadow-sm rounded-4 mb-3 bg-white overflow-hidden">
                    <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                        <span class="badge bg-light text-success border font-monospace fw-bold">{{ $order->service_code }}</span>
                        <div>
                            @switch($order->status)
                                @case('pending')
                                    <span class="badge bg-primary rounded-pill">Pending</span>
                                    @break
                                @case('process')
                                    <span class="badge bg-warning text-dark rounded-pill">Proses</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-success rounded-pill">Selesai</span>
                                    @break
                                @case('cancelled')
                                    <span class="badge bg-danger rounded-pill">Dibatalkan</span>
                                    @break
                                @default
                                    <span class="badge bg-secondary rounded-pill">{{ ucfirst($order->status) }}</span>
                            @endswitch
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h6 class="fw-bold text-dark mb-0"><i class="fas fa-laptop text-success me-1"></i>{{ $order->laptop_name }}</h6>
                                <small class="text-muted">{{ $order->laptop_type }}</small>
                            </div>
                            <small class="text-muted"><i class="far fa-calendar-alt me-1"></i>{{ $order->created_at->format('d M Y') }}</small>
                        </div>
                        <div class="pt-2 border-top">
                            <a href="{{ route('customer.service-detail', $order->id) }}" class="btn btn-sm btn-outline-success rounded-3 w-100 text-center fw-semibold py-1.5">
                                <i class="fas fa-eye me-1"></i> Lihat Detail Tiket
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- 2. Desktop View: Table --}}
        <div class="d-none d-md-block table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Kode Servis</th>
                        <th>Perangkat</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr>
                        <td class="ps-3 fw-semibold">{{ $order->service_code }}</td>
                        <td>{{ $order->laptop_name }}</td>
                        <td>
                            @switch($order->status)
                                @case('pending')
                                    <span class="badge bg-primary rounded-pill">Pending</span>
                                    @break
                                @case('process')
                                    <span class="badge bg-warning text-dark rounded-pill">Proses</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-success rounded-pill">Selesai</span>
                                    @break
                                @case('cancelled')
                                    <span class="badge bg-danger rounded-pill">Dibatalkan</span>
                                    @break
                                @default
                                    <span class="badge bg-secondary rounded-pill">{{ ucfirst($order->status) }}</span>
                            @endswitch
                        </td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('customer.service-detail', $order->id) }}" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-eye me-1"></i>Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5">
            <div class="mb-3">
                <i class="fas fa-inbox text-muted" style="font-size:3rem; opacity:0.4;"></i>
            </div>
            <h6 class="text-muted">Belum Ada Tiket Servis</h6>
            <p class="text-muted small mb-0">Tiket servis Anda akan muncul di sini ketika sudah terdaftar.</p>
        </div>
        @endif
    </div>
</div>
@endsection
