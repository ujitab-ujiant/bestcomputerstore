@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('admin.warranty.index') }}" class="btn btn-sm btn-outline-secondary mb-2">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Klaim
            </a>
            <h1 class="h3 fw-bold mb-0">Tinjau Klaim Garansi #{{ optional($warrantyClaim->serviceOrder)->service_code }}</h1>
        </div>
        <div>
            @switch($warrantyClaim->status)
                @case('pending')
                    <span class="badge bg-warning text-dark fs-6 px-3 py-2">Menunggu Tinjauan</span>
                    @break
                @case('approved')
                    <span class="badge bg-success fs-6 px-3 py-2">Disetujui</span>
                    @break
                @case('rejected')
                    <span class="badge bg-danger fs-6 px-3 py-2">Ditolak</span>
                    @break
                @case('completed')
                    <span class="badge bg-info text-dark fs-6 px-3 py-2">Selesai Ditangani</span>
                    @break
            @endswitch
        </div>
    </div>

    <div class="row g-4 mb-4">
        {{-- Detail Tiket & Pelanggan --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0 text-success"><i class="fas fa-info-circle me-2"></i>Informasi Tiket & Garansi</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-3">
                        <div class="col-sm-4 text-muted small">Kode Servis:</div>
                        <div class="col-sm-8 font-monospace fw-bold text-dark">
                            {{ optional($warrantyClaim->serviceOrder)->service_code }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-muted small">Perangkat:</div>
                        <div class="col-sm-8 text-dark fw-semibold">
                            {{ optional($warrantyClaim->serviceOrder)->laptop_name }} ({{ optional($warrantyClaim->serviceOrder)->laptop_type }})
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 text-muted small">Masa Garansi:</div>
                        <div class="col-sm-8 text-dark">
                            {{ optional($warrantyClaim->serviceOrder)->warranty_duration_days }} Hari
                            @if(optional($warrantyClaim->serviceOrder)->warranty_expires_at)
                                <small class="text-muted d-block">Berakhir: {{ $warrantyClaim->serviceOrder->warranty_expires_at->format('d M Y') }}</small>
                            @endif
                        </div>
                    </div>
                    @if(optional($warrantyClaim->serviceOrder)->warranty_note)
                    <div class="row mb-3">
                        <div class="col-sm-4 text-muted small">Ketentuan Disepakati:</div>
                        <div class="col-sm-8 text-dark small bg-light p-2 rounded border">
                            {{ $warrantyClaim->serviceOrder->warranty_note }}
                        </div>
                    </div>
                    @endif
                    <div class="row mb-0">
                        <div class="col-sm-4 text-muted small">Teknisi Awal:</div>
                        <div class="col-sm-8 text-dark">
                            {{ optional(optional($warrantyClaim->serviceOrder)->technician)->name ?? 'Belum ditugaskan' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0 text-success"><i class="fas fa-user me-2"></i>Data Pelanggan</h6>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted small">Nama:</span>
                        <strong class="text-dark">{{ optional($warrantyClaim->user)->name }}</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small">WhatsApp:</span>
                        @if(optional($warrantyClaim->user)->phone)
                            @php $phoneNorm = \App\Models\Customer::normalizePhone($warrantyClaim->user->phone); @endphp
                            <a href="https://wa.me/{{ $phoneNorm }}?text={{ rawurlencode('Halo ' . $warrantyClaim->user->name . ', mengenai pengajuan klaim garansi tiket #' . optional($warrantyClaim->serviceOrder)->service_code . ' di Best Computer.') }}" target="_blank" class="btn btn-sm btn-success">
                                <i class="fab fa-whatsapp me-1"></i> {{ $warrantyClaim->user->phone }}
                            </a>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted small">Tanggal Pengajuan:</span>
                        <span class="text-dark small">{{ $warrantyClaim->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Keluhan & Form Respon --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0 text-danger"><i class="fas fa-exclamation-triangle me-2"></i>Keluhan yang Diajukan Pelanggan</h6>
                </div>
                <div class="card-body p-4">
                    <div class="bg-light p-3 rounded-3 border text-dark" style="white-space: pre-line;">
                        {{ $warrantyClaim->complaint }}
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0 text-primary"><i class="fas fa-edit me-2"></i>Tanggapan & Update Status Klaim</h6>
                </div>
                <div class="card-body p-4">
                    <form id="respondWarrantyForm" action="{{ route('admin.warranty.update', $warrantyClaim->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Pilih Status Tindakan</label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="approved" {{ $warrantyClaim->status === 'approved' ? 'selected' : '' }}>✅ Disetujui (Unit dapat dibawa kembali ke toko)</option>
                                <option value="completed" {{ $warrantyClaim->status === 'completed' ? 'selected' : '' }}>🎉 Selesai Ditangani (Garansi telah diperbaiki)</option>
                                <option value="rejected" {{ $warrantyClaim->status === 'rejected' ? 'selected' : '' }}>❌ Ditolak (Tidak memenuhi syarat garansi)</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="admin_note" class="form-label fw-bold">Catatan Tanggapan untuk Pelanggan</label>
                            <textarea name="admin_note" id="admin_note" rows="4" class="form-control" placeholder="Contoh: Pengajuan disetujui. Silakan bawa perangkat ke toko pada jam kerja (10.00-21.00 WIB) beserta nota fisik.">{{ old('admin_note', $warrantyClaim->admin_note) }}</textarea>
                            <small class="text-muted">Catatan ini akan langsung dapat dibaca oleh pelanggan di portal mereka dan via notifikasi.</small>
                        </div>

                        <button type="button" class="btn btn-primary px-4 py-2 fw-bold" onclick="submitWarrantyResponse()">
                            <i class="fas fa-save me-1"></i> Simpan Tanggapan Klaim
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function submitWarrantyResponse() {
    const statusSelect = document.getElementById('status');
    const selectedText = statusSelect.options[statusSelect.selectedIndex].text;

    Swal.fire({
        title: 'Konfirmasi Tanggapan',
        text: `Apakah Anda yakin ingin mengubah status klaim menjadi: ${selectedText}?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#16a34a',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Simpan',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('respondWarrantyForm').submit();
        }
    });
}
</script>
@endpush
