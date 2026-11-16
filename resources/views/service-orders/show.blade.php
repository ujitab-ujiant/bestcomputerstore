@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Detail Service Order: {{ $serviceOrder->service_code }}</h1>
        <div>
            <button onclick="window.print()" class="btn btn-outline-dark me-1">
                <i class="fas fa-print me-1"></i> Cetak Nota
            </button>
            <a href="{{ route('service-orders.edit', $serviceOrder->id) }}" class="btn btn-warning me-1">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('service-orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informasi Service</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Kode Service:</div>
                        <div class="col-md-8">{{ $serviceOrder->service_code }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Customer:</div>
                        <div class="col-md-8">
                            <span class="fw-bold">{{ $serviceOrder->customer_name }}</span>
                            @if($serviceOrder->customer_phone)
                                @php $phoneNorm = \App\Models\Customer::normalizePhone($serviceOrder->customer_phone); @endphp
                                <div class="mt-1 d-flex align-items-center gap-2">
                                    <span class="font-monospace text-muted small">{{ $serviceOrder->customer_phone }}</span>
                                    <a href="https://wa.me/{{ $phoneNorm }}?text={{ rawurlencode('Halo ' . $serviceOrder->customer_name . ', update perihal tiket servis #' . $serviceOrder->service_code . ' di Best Computer.') }}" target="_blank" class="btn btn-sm btn-success py-0 px-2">
                                        <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Nama Laptop:</div>
                        <div class="col-md-8">{{ $serviceOrder->laptop_name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Tipe Laptop:</div>
                        <div class="col-md-8">{{ $serviceOrder->laptop_type }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Tanggal Masuk:</div>
                        <div class="col-md-8">{{ $serviceOrder->created_at->format('d M Y H:i') }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Status:</div>
                        <div class="col-md-8">
                            @if($serviceOrder->status == 'pending')
                            <span class="badge bg-primary">Pending</span>
                            @elseif($serviceOrder->status == 'process')
                            <span class="badge bg-warning">Process</span>
                            @elseif($serviceOrder->status == 'completed')
                            <span class="badge bg-success">Completed</span>
                            @else
                            <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Biaya Service:</div>
                        <div class="col-md-8">
                            @if($serviceOrder->price)
                                Rp {{ number_format($serviceOrder->price, 0, ',', '.') }}
                            @else
                                <span class="text-muted">Belum ditetapkan</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Teknisi:</div>
                        <div class="col-md-8">{{ $serviceOrder->technician ? $serviceOrder->technician->name : 'Belum ditugaskan' }}</div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Garansi Servis:</div>
                        <div class="col-md-8">
                            @if($serviceOrder->warranty_duration_days > 0)
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <strong>{{ $serviceOrder->warranty_duration_days }} Hari</strong>
                                    @if($serviceOrder->status === 'completed')
                                        @if($serviceOrder->is_under_warranty)
                                            <span class="badge bg-success">Aktif s/d {{ $serviceOrder->warranty_expires_at ? $serviceOrder->warranty_expires_at->format('d M Y') : '-' }}</span>
                                        @else
                                            <span class="badge bg-secondary">Garansi Berakhir</span>
                                        @endif
                                    @else
                                        <span class="badge bg-light text-muted border">Aktif setelah Completed</span>
                                    @endif
                                </div>
                                @if($serviceOrder->warranty_note)
                                    <small class="text-muted d-block bg-light p-2 rounded border mt-1">
                                        {{ $serviceOrder->warranty_note }}
                                    </small>
                                @endif
                            @else
                                <span class="text-muted">Tanpa Garansi</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Timeline</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-0">Service Order Dibuat</h6>
                                <small class="text-muted">{{ $serviceOrder->created_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                        @if($serviceOrder->updated_at->gt($serviceOrder->created_at))
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="mb-0">Service Order Diupdate</h6>
                                <small class="text-muted">{{ $serviceOrder->updated_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Deskripsi Masalah</h5>
                </div>
                <div class="card-body">
                    <p>{{ $serviceOrder->problem_description }}</p>
                </div>
            </div>
        </div>
    </div>
    
    @if($serviceOrder->service_note)
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Catatan Service</h5>
                </div>
                <div class="card-body">
                    <p>{{ $serviceOrder->service_note }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
    .timeline {
        position: relative;
        padding-left: 1.5rem;
    }
    .timeline:before {
        content: '';
        position: absolute;
        left: 0.25rem;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e9ecef;
    }
    .timeline-item {
        position: relative;
        padding-bottom: 1.5rem;
    }
    .timeline-marker {
        position: absolute;
        left: -1.5rem;
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }
</style>
@endsection