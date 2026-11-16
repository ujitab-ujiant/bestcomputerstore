@extends('layouts.customer')

@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4">
    <div>
        <a href="{{ route('customer.service-history') }}" class="btn btn-sm btn-outline-secondary mb-2">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Riwayat
        </a>
        <h4 class="fw-bold mb-0">Tiket Servis: <span class="text-success font-monospace">{{ $serviceOrder->service_code }}</span></h4>
    </div>
    <div>
        @if($serviceOrder->is_under_warranty)
        <a href="{{ route('customer.warranty.create', $serviceOrder->id) }}" class="btn btn-warning text-dark fw-bold">
            <i class="fas fa-shield-alt me-1"></i> Ajukan Klaim Garansi
        </a>
        @endif
    </div>
</div>

{{-- Status Progress Timeline --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4">
        <h6 class="fw-bold mb-3 text-muted text-uppercase" style="font-size:0.75rem; letter-spacing:0.05em;">Progres Perbaikan Perangkat</h6>
        
        <div class="row text-center position-relative g-2">
            @php
                $statusOrder = ['pending' => 1, 'process' => 2, 'completed' => 3];
                $currentStep = $statusOrder[$serviceOrder->status] ?? 0;
                $isCancelled = $serviceOrder->status === 'cancelled';
            @endphp

            <div class="col-4">
                <div class="rounded-circle mx-auto mb-2 d-flex align-items-center justify-content-center text-white {{ $currentStep >= 1 && !$isCancelled ? 'bg-success' : 'bg-secondary' }}" style="width:40px;height:40px;">
                    <i class="fas fa-inbox"></i>
                </div>
                <div class="fw-bold small {{ $currentStep >= 1 && !$isCancelled ? 'text-success' : 'text-muted' }}">1. Diterima</div>
                <small class="text-muted" style="font-size:0.7rem;">Perangkat Terdaftar</small>
            </div>

            <div class="col-4">
                <div class="rounded-circle mx-auto mb-2 d-flex align-items-center justify-content-center text-white {{ $currentStep >= 2 && !$isCancelled ? 'bg-success' : ($currentStep == 1 ? 'bg-warning text-dark' : 'bg-secondary') }}" style="width:40px;height:40px;">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="fw-bold small {{ $currentStep >= 2 && !$isCancelled ? 'text-success' : 'text-muted' }}">2. Pengerjaan</div>
                <small class="text-muted" style="font-size:0.7rem;">Diagnosa & Servis</small>
            </div>

            <div class="col-4">
                <div class="rounded-circle mx-auto mb-2 d-flex align-items-center justify-content-center text-white {{ $currentStep >= 3 && !$isCancelled ? 'bg-success' : 'bg-secondary' }}" style="width:40px;height:40px;">
                    <i class="fas fa-check"></i>
                </div>
                <div class="fw-bold small {{ $currentStep >= 3 && !$isCancelled ? 'text-success' : 'text-muted' }}">3. Selesai</div>
                <small class="text-muted" style="font-size:0.7rem;">Siap Diambil / Garansi</small>
            </div>
        </div>

        @if($isCancelled)
        <div class="alert alert-danger mt-3 mb-0 py-2 small">
            <i class="fas fa-exclamation-triangle me-1"></i> Servis ini berstatus <strong>Dibatalkan</strong>. Silakan hubungi admin kami untuk informasi lebih lanjut.
        </div>
        @endif
    </div>
</div>

<div class="row g-4 mb-4">
    {{-- Detail Perangkat & Keluhan --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h6 class="fw-bold mb-0"><i class="fas fa-laptop me-2 text-success"></i>Informasi Perangkat</h6>
            </div>
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-sm-4 text-muted small">Nama Perangkat:</div>
                    <div class="col-sm-8 fw-bold text-dark">{{ $serviceOrder->laptop_name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 text-muted small">Tipe / Seri:</div>
                    <div class="col-sm-8 text-dark">{{ $serviceOrder->laptop_type }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 text-muted small">Tanggal Masuk:</div>
                    <div class="col-sm-8 text-dark">{{ $serviceOrder->created_at->format('d M Y, H:i') }} WIB</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 text-muted small">Keluhan / Kerusakan:</div>
                    <div class="col-sm-8 text-dark bg-light p-3 rounded-3 small">
                        {{ $serviceOrder->problem_description }}
                    </div>
                </div>
                @if($serviceOrder->service_note)
                <div class="row mb-3">
                    <div class="col-sm-4 text-muted small">Catatan Teknisi:</div>
                    <div class="col-sm-8 text-dark bg-success-subtle p-3 rounded-3 small border border-success-subtle">
                        <i class="fas fa-info-circle text-success me-1"></i>
                        {{ $serviceOrder->service_note }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Kartu Garansi & Biaya --}}
    <div class="col-lg-4">
        {{-- Garansi Card --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom py-3">
                <h6 class="fw-bold mb-0"><i class="fas fa-shield-alt me-2 text-success"></i>Garansi Servis</h6>
            </div>
            <div class="card-body p-3">
                @if($serviceOrder->status === 'completed' && $serviceOrder->warranty_duration_days > 0)
                    @if($serviceOrder->is_under_warranty)
                        <div class="alert alert-success py-2 px-3 small mb-3">
                            <i class="fas fa-check-circle me-1"></i> <strong>Garansi Masih Aktif</strong>
                        </div>
                    @else
                        <div class="alert alert-secondary py-2 px-3 small mb-3">
                            <i class="fas fa-clock me-1"></i> <strong>Masa Garansi Berakhir</strong>
                        </div>
                    @endif

                    <div class="small mb-2">
                        <span class="text-muted">Durasi Garansi:</span>
                        <strong class="text-dark">{{ $serviceOrder->warranty_duration_days }} Hari</strong>
                    </div>
                    <div class="small mb-2">
                        <span class="text-muted">Mulai:</span>
                        <span class="text-dark">{{ $serviceOrder->warranty_start_date ? $serviceOrder->warranty_start_date->format('d M Y') : '-' }}</span>
                    </div>
                    <div class="small mb-2">
                        <span class="text-muted">Berakhir:</span>
                        <span class="text-dark">{{ $serviceOrder->warranty_expires_at ? $serviceOrder->warranty_expires_at->format('d M Y') : '-' }}</span>
                    </div>
                    @if($serviceOrder->warranty_note)
                    <div class="mt-3 p-2 bg-light rounded small border">
                        <span class="text-muted d-block mb-1 font-semibold" style="font-size:0.75rem;">Ketentuan Garansi:</span>
                        <span class="text-dark">{{ $serviceOrder->warranty_note }}</span>
                    </div>
                    @endif

                    @if($serviceOrder->is_under_warranty)
                    <div class="mt-3">
                        <a href="{{ route('customer.warranty.create', $serviceOrder->id) }}" class="btn btn-warning btn-sm w-100 text-dark fw-bold">
                            <i class="fas fa-shield-alt me-1"></i> Ajukan Garansi
                        </a>
                    </div>
                    @endif
                @else
                    <p class="text-muted small mb-0">
                        @if($serviceOrder->status !== 'completed')
                            Masa garansi akan aktif setelah perangkat selesai diperbaiki (Status: Selesai).
                        @else
                            Tidak ada garansi khusus yang didaftarkan untuk tiket ini.
                        @endif
                    </p>
                @endif
            </div>
        </div>

        {{-- Biaya & Teknisi --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted small">Biaya Servis:</span>
                    <span class="fs-5 fw-bold text-success">
                        @if($serviceOrder->price)
                            Rp {{ number_format($serviceOrder->price, 0, ',', '.') }}
                        @else
                            <span class="text-muted small">Menunggu Estimasi</span>
                        @endif
                    </span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted small">Teknisi:</span>
                    <span class="fw-semibold text-dark small">{{ optional($serviceOrder->technician)->name ?? 'Tim Teknisi Best Computer' }}</span>
                </div>
                <hr class="my-2">
                <a href="https://wa.me/6285693801996?text={{ rawurlencode('Halo Best Computer, saya ingin konsultasi mengenai tiket servis #' . $serviceOrder->service_code . ' (' . $serviceOrder->laptop_name . ')') }}" target="_blank" class="btn btn-success btn-sm w-100 fw-bold">
                    <i class="fab fa-whatsapp me-1"></i> Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Riwayat Klaim Garansi untuk Tiket Ini --}}
@if($warrantyClaims->count() > 0)
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white border-bottom py-3">
        <h6 class="fw-bold mb-0"><i class="fas fa-history me-2 text-warning"></i>Riwayat Pengajuan Garansi untuk Tiket Ini</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3 py-2">Tanggal Pengajuan</th>
                        <th>Keluhan Garansi</th>
                        <th>Status</th>
                        <th>Tanggapan Toko / Teknisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warrantyClaims as $claim)
                    <tr>
                        <td class="ps-3 small">{{ $claim->created_at->format('d M Y, H:i') }}</td>
                        <td class="small">{{ $claim->complaint }}</td>
                        <td>
                            @switch($claim->status)
                                @case('pending')
                                    <span class="badge bg-warning text-dark">Menunggu Tinjauan</span>
                                    @break
                                @case('approved')
                                    <span class="badge bg-success">Disetujui</span>
                                    @break
                                @case('rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-info text-dark">Selesai Ditangani</span>
                                    @break
                            @endswitch
                        </td>
                        <td class="small text-muted">
                            {{ $claim->admin_note ?? 'Belum ada tanggapan teknisi.' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection
