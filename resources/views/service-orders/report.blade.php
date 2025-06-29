@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Laporan Service Order</h1>
        <div>
            <a href="{{ route('service-orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Filter Laporan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('service-orders.report') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="date_from" class="form-label">Dari Tanggal</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" value="{{ $dateFrom }}">
                </div>
                <div class="col-md-3">
                    <label for="date_to" class="form-label">Sampai Tanggal</label>
                    <input type="date" class="form-control" id="date_to" name="date_to" value="{{ $dateTo }}">
                </div>
                <div class="col-md-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="all" {{ $status == 'all' ? 'selected' : '' }}>Semua Status</option>
                        <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="process" {{ $status == 'process' ? 'selected' : '' }}>Process</option>
                        <option value="completed" {{ $status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="d-grid gap-2 w-100">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <a href="{{ route('service-orders.report') }}" class="btn btn-secondary">
                            <i class="fas fa-sync"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                @if(Auth::user()->role == 'admin')
                Hasil Laporan - Semua Teknisi
                @else
                Hasil Laporan - Service Order Saya
                @endif
            </h5>
            <a href="{{ route('service-orders.print', request()->query()) }}" class="btn btn-success" target="_blank">
                <i class="fas fa-print"></i> Cetak Laporan
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Service</th>
                            <th>Customer</th>
                            <th>Laptop</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Biaya</th>
                            @if(Auth::user()->role == 'admin')
                            <th>Teknisi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($serviceOrders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->service_code }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->laptop_name }} ({{ $order->laptop_type }})</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>
                                @if($order->status == 'pending')
                                <span class="badge bg-primary">Pending</span>
                                @elseif($order->status == 'process')
                                <span class="badge bg-warning">Process</span>
                                @elseif($order->status == 'completed')
                                <span class="badge bg-success">Completed</span>
                                @else
                                <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </td>
                            <td>{{ $order->price ? 'Rp ' . number_format($order->price, 0, ',', '.') : 'Belum ditetapkan' }}</td>
                            @if(Auth::user()->role == 'admin')
                            <td>{{ $order->technician ? $order->technician->name : 'Belum ditugaskan' }}</td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ Auth::user()->role == 'admin' ? 8 : 7 }}" class="text-center py-3">Tidak ada data service order untuk periode ini</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-4">
                    <p class="mb-0"><strong>Total Service Order:</strong> {{ $serviceOrders->count() }}</p>
                    <p class="mb-0"><strong>Total Pendapatan:</strong> Rp {{ number_format($serviceOrders->where('status', 'completed')->sum('price'), 0, ',', '.') }}</p>
                </div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-end">
                        <p class="mb-0 me-3"><strong>Pending:</strong> {{ $serviceOrders->where('status', 'pending')->count() }}</p>
                        <p class="mb-0 me-3"><strong>Process:</strong> {{ $serviceOrders->where('status', 'process')->count() }}</p>
                        <p class="mb-0 me-3"><strong>Completed:</strong> {{ $serviceOrders->where('status', 'completed')->count() }}</p>
                        <p class="mb-0"><strong>Cancelled:</strong> {{ $serviceOrders->where('status', 'cancelled')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection