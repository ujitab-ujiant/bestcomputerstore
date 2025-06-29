@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Daftar Service Order</h1>
        <div>
            @if(in_array(Auth::user()->role, ['admin', 'teknisi']))
            <a href="{{ route('service-orders.report') }}" class="btn btn-info text-white me-2">
                <i class="fas fa-file-alt"></i> Laporan
            </a>
            @endif
            <a href="{{ route('service-orders.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Service Order
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Filter & Pencarian</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('service-orders.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Cari</label>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Kode Service / Customer" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label for="date_from" class="form-label">Dari Tanggal</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                </div>
                <div class="col-md-3">
                    <label for="date_to" class="form-label">Sampai Tanggal</label>
                    <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <div class="d-grid gap-2 w-100">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <a href="{{ route('service-orders.index') }}" class="btn btn-secondary">
                            <i class="fas fa-sync"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Kode Service</th>
                            <th>Customer</th>
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
                            <td>
                                {{ $order->customer_name }}
                                @if($order->customer_id)
                                <a href="{{ route('service-orders.customer-history', $order->customer_id) }}" class="btn btn-sm btn-outline-info ms-1" title="Lihat Riwayat">
                                    <i class="fas fa-history"></i>
                                </a>
                                @endif
                            </td>
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
                                    <a href="{{ route('service-orders.show', $order->id) }}" class="btn btn-sm btn-info text-white" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('service-orders.edit', $order->id) }}" class="btn btn-sm btn-warning text-white" title="Edit Service Order">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $order->id }}" title="Hapus Service Order">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                
                                <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $order->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $order->id }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus service order <strong>{{ $order->service_code }}</strong> untuk customer <strong>{{ $order->customer_name }}</strong>?
                                                <br><small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('service-orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-3">Belum ada data service order</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <div class="custom-pagination">
                {{ $serviceOrders->appends(request()->query())->links('custom.pagination') }}
            </div>
        </div>
    </div>
</div>

<style>
.custom-pagination .pagination {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
}

.custom-pagination .page-item {
    margin: 0;
}

.custom-pagination .page-link {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 8px 12px;
    color: #6c757d;
    text-decoration: none;
    background-color: #fff;
    transition: all 0.2s ease;
    min-width: 40px;
    text-align: center;
    font-weight: 500;
}

.custom-pagination .page-link:hover {
    background-color: #f8f9fa;
    border-color: #adb5bd;
    color: #495057;
}

.custom-pagination .page-item.active .page-link {
    background-color: #6366f1;
    border-color: #6366f1;
    color: white;
    font-weight: 600;
}

.custom-pagination .page-item.disabled .page-link {
    color: #adb5bd;
    background-color: #fff;
    border-color: #dee2e6;
    cursor: not-allowed;
}

.custom-pagination .page-item:first-child .page-link,
.custom-pagination .page-item:last-child .page-link {
    font-weight: 500;
}

.custom-pagination .page-item:first-child .page-link:before {
    content: "< ";
    margin-right: 4px;
}

.custom-pagination .page-item:last-child .page-link:after {
    content: " >";
    margin-left: 4px;
}

@media (max-width: 576px) {
    .custom-pagination .pagination {
        flex-wrap: wrap;
        gap: 4px;
    }
    
    .custom-pagination .page-link {
        padding: 6px 10px;
        min-width: 36px;
        font-size: 14px;
    }
}
</style>
@endsection