@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4">
        <h1 class="h3 mb-0">Daftar Service Order</h1>
        <div class="d-flex flex-wrap gap-2 w-100 w-sm-auto">
            @if(in_array(Auth::user()->role, ['admin', 'teknisi']))
            <a href="{{ route('service-orders.report') }}" class="btn btn-info text-white">
                <i class="fas fa-file-alt me-1"></i> Laporan
            </a>
            @endif
            <a href="{{ route('service-orders.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Tambah Service Order
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
                    <div class="d-flex gap-2 w-100">
                        <button type="submit" class="btn btn-primary flex-fill">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <a href="{{ route('service-orders.index') }}" class="btn btn-secondary flex-fill">
                            <i class="fas fa-sync"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Card Container --}}
    <div class="card border-0 shadow-sm rounded-4 desktop-table-card">
        <div class="card-body p-0">
            {{-- 1. TAMPILAN MOBILE: DETAIL CARD (Sipaduhok Inspired) --}}
            <div class="d-block d-md-none p-3 bg-light rounded-4">
                @forelse($serviceOrders as $order)
                    @php
                        $phoneNorm = $order->customer_phone ? \App\Models\Customer::normalizePhone($order->customer_phone) : null;
                    @endphp
                    <article class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden bg-white">
                        {{-- Card Header --}}
                        <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-light text-success border font-monospace fw-bold">{{ $order->service_code }}</span>
                                <span class="text-muted ms-2" style="font-size:0.75rem;"><i class="far fa-calendar-alt me-1"></i>{{ $order->created_at->format('d M Y') }}</span>
                            </div>
                            <div>
                                @if($order->status == 'pending')
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-pill fw-semibold">Pending</span>
                                @elseif($order->status == 'process')
                                    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2.5 py-1 rounded-pill fw-semibold">In Process</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-pill fw-semibold">Completed</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2.5 py-1 rounded-pill fw-semibold">Cancelled</span>
                                @endif
                            </div>
                        </div>

                        {{-- Card Body --}}
                        <div class="card-body p-3">
                            {{-- Customer & Price --}}
                            <div class="d-flex justify-content-between align-items-start mb-2.5">
                                <div>
                                    <h6 class="fw-bold text-dark mb-0">{{ $order->customer_name }}</h6>
                                    @if($order->customer_phone)
                                        <div class="d-flex align-items-center gap-1.5 mt-1">
                                            <span class="text-muted small font-monospace">{{ $order->customer_phone }}</span>
                                            <a href="https://wa.me/{{ $phoneNorm }}?text={{ rawurlencode('Halo ' . $order->customer_name . ', update mengenai servis ' . $order->laptop_name . ' (No. Tiket: ' . $order->service_code . ') di Best Computer.') }}" target="_blank" class="badge bg-success text-white text-decoration-none px-2 py-0.5 rounded-pill" title="Kirim Pesan WhatsApp">
                                                <i class="fab fa-whatsapp me-1"></i>WA
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-end">
                                    <span class="fw-bold text-success fs-6">{{ $order->price ? 'Rp ' . number_format($order->price, 0, ',', '.') : 'Rp 0' }}</span>
                                    <div class="text-muted" style="font-size: 0.7rem;">Biaya Servis</div>
                                </div>
                            </div>

                            {{-- Laptop / Perangkat --}}
                            <div class="p-2.5 bg-light rounded-3 mb-2.5 border">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex align-items-center gap-1.5">
                                        <i class="fas fa-laptop text-success"></i>
                                        <strong class="text-dark small">{{ $order->laptop_name }}</strong>
                                    </div>
                                    <span class="badge bg-white text-secondary border small">{{ $order->laptop_type }}</span>
                                </div>
                                @if($order->problem_description)
                                    <p class="text-muted small mb-0 text-truncate" title="{{ $order->problem_description }}">
                                        {{ Str::limit($order->problem_description, 75) }}
                                    </p>
                                @endif
                            </div>

                            {{-- Meta: Teknisi & Garansi --}}
                            <div class="d-flex flex-wrap justify-content-between align-items-center small text-muted mb-3 pb-2 border-bottom">
                                <div>
                                    <i class="fas fa-user-cog me-1 text-secondary"></i>
                                    <span>{{ $order->technician ? $order->technician->name : 'Belum ditugaskan' }}</span>
                                </div>
                                <div>
                                    @if($order->status === 'completed')
                                        @if($order->is_under_warranty)
                                            <span class="badge bg-success text-white">
                                                <i class="fas fa-shield-alt me-1"></i>Garansi Aktif
                                            </span>
                                        @else
                                            <span class="badge bg-secondary text-white">Garansi Habis</span>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            {{-- Quick Status Update Buttons --}}
                            <div class="mb-3">
                                <span class="text-muted fw-bold d-block mb-1.5" style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.05em;">
                                    <i class="fas fa-exchange-alt me-1 text-success"></i>Ubah Status Cepat:
                                </span>
                                <div class="d-flex flex-wrap gap-1.5">
                                    @if($order->status === 'pending')
                                        <button type="button" class="btn btn-sm btn-outline-warning rounded-pill px-3 py-1 flex-fill text-dark fw-semibold" onclick="confirmStatusChange('{{ $order->id }}', 'process', 'Mulai Proses Pengerjaan', '{{ $order->service_code }}')">
                                            <i class="fas fa-tools me-1 text-warning"></i> Mulai Proses
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1 text-danger fw-semibold" onclick="confirmStatusChange('{{ $order->id }}', 'cancelled', 'Batalkan Servis', '{{ $order->service_code }}')">
                                            <i class="fas fa-times-circle me-1"></i> Batalkan
                                        </button>
                                    @elseif($order->status === 'process')
                                        <button type="button" class="btn btn-sm btn-success rounded-pill px-3 py-1 flex-fill text-white fw-semibold" onclick="confirmStatusChange('{{ $order->id }}', 'completed', 'Selesai & Siap Diambil', '{{ $order->service_code }}')">
                                            <i class="fas fa-check-circle me-1"></i> Tandai Selesai
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-2.5 py-1" onclick="confirmStatusChange('{{ $order->id }}', 'pending', 'Kembalikan ke Pending', '{{ $order->service_code }}')" title="Kembalikan ke Pending">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-2.5 py-1" onclick="confirmStatusChange('{{ $order->id }}', 'cancelled', 'Batalkan Servis', '{{ $order->service_code }}')" title="Batalkan Servis">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    @elseif($order->status === 'completed')
                                        <button type="button" class="btn btn-sm btn-outline-warning rounded-pill px-3 py-1 flex-fill text-dark fw-semibold" onclick="confirmStatusChange('{{ $order->id }}', 'process', 'Kembalikan ke Proses', '{{ $order->service_code }}')">
                                            <i class="fas fa-undo me-1 text-warning"></i> Kembalikan ke Proses
                                        </button>
                                    @elseif($order->status === 'cancelled')
                                        <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 flex-fill fw-semibold" onclick="confirmStatusChange('{{ $order->id }}', 'pending', 'Aktifkan Kembali Servis (Pending)', '{{ $order->service_code }}')">
                                            <i class="fas fa-redo me-1"></i> Aktifkan Kembali
                                        </button>
                                    @endif
                                </div>
                            </div>

                            {{-- Action Footer --}}
                            <div class="d-flex gap-2 pt-2 border-top">
                                <a href="{{ route('service-orders.show', $order->id) }}" class="btn btn-sm btn-info text-white rounded-3 flex-fill text-center fw-semibold py-1.5">
                                    <i class="fas fa-eye me-1"></i> Detail
                                </a>
                                <a href="{{ route('service-orders.edit', $order->id) }}" class="btn btn-sm btn-warning text-white rounded-3 px-3 py-1.5" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger rounded-3 px-3 py-1.5" onclick="confirmDeleteOrder('{{ $order->id }}', '{{ $order->service_code }}', '{{ $order->customer_name }}')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="text-center py-5 text-muted bg-white rounded-4 border">
                        <i class="fas fa-clipboard-list fa-2x mb-2 text-secondary"></i>
                        <p class="mb-0 fw-semibold">Belum ada data service order</p>
                    </div>
                @endforelse
            </div>

            {{-- 2. TAMPILAN DESKTOP: TABLE DENGAN DROPDOWN ANTI-TERPOTONG --}}
            <div class="d-none d-md-block desktop-table-container">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3 py-3">Kode Service</th>
                            <th>Customer</th>
                            <th>Laptop</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Harga</th>
                            <th>Teknisi</th>
                            <th class="text-center">Ubah Status</th>
                            <th class="text-end pe-3" width="13%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($serviceOrders as $order)
                        <tr>
                            <td class="ps-3 font-monospace fw-bold text-success">{{ $order->service_code }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $order->customer_name }}</div>
                                @if($order->customer_phone)
                                    @php $phoneNorm = \App\Models\Customer::normalizePhone($order->customer_phone); @endphp
                                    <div class="d-flex align-items-center gap-1.5 mt-1">
                                        <small class="font-monospace text-muted">{{ $order->customer_phone }}</small>
                                        <a href="https://wa.me/{{ $phoneNorm }}?text={{ rawurlencode('Halo ' . $order->customer_name . ', update mengenai servis ' . $order->laptop_name . ' (No. Tiket: ' . $order->service_code . ') di Best Computer.') }}" target="_blank" class="badge bg-success text-white text-decoration-none px-1.5 py-0.5 rounded-pill" title="Kirim Pesan WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                @endif
                                @if($order->customer_id)
                                <a href="{{ route('service-orders.customer-history', $order->customer_id) }}" class="badge bg-light text-primary border text-decoration-none mt-1 d-inline-block" title="Lihat Riwayat Pelanggan">
                                    <i class="fas fa-history me-1"></i>Riwayat
                                </a>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">{{ $order->laptop_name }}</div>
                                <small class="text-muted">{{ $order->laptop_type }}</small>
                            </td>
                            <td class="small">{{ $order->created_at->format('d M Y') }}</td>
                            <td>
                                @if($order->status == 'pending')
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-pill fw-semibold">Pending</span>
                                @elseif($order->status == 'process')
                                <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2.5 py-1 rounded-pill fw-semibold">Process</span>
                                @elseif($order->status == 'completed')
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-pill fw-semibold">Completed</span>
                                @else
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2.5 py-1 rounded-pill fw-semibold">Cancelled</span>
                                @endif
                            </td>
                            <td class="fw-semibold text-dark">{{ $order->price ? 'Rp ' . number_format($order->price, 0, ',', '.') : '-' }}</td>
                            <td class="small text-secondary">{{ $order->technician ? $order->technician->name : 'Belum ditugaskan' }}</td>
                            <td class="text-center">
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-sm btn-outline-success dropdown-toggle py-1 px-2.5 rounded-3 fw-semibold shadow-2xs" type="button" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false" title="Ubah Status Cepat">
                                        <i class="fas fa-exchange-alt me-1"></i> Status
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 py-1.5 rounded-3" style="min-width: 190px; z-index: 1060;">
                                        @if($order->status === 'pending')
                                            <li><a class="dropdown-item small py-2" href="javascript:void(0)" onclick="confirmStatusChange('{{ $order->id }}', 'process', 'Proses Pengerjaan', '{{ $order->service_code }}')"><i class="fas fa-tools text-warning me-2"></i>Mulai Proses</a></li>
                                            <li><hr class="dropdown-divider my-1"></li>
                                            <li><a class="dropdown-item small py-2 text-danger" href="javascript:void(0)" onclick="confirmStatusChange('{{ $order->id }}', 'cancelled', 'Batalkan Servis', '{{ $order->service_code }}')"><i class="fas fa-times-circle text-danger me-2"></i>Batalkan Servis</a></li>
                                        @elseif($order->status === 'process')
                                            <li><a class="dropdown-item small py-2 text-success fw-bold" href="javascript:void(0)" onclick="confirmStatusChange('{{ $order->id }}', 'completed', 'Selesai & Siap Diambil', '{{ $order->service_code }}')"><i class="fas fa-check-circle text-success me-2"></i>Tandai Selesai</a></li>
                                            <li><hr class="dropdown-divider my-1"></li>
                                            <li><a class="dropdown-item small py-2 text-secondary" href="javascript:void(0)" onclick="confirmStatusChange('{{ $order->id }}', 'pending', 'Kembalikan ke Status Awal (Pending)', '{{ $order->service_code }}')"><i class="fas fa-undo text-secondary me-2"></i>Kembali ke Pending</a></li>
                                            <li><a class="dropdown-item small py-2 text-danger" href="javascript:void(0)" onclick="confirmStatusChange('{{ $order->id }}', 'cancelled', 'Batalkan Servis', '{{ $order->service_code }}')"><i class="fas fa-times-circle text-danger me-2"></i>Batalkan Servis</a></li>
                                        @elseif($order->status === 'completed')
                                            <li><a class="dropdown-item small py-2 text-warning fw-semibold" href="javascript:void(0)" onclick="confirmStatusChange('{{ $order->id }}', 'process', 'Kembalikan ke Proses', '{{ $order->service_code }}')"><i class="fas fa-undo text-warning me-2"></i>Kembali ke Proses</a></li>
                                            <li><hr class="dropdown-divider my-1"></li>
                                            <li><a class="dropdown-item small py-2 text-danger" href="javascript:void(0)" onclick="confirmStatusChange('{{ $order->id }}', 'cancelled', 'Batalkan Servis', '{{ $order->service_code }}')"><i class="fas fa-times-circle text-danger me-2"></i>Batalkan Servis</a></li>
                                        @elseif($order->status === 'cancelled')
                                            <li><a class="dropdown-item small py-2 text-primary fw-bold" href="javascript:void(0)" onclick="confirmStatusChange('{{ $order->id }}', 'pending', 'Aktifkan Kembali (Pending)', '{{ $order->service_code }}')"><i class="fas fa-redo text-primary me-2"></i>Kembali ke Pending</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                            <td class="text-end pe-3">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('service-orders.show', $order->id) }}" class="btn btn-info text-white rounded-start-3" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('service-orders.edit', $order->id) }}" class="btn btn-warning text-white" title="Edit Service Order">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger rounded-end-3" onclick="confirmDeleteOrder('{{ $order->id }}', '{{ $order->service_code }}', '{{ $order->customer_name }}')" title="Hapus Service Order">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted">Belum ada data service order</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-top py-3 d-flex justify-content-center">
            <div class="custom-pagination">
                {{ $serviceOrders->appends(request()->query())->links('custom.pagination') }}
            </div>
        </div>
    </div>
