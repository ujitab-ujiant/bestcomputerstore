@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Klaim Garansi Servis</h1>
            <p class="text-muted small mb-0">Kelola dan tinjau pengajuan klaim garansi dari pelanggan.</p>
        </div>
    </div>

    {{-- Filter Tabs --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-2">
            <div class="nav nav-pills gap-2 flex-nowrap overflow-x-auto pb-1" style="-webkit-overflow-scrolling: touch;">
                <a class="nav-link py-1 px-3 {{ !request('status') || request('status') === 'all' ? 'active bg-success' : 'text-dark' }}" href="{{ route('admin.warranty.index') }}">
                    Semua ({{ $counts['all'] ?? 0 }})
                </a>
                <a class="nav-link py-1 px-3 {{ request('status') === 'pending' ? 'active bg-warning text-dark' : 'text-dark' }}" href="{{ route('admin.warranty.index', ['status' => 'pending']) }}">
                    Menunggu ({{ $counts['pending'] ?? 0 }})
                </a>
                <a class="nav-link py-1 px-3 {{ request('status') === 'approved' ? 'active bg-success' : 'text-dark' }}" href="{{ route('admin.warranty.index', ['status' => 'approved']) }}">
                    Disetujui ({{ $counts['approved'] ?? 0 }})
                </a>
                <a class="nav-link py-1 px-3 {{ request('status') === 'rejected' ? 'active bg-danger' : 'text-dark' }}" href="{{ route('admin.warranty.index', ['status' => 'rejected']) }}">
                    Ditolak ({{ $counts['rejected'] ?? 0 }})
                </a>
                <a class="nav-link py-1 px-3 {{ request('status') === 'completed' ? 'active bg-info text-dark' : 'text-dark' }}" href="{{ route('admin.warranty.index', ['status' => 'completed']) }}">
                    Selesai ({{ $counts['completed'] ?? 0 }})
                </a>
            </div>
        </div>
    </div>

    {{-- Warranty Claims Container --}}
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
                                        <span class="badge bg-info text-dark rounded-pill">Selesai</span>
                                        @break
                                @endswitch
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2.5">
                                <div>
                                    <h6 class="fw-bold text-dark mb-0">{{ optional($claim->user)->name ?? 'Pelanggan' }}</h6>
                                    @if(optional($claim->user)->phone)
                                        <span class="text-muted small font-monospace">{{ $claim->user->phone }}</span>
                                    @endif
                                </div>
                                <div class="text-end">
                                    <span class="badge bg-white text-dark border">{{ optional($claim->serviceOrder)->laptop_type ?? 'Laptop' }}</span>
                                </div>
                            </div>

                            <div class="p-2.5 bg-light rounded-3 mb-2.5 border">
                                <div class="small fw-bold text-dark mb-1">
                                    <i class="fas fa-laptop text-success me-1"></i>{{ optional($claim->serviceOrder)->laptop_name ?? '-' }}
                                </div>
                                <div class="small text-muted fst-italic">
                                    "{{ Str::limit($claim->complaint, 90) }}"
                                </div>
                            </div>

                            <div class="d-flex justify-content-end pt-2 border-top">
                                <a href="{{ route('admin.warranty.show', $claim->id) }}" class="btn btn-sm btn-outline-success rounded-3 px-3 py-1.5 fw-semibold w-100 text-center">
                                    <i class="fas fa-search me-1"></i> Tinjau & Proses Klaim
                                </a>
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
                            <th>Pelanggan</th>
                            <th>Perangkat</th>
                            <th>Keluhan Garansi</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
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
                                <div class="fw-bold text-dark">{{ optional($claim->user)->name ?? '-' }}</div>
                                @if(optional($claim->user)->phone)
                                    <small class="text-muted font-monospace">{{ $claim->user->phone }}</small>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">{{ optional($claim->serviceOrder)->laptop_name ?? '-' }}</div>
                                <small class="text-muted">{{ optional($claim->serviceOrder)->laptop_type ?? '-' }}</small>
                            </td>
                            <td style="max-width: 280px;">
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
                                        <span class="badge bg-info text-dark rounded-pill">Selesai</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="small">{{ $claim->created_at->format('d M Y, H:i') }}</td>
                            <td class="text-end pe-3">
                                <a href="{{ route('admin.warranty.show', $claim->id) }}" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-search me-1"></i> Tinjau Klaim
                                </a>
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
                <h5 class="fw-bold text-dark">Tidak Ada Pengajuan Garansi</h5>
                <p class="text-muted small">Klaim garansi yang diajukan oleh pelanggan akan muncul di sini.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
