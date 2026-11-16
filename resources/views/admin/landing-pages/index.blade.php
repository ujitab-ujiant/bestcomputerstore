@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1 text-dark">
                <i class="fas fa-window-maximize text-success me-2"></i>Kelola Landing Page
            </h1>
            <p class="text-muted small mb-0">
                Kelola konten teks, banner, statistik, dan section di setiap halaman publik website Best Computer.
            </p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">
                <i class="fas fa-check-circle me-1"></i> {{ $pages->count() }} Halaman Aktif
            </span>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Cards Grid --}}
    <div class="row g-4 mb-4">
        @foreach($pages as $page)
            @php
                $pageIcon = match($page->slug) {
                    'home' => 'fa-home',
                    'servmaintenance' => 'fa-tools',
                    'about' => 'fa-info-circle',
                    'contact' => 'fa-map-marker-alt',
                    'help' => 'fa-question-circle',
                    default => 'fa-file-alt'
                };
                $publicUrl = $page->slug === 'home' ? url('/') : url('/' . $page->slug);
            @endphp
            <div class="col-md-6 col-xl-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 transition-all hover-shadow">
                    <div class="card-body p-4 d-flex flex-col justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="rounded-3 bg-success-subtle text-success d-inline-flex align-items-center justify-content-center" style="width: 48px; height: 48px; font-size: 1.25rem;">
                                    <i class="fas {{ $pageIcon }}"></i>
                                </div>
                                <span class="badge bg-light text-secondary border px-2 py-1 rounded-pill small">
                                    {{ $page->sections_count }} Section
                                </span>
                            </div>

                            <h5 class="fw-bold text-dark mb-1">{{ $page->title }}</h5>
                            <div class="font-monospace small text-success mb-3">
                                <code>{{ $page->slug === 'home' ? '/' : '/' . $page->slug }}</code>
                            </div>

                            <p class="text-muted small mb-4">
                                @if($page->slug === 'home')
                                    Banner utama, statistik kepuasan, keunggulan toko, dan tombol kontak WhatsApp.
                                @elseif($page->slug === 'servmaintenance')
                                    Katalog layanan servis, alur 4 langkah perbaikan, dan jaminan purna jual.
                                @elseif($page->slug === 'about')
                                    Profil visi misi, sejarah Best Computer di Plaza Jambu Dua, dan nilai pelayanan.
                                @elseif($page->slug === 'contact')
                                    Alamat toko fisik, jam operasional, nomor telepon, WhatsApp, dan Google Maps.
                                @elseif($page->slug === 'help')
                                    Daftar FAQ pertanyaan umum, estimasi diagnosa servis, dan panduan klaim garansi.
                                @else
                                    Pengaturan konten dan visibilitas section halaman.
                                @endif
                            </p>
                        </div>

                        <div class="pt-3 border-top d-flex align-items-center justify-content-between">
                            <span class="text-muted" style="font-size: 0.75rem;">
                                <i class="far fa-clock me-1"></i> {{ $page->updated_at ? $page->updated_at->diffForHumans() : 'Belum diedit' }}
                            </span>
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ $publicUrl }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold d-inline-flex align-items-center" title="Lihat Halaman Publik">
                                    <i class="fas fa-external-link-alt me-1.5"></i> Preview
                                </a>
                                <a href="{{ route('admin.landing-pages.edit', $page->slug) }}" class="btn btn-sm btn-success rounded-3 px-3 py-1.5 fw-semibold d-inline-flex align-items-center shadow-sm">
                                    <i class="fas fa-pen me-1.5"></i> Edit Konten
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Quick Tip Card --}}
    <div class="card border-0 bg-success-subtle rounded-4 p-4 text-dark shadow-sm">
        <div class="d-flex align-items-start gap-3">
            <div class="rounded-circle bg-white text-success d-flex align-items-center justify-content-center p-3 shadow-sm flex-shrink-0" style="width: 44px; height: 44px;">
                <i class="fas fa-lightbulb"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-1">Tips Pengelolaan Landing Page</h6>
                <p class="mb-0 small text-secondary">
                    Perubahan teks, nomor telepon, alamat, maupun gambar akan langsung diperbarui di website tanpa perlu mengubah kode sumber. Anda juga dapat menyembunyikan atau menampilkan section tertentu secara fleksibel.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