</div>

<style>
@media (min-width: 768px) {
    .desktop-table-card,
    .desktop-table-card .card-body,
    .desktop-table-container {
        overflow: visible !important;
    }
    .desktop-table-card .card-body {
        min-height: 400px;
    }
}

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
    background-color: #16a34a;
    border-color: #16a34a;
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

{{-- Hidden status update form --}}
<form id="quickStatusForm" method="POST" action="" style="display:none;">
    @csrf
    <input type="hidden" name="status" id="quickStatusInput">
</form>

{{-- Hidden delete form --}}
<form id="quickDeleteForm" method="POST" action="" style="display:none;">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi dropdown dengan strategy: fixed agar tidak pernah terpotong oleh overflow parent
    const dropdownTriggerList = document.querySelectorAll('.desktop-table-container [data-bs-toggle="dropdown"]');
    dropdownTriggerList.forEach(function (dropdownTriggerEl) {
        new bootstrap.Dropdown(dropdownTriggerEl, {
            popperConfig: function(defaultBsPopperConfig) {
                return {
                    ...defaultBsPopperConfig,
                    strategy: 'fixed'
                };
            }
        });
    });
});

function confirmStatusChange(orderId, status, label, serviceCode) {
    Swal.fire({
        title: 'Konfirmasi Ubah Status',
        html: `Ubah status tiket <strong>#${serviceCode}</strong> menjadi:<br><span class="badge bg-success fs-6 mt-2">${label}</span>`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#16a34a',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Ubah Sekarang',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('quickStatusForm');
            form.action = `{{ url('/service-orders') }}/${orderId}/update-status`;
            document.getElementById('quickStatusInput').value = status;
            form.submit();
        }
    });
}

function confirmDeleteOrder(orderId, serviceCode, customerName) {
    Swal.fire({
        title: 'Hapus Service Order?',
        html: `Apakah Anda yakin ingin menghapus tiket <strong>#${serviceCode}</strong> untuk customer <strong>${customerName}</strong>?<br><small class="text-danger">Tindakan ini tidak dapat dibatalkan.</small>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<i class="fas fa-trash me-1"></i> Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('quickDeleteForm');
            form.action = `{{ url('/service-orders') }}/${orderId}`;
            form.submit();
        }
    });
}
</script>
@endpush
@endsection