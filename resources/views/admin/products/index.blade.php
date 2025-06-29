@extends('layouts.app')

@section('title', 'Manajemen Produk')

@section('content')
@php
    $categoryTranslations = [
        'PC Component' => 'Komponen PC',
        'Peripheral' => 'Periferal',
        'Security' => 'Keamanan & Jaringan'
    ];
@endphp

<div class="top-navbar d-flex justify-content-between align-items-center mb-4">
    <div class="welcome-text">
        <h1>Manajemen Produk</h1>
        <p>Kelola katalog produk</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Produk Baru
        </a>
        <div class="dropdown">
            <button class="btn btn-info text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-file-alt"></i> Laporan
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.products.report', request()->query()) }}">
                        <i class="fas fa-chart-bar"></i> Lihat Laporan
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('admin.products.print', request()->query()) }}" target="_blank">
                        <i class="fas fa-print"></i> Cetak Laporan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(isset($statistics))
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="text-primary mb-0">{{ $statistics['total_products'] }}</h3>
                        <p class="text-muted mb-0">Total Produk</p>
                    </div>
                    <div class="text-primary">
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="text-success mb-0">{{ $statistics['active_products'] }}</h3>
                        <p class="text-muted mb-0">Produk Aktif</p>
                    </div>
                    <div class="text-success">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="text-warning mb-0">{{ $statistics['inactive_products'] }}</h3>
                        <p class="text-muted mb-0">Produk Tidak Aktif</p>
                    </div>
                    <div class="text-warning">
                        <i class="fas fa-pause-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="text-info mb-0">{{ $statistics['featured_products'] }}</h3>
                        <p class="text-muted mb-0">Produk Unggulan</p>
                    </div>
                    <div class="text-info">
                        <i class="fas fa-star fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.products.index') }}" class="row g-3" id="filterForm">
            <div class="col-md-3">
                <label for="search" class="form-label">Cari Produk</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" 
                           class="form-control" 
                           id="search" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Cari nama, merek, kategori, SKU...">
                </div>
            </div>
            <div class="col-md-2">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" id="category" name="category">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $categoryTranslations[$category] ?? $category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="brand" class="form-label">Merek</label>
                <select class="form-select" id="brand" name="brand">
                    <option value="">Semua Merek</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                            {{ $brand }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="featured" class="form-label">Unggulan</label>
                <select class="form-select" id="featured" name="featured">
                    <option value="">Semua</option>
                    <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>Unggulan</option>
                    <option value="0" {{ request('featured') == '0' ? 'selected' : '' }}>Tidak Unggulan</option>
                </select>
            </div>
            <div class="col-md-1">
                <label class="form-label">&nbsp;</label>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-6">
                        <label for="date_from" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                    </div>
                    <div class="col-6">
                        <label for="date_to" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="d-flex gap-2 align-items-end">
                    <div class="flex-fill">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-refresh"></i> Reset
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card recent-table">
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Semua Produk 
                @if(request()->hasAny(['search', 'category', 'brand', 'status', 'featured', 'date_from', 'date_to']))
                    <small class="text-muted">({{ $products->total() }} hasil ditemukan)</small>
                @endif
            </h5>
            <div class="d-flex gap-2">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-sort"></i> Urutkan
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort_by' => 'name', 'sort_order' => 'asc']) }}">Nama A-Z</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort_by' => 'name', 'sort_order' => 'desc']) }}">Nama Z-A</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort_by' => 'price', 'sort_order' => 'asc']) }}">Harga Terendah</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort_by' => 'price', 'sort_order' => 'desc']) }}">Harga Tertinggi</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort_by' => 'created_at', 'sort_order' => 'desc']) }}">Terbaru</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort_by' => 'created_at', 'sort_order' => 'asc']) }}">Terlama</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-download"></i> Export
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.products.report', request()->query()) }}">
                                <i class="fas fa-eye"></i> Lihat Laporan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.products.print', request()->query()) }}" target="_blank">
                                <i class="fas fa-print"></i> Cetak PDF
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Merek</th>
                        <th>Status</th>
                        <th>Unggulan</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('img/products/' . $product->image) }}" 
                            alt="{{ $product->name }}" 
                            class="img-thumbnail" 
                            style="max-width: 80px; max-height: 80px;">
                        </td>
                        <td>
                            <div>
                                <strong>{{ $product->name }}</strong>
                                @if($product->sku)
                                    <br><small class="text-muted">SKU: {{ $product->sku }}</small>
                                @endif
                                @if($product->code)
                                    <br><small class="text-muted">Code: {{ $product->code }}</small>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($product->discounted_price)
                                <span class="text-decoration-line-through text-muted">{{ $product->formatted_price }}</span><br>
                                <span class="text-danger">{{ $product->formatted_discounted_price }}</span>
                            @else
                                {{ $product->formatted_price }}
                            @endif
                        </td>
                        <td>{{ $categoryTranslations[$product->category] ?? $product->category }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>
                            @if($product->status == 'active')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            @if($product->featured)
                                <span class="badge bg-primary">Unggulan</span>
                            @else
                                <span class="badge bg-light text-dark">Tidak</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ $product->created_at->format('d/m/Y') }}</small>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info text-white" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning text-white" title="Edit Produk">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}" title="Hapus Produk">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>

                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus {{ $product->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
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
                        <td colspan="9" class="text-center py-3">
                            @if(request()->hasAny(['search', 'category', 'brand', 'status', 'featured', 'date_from', 'date_to']))
                                Tidak ada produk yang sesuai dengan kriteria pencarian.
                                <br>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary mt-2">
                                    <i class="fas fa-refresh"></i> Reset Pencarian
                                </a>
                            @else
                                Tidak ada produk ditemukan
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white py-3 d-flex justify-content-center">
        <div class="custom-pagination">
            {{ $products->appends(request()->query())->links('custom.pagination') }}
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

.search-highlight {
    background-color: #fff3cd;
    padding: 2px 4px;
    border-radius: 3px;
}

.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.card-body {
    padding: 1.25rem;
}

.btn-group .btn {
    margin-right: 0;
}

@media (max-width: 768px) {
    .top-navbar {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 15px;
    }
    
    .top-navbar .d-flex {
        width: 100%;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .custom-pagination .pagination {
        flex-wrap: wrap;
        gap: 4px;
    }
    
    .custom-pagination .page-link {
        padding: 6px 10px;
        min-width: 36px;
        font-size: 14px;
    }
    
    .card-header .d-flex {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 10px;
    }
    
    .table-responsive {
        font-size: 0.875rem;
    }
}

@media (max-width: 576px) {
    .row.mb-4 .col-md-3 {
        margin-bottom: 1rem;
    }
    
    .btn-group {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-group .btn {
        margin-bottom: 0.25rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterSelects = document.querySelectorAll('#category, #brand, #status, #featured, #date_from, #date_to');
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            this.form.submit();
        });
    });

    document.getElementById('search').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            this.form.submit();
        }
    });
    const datePickers = document.querySelectorAll('#date_from, #date_to');
    datePickers.forEach(picker => {
        picker.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
});
</script>
@endsection