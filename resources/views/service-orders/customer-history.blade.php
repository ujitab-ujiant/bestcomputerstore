@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Riwayat Service Pelanggan: {{ $customer->name }}</h1>
        <a href="{{ route('service-orders.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Informasi Pelanggan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama:</strong> {{ $customer->name }}</p>
                    <p><strong>Email:</strong> {{ $customer->email ?? 'Belum diisi' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Telepon:</strong> {{ $customer->phone ?? 'Belum diisi' }}</p>
                    <p><strong>Alamat:</strong> {{ $customer->address ?? 'Belum diisi' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-light">
            <h5 class="mb-0">Riwayat Service</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Kode Service</th>
                            <th>Laptop</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Harga</th>
                            <th>Teknisi</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($serviceOrders as $order)
                        <tr>
                            <td>{{ $order->service_code }}</td>
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
                            <td>{{ $order->price ? 'Rp ' . number_format($order->price, 0, ',', '.') : '-' }}</td>
                            <td>{{ $order->technician ? $order->technician->name : 'Belum ditugaskan' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('service-orders.show', $order->id) }}" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('service-orders.edit', $order->id) }}" class="btn btn-sm btn-warning text-white">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">Belum ada data service order</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection