@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Header --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1 small">
                        <li class="breadcrumb-item"><a href="{{ route('admin.landing-pages.index') }}" class="text-decoration-none text-success">Kelola Landing Page</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $landingPage->title }}</li>
                    </ol>
                </nav>
                <h1 class="h3 fw-bold mb-1 text-dark">
                    <i class="fas fa-edit text-success me-2"></i>Edit Konten: {{ $landingPage->title }}
                </h1>
                <p class="text-muted small mb-0">
                    Sesuaikan teks banner, item daftar, nomor kontak, serta atur visibilitas setiap section.
                </p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ $landingPage->slug === 'home' ? url('/') : url('/' . $landingPage->slug) }}" target="_blank" class="btn btn-outline-secondary rounded-pill px-3 btn-sm">
                    <i class="fas fa-external-link-alt me-1"></i> Preview Publik
                </a>
                <button type="button" class="btn btn-outline-danger rounded-pill px-3 btn-sm" onclick="confirmResetDefaults()">
                    <i class="fas fa-undo me-1"></i> Reset ke Default
                </button>
                <a href="{{ route('admin.landing-pages.index') }}" class="btn btn-light rounded-pill px-3 btn-sm border">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Form Edit Sections --}}
    <form action="{{ route('admin.landing-pages.update', $landingPage->slug) }}" method="POST" enctype="multipart/form-data" id="landingPageForm">
        @csrf
        @method('PUT')

        <div class="row g-4">
            {{-- Navigasi Sidebar Section --}}
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 80px; z-index: 10;">
                    <div class="card-header bg-white border-bottom p-3">
                        <h6 class="fw-bold mb-0 text-dark">
                            <i class="fas fa-list-ol text-success me-2"></i>Daftar Section
                        </h6>
                    </div>
                    <div class="list-group list-group-flush rounded-bottom-4 p-2" style="max-height: 60vh; overflow-y: auto;">
                        @foreach($landingPage->sections as $idx => $section)
                            @php
                                $labelName = match($section->section_key) {
                                    'hero' => 'Banner Utama (Hero)',
                                    'stats' => 'Angka Statistik',
                                    'features' => 'Keunggulan Toko',
                                    'services_list' => 'Daftar Layanan Servis',
                                    'workflow' => 'Alur Pengerjaan Servis',
                                    'story' => 'Profil & Cerita Kami',
                                    'values' => 'Nilai Pelayanan',
                                    'info' => 'Informasi Kontak & Jam Buka',
                                    'faqs' => 'Daftar Pertanyaan (FAQ)',
                                    'cta' => 'Ajakan Bertindak (CTA)',
                                    default => ucwords(str_replace('_', ' ', $section->section_key))
                                };
                            @endphp
                            <a href="#sec_{{ $section->section_key }}" class="list-group-item list-group-item-action border-0 rounded-3 py-2.5 px-3 mb-1 small d-flex align-items-center justify-content-between text-secondary">
                                <div class="text-truncate me-2">
                                    <span class="badge bg-light text-dark border me-1">{{ $idx + 1 }}</span>
                                    <span class="fw-semibold">{{ $labelName }}</span>
                                </div>
                                @if(!$section->is_visible)
                                    <i class="fas fa-eye-slash text-danger" title="Disembunyikan"></i>
                                @else
                                    <i class="fas fa-eye text-success" title="Ditampilkan"></i>
                                @endif
                            </a>
                        @endforeach
                    </div>
                    <div class="card-footer bg-white border-top p-3">
                        <button type="submit" class="btn btn-success w-100 rounded-pill py-2 fw-bold shadow-sm">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>

            {{-- Form Inputs Tiap Section --}}
            <div class="col-lg-9">
                <div class="d-flex flex-column gap-4">
                    @foreach($landingPage->sections as $secIdx => $section)
                        @php
                            $secKey = $section->section_key;
                            $label = match($secKey) {
                                'hero' => 'Banner Utama (Hero)',
                                'stats' => 'Angka Statistik',
                                'features' => 'Keunggulan Toko',
                                'services_list' => 'Daftar Layanan Servis',
                                'workflow' => 'Alur Pengerjaan Servis',
                                'story' => 'Profil & Cerita Kami',
                                'values' => 'Nilai Pelayanan',
                                'info' => 'Informasi Kontak & Jam Buka',
                                'faqs' => 'Daftar Pertanyaan (FAQ)',
                                'cta' => 'Ajakan Bertindak (CTA)',
                                default => ucwords(str_replace('_', ' ', $secKey))
                            };
                            $content = $section->content ?? [];
                        @endphp

                        <div class="card border-0 shadow-sm rounded-4" id="sec_{{ $secKey }}">
                            {{-- Section Header --}}
                            <div class="card-header bg-white border-bottom p-4 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-3 bg-success-subtle text-success fw-bold d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        {{ $secIdx + 1 }}
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-0 text-dark">{{ $label }}</h5>
                                        <span class="badge bg-light text-muted border font-monospace small">
                                            key: {{ $secKey }} ({{ $section->type }})
                                        </span>
                                    </div>
                                </div>

                                {{-- Visibility Switch --}}
                                <div class="form-check form-switch m-0">
                                    <input type="hidden" name="sections[{{ $section->id }}][is_visible]" value="0">
                                    <input class="form-check-input" type="checkbox" role="switch" id="switch_{{ $section->id }}" name="sections[{{ $section->id }}][is_visible]" value="1" {{ $section->is_visible ? 'checked' : '' }}>
                                    <label class="form-check-label small fw-semibold text-secondary" for="switch_{{ $section->id }}">
                                        Tampilkan Section
                                    </label>
                                </div>
                            </div>

                            <input type="hidden" name="sections[{{ $section->id }}][type]" value="{{ $section->type }}">

                            {{-- Section Content --}}
                            <div class="card-body p-4">
                                @if($section->type === 'list')
                                    {{-- Optional Section Header --}}
                                    @if(isset($content['header']))
                                        <div class="p-3 bg-light rounded-3 mb-4 border">
                                            <h6 class="fw-bold text-dark mb-3">
                                                <i class="fas fa-heading text-success me-1"></i> Header / Judul Bagian
                                            </h6>
                                            <div class="row g-3">
                                                @if(isset($content['header']['badge']))
                                                    <div class="col-md-4">
                                                        <label class="form-label small fw-bold text-secondary">Teks Badge / Tag</label>
                                                        <input type="text" name="sections[{{ $section->id }}][header][badge]" class="form-control form-control-sm" value="{{ $content['header']['badge'] ?? '' }}">
                                                    </div>
                                                @endif
                                                @if(isset($content['header']['title']))
                                                    <div class="col-md-4">
                                                        <label class="form-label small fw-bold text-secondary">Judul Header</label>
                                                        <input type="text" name="sections[{{ $section->id }}][header][title]" class="form-control form-control-sm" value="{{ $content['header']['title'] ?? '' }}">
                                                    </div>
                                                @endif
                                                @if(isset($content['header']['subtitle']))
                                                    <div class="col-md-4">
                                                        <label class="form-label small fw-bold text-secondary">Sub-judul / Keterangan</label>
                                                        <input type="text" name="sections[{{ $section->id }}][header][subtitle]" class="form-control form-control-sm" value="{{ $content['header']['subtitle'] ?? '' }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif

                                    {{-- Items List --}}
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="fw-bold text-dark mb-0">
                                            <i class="fas fa-th-list text-success me-1"></i> Daftar Item Konten
                                        </h6>
                                        <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3" onclick="addListItem({{ $section->id }}, '{{ $secKey }}')">
                                            <i class="fas fa-plus me-1"></i> Tambah Item
                                        </button>
                                    </div>

                                    <div class="d-flex flex-column gap-3" id="items_container_{{ $section->id }}">
                                        @php
                                            $items = $content['items'] ?? [];
                                        @endphp
                                        @foreach($items as $i => $item)
                                            <div class="card border rounded-3 p-3 bg-white shadow-2xs position-relative item-row" id="item_{{ $section->id }}_{{ $i }}">
                                                <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                                    <span class="badge bg-light text-secondary border small">Item #{{ $i + 1 }}</span>
                                                    <button type="button" class="btn btn-link text-danger p-0 small text-decoration-none" onclick="removeListItem('item_{{ $section->id }}_{{ $i }}')">
                                                        <i class="fas fa-trash-alt me-1"></i> Hapus
                                                    </button>
                                                </div>

                                                <div class="row g-2">
                                                    @if(isset($item['value']) || $secKey === 'stats')
                                                        <div class="col-md-4">
                                                            <label class="form-label small text-muted mb-1">Angka / Nilai</label>
                                                            <input type="text" name="sections[{{ $section->id }}][items][{{ $i }}][value]" class="form-control form-control-sm fw-bold" value="{{ $item['value'] ?? '' }}">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="form-label small text-muted mb-1">Keterangan Label</label>
                                                            <input type="text" name="sections[{{ $section->id }}][items][{{ $i }}][label]" class="form-control form-control-sm" value="{{ $item['label'] ?? '' }}">
                                                        </div>
                                                    @elseif(isset($item['step']) || $secKey === 'workflow')
                                                        <div class="col-md-2">
                                                            <label class="form-label small text-muted mb-1">Step</label>
                                                            <input type="text" name="sections[{{ $section->id }}][items][{{ $i }}][step]" class="form-control form-control-sm font-monospace text-center fw-bold" value="{{ $item['step'] ?? '' }}">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label small text-muted mb-1">Judul Langkah</label>
                                                            <input type="text" name="sections[{{ $section->id }}][items][{{ $i }}][title]" class="form-control form-control-sm fw-semibold" value="{{ $item['title'] ?? '' }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label small text-muted mb-1">Deskripsi Langkah</label>
                                                            <input type="text" name="sections[{{ $section->id }}][items][{{ $i }}][description]" class="form-control form-control-sm" value="{{ $item['description'] ?? '' }}">
                                                        </div>
                                                    @elseif(isset($item['question']) || $secKey === 'faqs')
                                                        <div class="col-12">
                                                            <label class="form-label small text-muted mb-1">Pertanyaan FAQ</label>
                                                            <input type="text" name="sections[{{ $section->id }}][items][{{ $i }}][question]" class="form-control form-control-sm fw-bold" value="{{ $item['question'] ?? '' }}">
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <label class="form-label small text-muted mb-1">Jawaban FAQ</label>
                                                            <textarea name="sections[{{ $section->id }}][items][{{ $i }}][answer]" class="form-control form-control-sm" rows="2">{{ $item['answer'] ?? '' }}</textarea>
                                                        </div>
                                                    @else
                                                        {{-- Default Title & Description --}}
                                                        <div class="col-md-4">
                                                            <label class="form-label small text-muted mb-1">Judul Item</label>
                                                            <input type="text" name="sections[{{ $section->id }}][items][{{ $i }}][title]" class="form-control form-control-sm fw-bold" value="{{ $item['title'] ?? '' }}">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="form-label small text-muted mb-1">Deskripsi / Penjelasan</label>
                                                            <textarea name="sections[{{ $section->id }}][items][{{ $i }}][description]" class="form-control form-control-sm" rows="2">{{ $item['description'] ?? '' }}</textarea>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{-- Type: TEXT / FIELDS --}}
                                    <div class="row g-3">
                                        @foreach($content as $fieldKey => $fieldVal)
                                            @php
                                                $fieldLabel = match($fieldKey) {
                                                    'badge' => 'Teks Badge / Tag Kecil',
                                                    'title' => 'Judul Utama',
                                                    'subtitle' => 'Sub-judul / Ringkasan',
                                                    'cta_primary_text' => 'Teks Tombol Utama',
                                                    'cta_primary_url' => 'URL Link Tombol Utama',
                                                    'cta_secondary_text' => 'Teks Tombol Kedua',
                                                    'cta_secondary_url' => 'URL Link Tombol Kedua',
                                                    'button_text' => 'Teks Tombol Aksi',
                                                    'button_url' => 'URL Link Tombol Aksi',
                                                    'store_name' => 'Nama Toko / Usaha',
                                                    'address' => 'Alamat Lengkap Toko',
                                                    'store_hours' => 'Jam Operasional Toko',
                                                    'phone' => 'Nomor Telepon Toko',
                                                    'whatsapp' => 'Nomor WhatsApp Resmi (Contoh: 085693801996)',
                                                    'email' => 'Alamat Email Resmi',
                                                    'maps_link' => 'Link Google Maps',
                                                    'paragraph1' => 'Paragraf Cerita 1',
                                                    'paragraph2' => 'Paragraf Cerita 2',
                                                    default => ucwords(str_replace('_', ' ', $fieldKey))
                                                };
                                                $isTextarea = in_array($fieldKey, ['subtitle', 'paragraph1', 'paragraph2', 'address']);
                                            @endphp
                                            <div class="{{ $isTextarea ? 'col-12' : (str_contains($fieldKey, 'url') ? 'col-md-6' : 'col-md-6') }}">
                                                <label class="form-label small fw-bold text-secondary mb-1">
                                                    {{ $fieldLabel }}
                                                </label>
                                                @if($isTextarea)
                                                    <textarea name="sections[{{ $section->id }}][{{ $fieldKey }}]" class="form-control form-control-sm" rows="3">{{ $fieldVal }}</textarea>
                                                @else
                                                    <input type="text" name="sections[{{ $section->id }}][{{ $fieldKey }}]" class="form-control form-control-sm" value="{{ $fieldVal }}">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    {{-- Bottom Submit Bar --}}
                    <div class="card border-0 bg-white shadow-sm rounded-4 p-3 d-flex flex-row justify-content-between align-items-center">
                        <span class="text-muted small">
                            Pastikan Anda menyimpan perubahan sebelum berpindah ke halaman lain.
                        </span>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded-pill fw-bold shadow-sm">
                            <i class="fas fa-save me-1"></i> Simpan Semua Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Hidden Form Reset Defaults --}}
