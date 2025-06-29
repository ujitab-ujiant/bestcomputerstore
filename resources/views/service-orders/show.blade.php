@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Detail Service Order: {{ $serviceOrder->service_code }}</h1>
        <div>
            <a href="{{ route('service-orders.edit', $serviceOrder->id) }}" class="btn btn-warning">
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
                        <div class="col-md-8">{{ $serviceOrder->customer_name }}</div>
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