@extends('layouts.customer')

@section('content')
<div class="mb-4">
    <a href="{{ route('customer.service-detail', $serviceOrder->id) }}" class="btn btn-sm btn-outline-secondary mb-2">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke Detail Tiket
    </a>
    <h4 class="fw-bold mb-1">Form Pengajuan Klaim Garansi</h4>
    <p class="text-muted small mb-0">Ajukan perbaikan ulang perangkat yang masih dalam masa garansi resmi Best Computer.</p>
</div>

<div class="row">
    <div class="col-lg-8">
        {{-- Ringkasan Tiket --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom py-3">
                <h6 class="fw-bold mb-0 text-success"><i class="fas fa-ticket-alt me-2"></i>Tiket Servis #{{ $serviceOrder->service_code }}</h6>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <small class="text-muted d-block">Perangkat:</small>
                        <strong class="text-dark">{{ $serviceOrder->laptop_name }} ({{ $serviceOrder->laptop_type }})</strong>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block">Status Masa Garansi:</small>
                        <span class="badge bg-success">
                            Aktif s/d {{ $serviceOrder->warranty_expires_at ? $serviceOrder->warranty_expires_at->format('d M Y') : '-' }} ({{ $serviceOrder->warranty_duration_days }} Hari)
                        </span>
                    </div>
                    @if($serviceOrder->warranty_note)
                    <div class="col-12">
                        <small class="text-muted d-block">Ketentuan Garansi Disepakati:</small>
                        <div class="bg-light p-2 rounded small border text-dark mt-1">
                            {{ $serviceOrder->warranty_note }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Form Pengajuan --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form id="warrantyForm" action="{{ route('customer.warranty.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="service_order_id" value="{{ $serviceOrder->id }}">

                    <div class="mb-3">
                        <label for="complaint" class="form-label fw-bold">Jelaskan Kendala / Kerusakan Kembali <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('complaint') is-invalid @enderror" id="complaint" name="complaint" rows="5" required placeholder="Contoh: Layar mulai berkedip kembali setelah 3 hari penggunaan, tidak ada benturan atau terkena air...">{{ old('complaint') }}</textarea>
                        <small class="text-muted">Mohon jelaskan gejala masalah secara detail (minimal 20 karakter).</small>
                        @error('complaint')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="alert alert-info py-2 px-3 small mb-4">
                        <i class="fas fa-info-circle me-1"></i> Pengajuan garansi akan ditinjau oleh teknisi dalam 1x24 jam kerja. Pastikan segel garansi dan nota fisik perbaikan tetap utuh saat menyerahkan perangkat kembali.
                    </div>

                    <button type="button" class="btn btn-success px-4 py-2 fw-bold" onclick="submitWarrantyClaim()">
                        <i class="fas fa-paper-plane me-1"></i> Kirim Pengajuan Garansi
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function submitWarrantyClaim() {
    const complaint = document.getElementById('complaint').value.trim();
    if (complaint.length < 20) {
        Swal.fire({
            icon: 'warning',
            title: 'Deskripsi Kurang Lengkap',
            text: 'Mohon tuliskan penjelasan kendala minimal 20 karakter agar teknisi dapat menganalisa dengan tepat.'
        });
        return;
    }

    Swal.fire({
        title: 'Konfirmasi Pengajuan Garansi',
        text: 'Apakah data kendala yang Anda masukkan sudah benar?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#16a34a',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Kirim Sekarang',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('warrantyForm').submit();
        }
    });
}
</script>
@endpush
