@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Kelola Akun Pelanggan</h1>
            <p class="text-muted small mb-0">Daftar pelanggan terdaftar otomatis saat pembuatan tiket servis.</p>
        </div>
    </div>

    {{-- Filter Search --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-3">
            <form action="{{ route('admin.customers.index') }}" method="GET" class="row g-2">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Cari nama, nomor HP, atau email..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-filter me-1"></i> Filter
                    </button>
                </div>
                @if(request('search'))
                <div class="col-6 col-md-2">
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
                </div>
                @endif
            </form>
        </div>
    </div>

    {{-- Customer Container --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            @if($customers->count() > 0)
            {{-- 1. Mobile View: Detail Cards --}}
            <div class="d-block d-md-none p-3 bg-light rounded-4">
                @foreach($customers as $customer)
                    @php $phoneNorm = $customer->phone ? \App\Models\Customer::normalizePhone($customer->phone) : null; @endphp
                    <article class="card border-0 shadow-sm rounded-4 mb-3 bg-white overflow-hidden">
                        <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-2.5">
                                <div class="rounded-circle bg-success-subtle text-success fw-bold d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; font-size: 0.95rem;">
                                    {{ strtoupper(substr($customer->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0">{{ $customer->name }}</h6>
                                    <small class="text-muted" style="font-size: 0.7rem;"><i class="far fa-calendar-alt me-1"></i>{{ $customer->created_at->format('d M Y') }}</small>
                                </div>
                            </div>
                            <div>
                                @if(($customer->active_orders ?? 0) > 0)
                                    <span class="badge bg-warning text-dark rounded-pill">{{ $customer->active_orders }} Aktif</span>
                                @else
                                    <span class="badge bg-light text-muted border rounded-pill">{{ $customer->total_orders ?? 0 }} Total</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="mb-2">
                                <span class="text-muted small d-block mb-1">Kontak & WhatsApp:</span>
                                @if($customer->phone)
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="font-monospace fw-semibold text-dark">{{ $customer->phone }}</span>
                                        <a href="https://wa.me/{{ $phoneNorm }}?text={{ rawurlencode('Halo ' . $customer->name . ', kami dari Best Computer Bogor.') }}" target="_blank" class="badge bg-success text-white text-decoration-none px-2 py-1 rounded-pill" title="Chat via WhatsApp">
                                            <i class="fab fa-whatsapp me-1"></i>Chat WA
                                        </a>
                                    </div>
                                @else
                                    <span class="text-muted small">Tidak ada nomor HP</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <span class="text-muted small d-block mb-1">Email Login:</span>
                                <span class="small font-monospace text-secondary">{{ $customer->email }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-2.5 border-top">
                                <span class="small text-muted">Total Servis: <strong>{{ $customer->total_orders ?? 0 }} Tiket</strong></span>
                                <a href="{{ route('admin.customers.show', $customer->id) }}" class="btn btn-sm btn-outline-success rounded-3 px-3 py-1.5 fw-semibold">
                                    <i class="fas fa-eye me-1"></i> Detail & Servis
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- 2. Desktop View: Responsive Table --}}
            <div class="d-none d-md-block table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3 py-3">Nama Pelanggan</th>
                            <th>No. WhatsApp / Telepon</th>
                            <th>Email Login</th>
                            <th class="text-center">Total Servis</th>
                            <th class="text-center">Servis Aktif</th>
                            <th>Terdaftar Sejak</th>
                            <th class="text-end pe-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td class="ps-3">
                                <div class="fw-bold text-dark">{{ $customer->name }}</div>
                            </td>
                            <td>
                                @if($customer->phone)
                                    @php $phoneNorm = \App\Models\Customer::normalizePhone($customer->phone); @endphp
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="font-monospace fw-semibold">{{ $customer->phone }}</span>
                                        <a href="https://wa.me/{{ $phoneNorm }}?text={{ rawurlencode('Halo ' . $customer->name . ', ini dari Best Computer Bogor.') }}" target="_blank" class="btn btn-sm btn-success py-0 px-2" title="Chat via WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="small font-monospace text-muted">{{ $customer->email }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary rounded-pill">{{ $customer->total_orders ?? 0 }}</span>
                            </td>
                            <td class="text-center">
                                @if(($customer->active_orders ?? 0) > 0)
                                    <span class="badge bg-warning text-dark rounded-pill">{{ $customer->active_orders }} Berjalan</span>
                                @else
                                    <span class="badge bg-light text-muted border">0</span>
                                @endif
                            </td>
                            <td class="small text-muted">{{ $customer->created_at->format('d M Y') }}</td>
                            <td class="text-end pe-3">
                                <a href="{{ route('admin.customers.show', $customer->id) }}" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-eye me-1"></i> Detail & Servis
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-3 border-top d-flex justify-content-center justify-content-md-end">
                {{ $customers->links('custom.pagination') }}
            </div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-users-slash text-muted mb-3" style="font-size:3.5rem; opacity:0.3;"></i>
                <h5 class="fw-bold text-dark">Tidak Ada Data Pelanggan</h5>
                <p class="text-muted small">Pelanggan baru akan otomatis terdaftar saat Anda membuat tiket servis dengan nomor HP.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
