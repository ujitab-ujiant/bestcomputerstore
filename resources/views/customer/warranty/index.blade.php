@extends('layouts.customer')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Pengajuan Garansi Saya</h4>
        <p class="text-muted small mb-0">Daftar klaim garansi yang pernah Anda ajukan untuk perbaikan perangkat di Best Computer.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        @if($warrantyClaims->count() > 0)
        {{-- 1. Mobile View: Detail Cards --}}
        <div class="d-block d-md-none p-3 bg-light rounded-4">
            @foreach($warrantyClaims as $claim)
                <article class="card border-0 shadow-sm rounded-4 mb-3 bg-white overflow-hidden">
                    <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <span class="badge bg-light text-success border font-monospace fw-bold">
                                {{ optional($claim->serviceOrder)->service_code ?? '-' }}
                            </span>
                            <small class="text-muted ms-2" style="font-size:0.7rem;"><i class="far fa-clock me-1"></i>{{ $claim->created_at->format('d M Y') }}</small>
                        </div>
                        <div>
                            @switch($claim->status)
                                @case('pending')
                                    <span class="badge bg-warning text-dark rounded-pill">Menunggu Tinjauan</span>
                                    @break
                                @case('approved')
                                    <span class="badge bg-success rounded-pill">Disetujui</span>
                                    @break
                                @case('rejected')
                                    <span class="badge bg-danger rounded-pill">Ditolak</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-info text-dark rounded-pill">Selesai Ditangani</span>
                                    @break
                            @endswitch
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="mb-2">
                            <h6 class="fw-bold text-dark mb-0">
                                <i class="fas fa-laptop text-success me-1"></i>{{ optional($claim->serviceOrder)->laptop_name ?? '-' }}
                            </h6>
                            <small class="text-muted">{{ optional($claim->serviceOrder)->laptop_type ?? '-' }}</small>
                        </div>

                        <div class="p-2.5 bg-light rounded-3 mb-2.5 border">
                            <span class="text-muted small fw-semibold d-block mb-1">Keluhan Garansi:</span>
                            <p class="small text-dark mb-0 fst-italic">"{{ $claim->complaint }}"</p>
                        </div>

                        @if($claim->admin_note)
                        <div class="p-2.5 bg-success-subtle rounded-3 mb-2.5 border border-success-subtle">
                            <span class="text-success small fw-semibold d-block mb-1"><i class="fas fa-comment-dots me-1"></i>Respon Toko:</span>
                            <p class="small text-dark mb-0">{{ $claim->admin_note }}</p>
                        </div>
                        @endif

                        <div class="pt-2 border-top">
                            @if($claim->service_order_id)
                            <a href="{{ route('customer.service-detail', $claim->service_order_id) }}" class="btn btn-sm btn-outline-success rounded-3 w-100 text-center fw-semibold py-1.5">
                                <i class="fas fa-eye me-1"></i> Lihat Detail Tiket Servis
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
                        <th class="ps-3 py-3">Tiket Servis</th>
                        <th>Perangkat</th>
                        <th>Keluhan Garansi</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Respon Teknisi / Toko</th>
                        <th class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warrantyClaims as $claim)
                    <tr>
                        <td class="ps-3 font-monospace fw-bold text-success">
                            {{ optional($claim->serviceOrder)->service_code ?? '-' }}
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">{{ optional($claim->serviceOrder)->laptop_name ?? '-' }}</div>
                            <small class="text-muted">{{ optional($claim->serviceOrder)->laptop_type ?? '-' }}</small>
                        </td>
                        <td style="max-width: 250px;">
                            <div class="text-truncate small" title="{{ $claim->complaint }}">{{ $claim->complaint }}</div>
                        </td>
                        <td>
                            @switch($claim->status)
                                @case('pending')
                                    <span class="badge bg-warning text-dark rounded-pill">Menunggu Tinjauan</span>
                                    @break
                                @case('approved')
                                    <span class="badge bg-success rounded-pill">Disetujui</span>
                                    @break
                                @case('rejected')
                                    <span class="badge bg-danger rounded-pill">Ditolak</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-info text-dark rounded-pill">Selesai Ditangani</span>
                                    @break
                            @endswitch
                        </td>
                        <td class="small">{{ $claim->created_at->format('d M Y') }}</td>
                        <td class="small text-muted" style="max-width: 200px;">
                            <div class="text-truncate" title="{{ $claim->admin_note ?? 'Belum ada catatan' }}">
                                {{ $claim->admin_note ?? '-' }}
                            </div>
                        </td>
                        <td class="text-end pe-3">
                            @if($claim->service_order_id)
                            <a href="{{ route('customer.service-detail', $claim->service_order_id) }}" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-eye me-1"></i>Detail Tiket
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-3 border-top d-flex justify-content-center justify-content-md-end">
            {{ $warrantyClaims->links('custom.pagination') }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-shield-alt text-muted mb-3" style="font-size:3.5rem; opacity:0.3;"></i>
            <h5 class="fw-bold text-dark">Belum Ada Klaim Garansi</h5>
            <p class="text-muted small">Anda belum pernah mengajukan klaim garansi servis.</p>
        </div>
        @endif
    </div>
</div>
@endsection
