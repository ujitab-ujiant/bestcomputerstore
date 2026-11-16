@extends('layouts.customer')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Riwayat Servis</h4>
        <p class="text-muted small mb-0">Daftar semua perangkat dan tiket servis Anda di Best Computer Bogor.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        @if($serviceOrders->count() > 0)
        {{-- 1. Mobile View: Detail Cards --}}
        <div class="d-block d-md-none p-3 bg-light rounded-4">
            @foreach($serviceOrders as $order)
                <article class="card border-0 shadow-sm rounded-4 mb-3 bg-white overflow-hidden">
                    <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <span class="badge bg-light text-success border font-monospace fw-bold">{{ $order->service_code }}</span>
                            <small class="text-muted ms-2" style="font-size:0.7rem;"><i class="far fa-calendar-alt me-1"></i>{{ $order->created_at->format('d M Y') }}</small>
                        </div>
                        <div>
                            @switch($order->status)
                                @case('pending')
                                    <span class="badge bg-primary rounded-pill">Pending</span>
                                    @break
                                @case('process')
                                    <span class="badge bg-warning text-dark rounded-pill">Dalam Pengerjaan</span>
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
                            <div class="text-end">
                                <span class="fw-bold text-success">{{ $order->price ? 'Rp ' . number_format($order->price, 0, ',', '.') : '-' }}</span>
                                <div class="text-muted" style="font-size:0.7rem;">Biaya Servis</div>
                            </div>
                        </div>

                        {{-- Warranty info if any --}}
                        <div class="mb-3">
                            @if($order->status === 'completed' && $order->warranty_duration_days > 0)
                                @if($order->is_under_warranty)
                                    <span class="badge bg-success-subtle text-success border border-success-subtle py-1 px-2.5">
                                        <i class="fas fa-shield-alt me-1"></i>Garansi Aktif s/d {{ $order->warranty_expires_at ? $order->warranty_expires_at->format('d M Y') : '-' }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary-subtle text-muted py-1 px-2.5">
                                        Garansi Berakhir
                                    </span>
                                @endif
                            @endif
                        </div>

                        {{-- Actions --}}
                        <div class="d-flex gap-2 pt-2 border-top">
                            <a href="{{ route('customer.service-detail', $order->id) }}" class="btn btn-sm btn-outline-success rounded-3 flex-fill text-center fw-semibold py-1.5">
                                <i class="fas fa-eye me-1"></i> Detail Servis
                            </a>
                            @if($order->is_under_warranty)
                                <a href="{{ route('customer.warranty.create', $order->id) }}" class="btn btn-sm btn-warning text-dark rounded-3 px-3 py-1.5 fw-semibold">
                                    <i class="fas fa-shield-alt me-1"></i> Klaim Garansi
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
                        <th class="ps-3 py-3">Kode Servis</th>
                        <th>Perangkat</th>
                        <th>Status</th>
                        <th>Tanggal Masuk</th>
                        <th>Biaya</th>
                        <th>Garansi Servis</th>
                        <th class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceOrders as $order)
                    <tr>
                        <td class="ps-3 fw-bold font-monospace text-success">
                            {{ $order->service_code }}
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $order->laptop_name }}</div>
                            <small class="text-muted">{{ $order->laptop_type }}</small>
                        </td>
                        <td>
                            @switch($order->status)
                                @case('pending')
                                    <span class="badge bg-primary rounded-pill">Pending</span>
                                    @break
                                @case('process')
                                    <span class="badge bg-warning text-dark rounded-pill">Dalam Pengerjaan</span>
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
                        <td>
                            @if($order->price)
                                <span class="fw-semibold text-dark">Rp {{ number_format($order->price, 0, ',', '.') }}</span>
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td>
                            @if($order->status === 'completed' && $order->warranty_duration_days > 0)
                                @if($order->is_under_warranty)
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">
                                        <i class="fas fa-shield-alt me-1"></i>Aktif s/d {{ $order->warranty_expires_at ? $order->warranty_expires_at->format('d M Y') : '-' }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary-subtle text-muted">
                                        Garansi Berakhir
                                    </span>
                                @endif
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td class="text-end pe-3">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('customer.service-detail', $order->id) }}" class="btn btn-outline-success" title="Lihat Detail">
                                    <i class="fas fa-eye me-1"></i>Detail
                                </a>
                                @if($order->is_under_warranty)
                                <a href="{{ route('customer.warranty.create', $order->id) }}" class="btn btn-warning text-dark" title="Ajukan Klaim Garansi">
                                    <i class="fas fa-shield-alt me-1"></i>Garansi
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-3 border-top d-flex justify-content-center justify-content-md-end">
            {{ $serviceOrders->links('custom.pagination') }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-inbox text-muted mb-3" style="font-size:3.5rem; opacity:0.3;"></i>
            <h5 class="fw-bold text-dark">Belum Ada Riwayat Servis</h5>
            <p class="text-muted small">Anda belum memiliki riwayat servis perangkat di Best Computer.</p>
        </div>
        @endif
    </div>
</div>
@endsection
