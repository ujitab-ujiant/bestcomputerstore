@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('admin.customers.index') }}" class="btn btn-sm btn-outline-secondary mb-2">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Pelanggan
            </a>
            <h1 class="h3 fw-bold mb-0">Detail Pelanggan: {{ $customer->name }}</h1>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0"><i class="fas fa-user-circle me-2 text-success"></i>Informasi Akun Pelanggan</h6>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <small class="text-muted d-block">Nama Pelanggan:</small>
                        <strong class="text-dark fs-5">{{ $customer->name }}</strong>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Nomor Telepon / WhatsApp:</small>
                        @if($customer->phone)
                            @php $phoneNorm = \App\Models\Customer::normalizePhone($customer->phone); @endphp
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <span class="font-monospace fw-bold text-dark fs-6">{{ $customer->phone }}</span>
                                <a href="https://wa.me/{{ $phoneNorm }}?text={{ rawurlencode('Halo ' . $customer->name . ', ini dari Best Computer Bogor.') }}" target="_blank" class="btn btn-sm btn-success" title="Hubungi via WhatsApp">
                                    <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                </a>
                            </div>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Email Login:</small>
                        <span class="font-monospace text-dark">{{ $customer->email }}</span>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Password Bawaan:</small>
                        <span class="badge bg-light text-dark border font-monospace">
                            {{ $customer->phone ? substr(\App\Models\Customer::normalizePhone($customer->phone), -4) : '-' }} (4 digit terakhir nomor HP)
                        </span>
                    </div>

                    <div class="mb-0">
                        <small class="text-muted d-block">Terdaftar Sejak:</small>
                        <span class="text-dark">{{ $customer->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0"><i class="fas fa-clipboard-list me-2 text-success"></i>Riwayat Tiket Servis ({{ $serviceOrders->count() }})</h6>
                </div>
                <div class="card-body p-0">
                    @if($serviceOrders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3 py-2">Kode Servis</th>
                                    <th>Perangkat</th>
                                    <th>Status</th>
                                    <th>Masa Garansi</th>
                                    <th class="text-end pe-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($serviceOrders as $order)
                                <tr>
                                    <td class="ps-3 font-monospace fw-bold text-success">{{ $order->service_code }}</td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $order->laptop_name }}</div>
                                        <small class="text-muted">{{ $order->laptop_type }}</small>
                                    </td>
                                    <td>
                                        @switch($order->status)
                                            @case('pending')
                                                <span class="badge bg-primary">Pending</span>
                                                @break
                                            @case('process')
                                                <span class="badge bg-warning text-dark">Proses</span>
                                                @break
                                            @case('completed')
                                                <span class="badge bg-success">Selesai</span>
                                                @break
                                            @case('cancelled')
                                                <span class="badge bg-danger">Dibatalkan</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @if($order->status === 'completed' && $order->warranty_duration_days > 0)
                                            @if($order->is_under_warranty)
                                                <span class="badge bg-success-subtle text-success border border-success-subtle">
                                                    Aktif s/d {{ $order->warranty_expires_at ? $order->warranty_expires_at->format('d M Y') : '-' }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary-subtle text-muted">Habis</span>
                                            @endif
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-3">
                                        <a href="{{ route('service-orders.show', $order->id) }}" class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-eye me-1"></i> Buka Tiket
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4 text-muted">
                        <small>Belum ada tiket servis yang terhubung dengan akun ini.</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