<form id="resetDefaultForm" action="{{ route('admin.landing-pages.reset', $landingPage->slug) }}" method="POST" style="display:none;">
    @csrf
</form>

<script>
    function confirmResetDefaults() {
        Swal.fire({
            title: 'Reset Konten ke Pengaturan Awal?',
            text: 'Semua teks dan pengaturan pada halaman ini akan dikembalikan seperti bawaan awal instalasi.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Reset Sekarang!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('resetDefaultForm').submit();
            }
        });
    }

    function removeListItem(rowId) {
        const row = document.getElementById(rowId);
        if (row) {
            row.remove();
        }
    }

    let dynamicItemIndex = 100;
    function addListItem(sectionId, secKey) {
        const container = document.getElementById('items_container_' + sectionId);
        if (!container) return;
        
        dynamicItemIndex++;
        const rowId = 'item_' + sectionId + '_' + dynamicItemIndex;
        let fieldsHtml = '';

        if (secKey === 'stats') {
            fieldsHtml = `
                <div class="col-md-4">
                    <label class="form-label small text-muted mb-1">Angka / Nilai</label>
                    <input type="text" name="sections[${sectionId}][items][${dynamicItemIndex}][value]" class="form-control form-control-sm fw-bold" placeholder="Misal: 99%">
                </div>
                <div class="col-md-8">
                    <label class="form-label small text-muted mb-1">Keterangan Label</label>
                    <input type="text" name="sections[${sectionId}][items][${dynamicItemIndex}][label]" class="form-control form-control-sm" placeholder="Misal: Tingkat Kepuasan">
                </div>
            `;
        } else if (secKey === 'workflow') {
            fieldsHtml = `
                <div class="col-md-2">
                    <label class="form-label small text-muted mb-1">Step</label>
                    <input type="text" name="sections[${sectionId}][items][${dynamicItemIndex}][step]" class="form-control form-control-sm font-monospace text-center fw-bold" placeholder="05">
                </div>
                <div class="col-md-4">
                    <label class="form-label small text-muted mb-1">Judul Langkah</label>
                    <input type="text" name="sections[${sectionId}][items][${dynamicItemIndex}][title]" class="form-control form-control-sm fw-semibold" placeholder="Judul Langkah">
                </div>
                <div class="col-md-6">
                    <label class="form-label small text-muted mb-1">Deskripsi Langkah</label>
                    <input type="text" name="sections[${sectionId}][items][${dynamicItemIndex}][description]" class="form-control form-control-sm" placeholder="Penjelasan ringkas">
                </div>
            `;
        } else if (secKey === 'faqs') {
            fieldsHtml = `
                <div class="col-12">
                    <label class="form-label small text-muted mb-1">Pertanyaan FAQ</label>
                    <input type="text" name="sections[${sectionId}][items][${dynamicItemIndex}][question]" class="form-control form-control-sm fw-bold" placeholder="Tuliskan pertanyaan...">
                </div>
                <div class="col-12 mt-2">
                    <label class="form-label small text-muted mb-1">Jawaban FAQ</label>
                    <textarea name="sections[${sectionId}][items][${dynamicItemIndex}][answer]" class="form-control form-control-sm" rows="2" placeholder="Tuliskan jawaban lengkap..."></textarea>
                </div>
            `;
        } else {
            fieldsHtml = `
                <div class="col-md-4">
                    <label class="form-label small text-muted mb-1">Judul Item</label>
                    <input type="text" name="sections[${sectionId}][items][${dynamicItemIndex}][title]" class="form-control form-control-sm fw-bold" placeholder="Judul">
                </div>
                <div class="col-md-8">
                    <label class="form-label small text-muted mb-1">Deskripsi / Penjelasan</label>
                    <textarea name="sections[${sectionId}][items][${dynamicItemIndex}][description]" class="form-control form-control-sm" rows="2" placeholder="Penjelasan item..."></textarea>
                </div>
            `;
        }

        const div = document.createElement('div');
        div.className = 'card border rounded-3 p-3 bg-white shadow-2xs position-relative item-row';
        div.id = rowId;
        div.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                <span class="badge bg-success-subtle text-success border border-success-subtle small">Item Baru</span>
                <button type="button" class="btn btn-link text-danger p-0 small text-decoration-none" onclick="removeListItem('${rowId}')">
                    <i class="fas fa-trash-alt me-1"></i> Hapus
                </button>
            </div>
            <div class="row g-2">
                ${fieldsHtml}
            </div>
        `;
        container.appendChild(div);
    }
</script>
@endsection
