@extends('layouts.app')

@section('title', 'Laporan Produk')

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
        <h1>Laporan Produk</h1>
        <p>Laporan lengkap manajemen produk</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('admin.products.print', request()->query()) }}" class="btn btn-success" target="_blank">
            <i class="fas fa-print"></i> Cetak Laporan
        </a>
    </div>
</div>

@if(collect($filters)->filter()->isNotEmpty())
<div class="card mb-4">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0"><i class="fas fa-filter"></i> Filter Yang Diterapkan</h5>
    </div>
    <div class="card-body">
        <div class="row">
            @if($filters['search'])
                <div class="col-md-4 mb-2">
                    <strong>Pencarian:</strong> {{ $filters['search'] }}
                </div>
            @endif
            @if($filters['category'])
                <div class="col-md-4 mb-2">
                    <strong>Kategori:</strong> 
                    {{ $categoryTranslations[$filters['category']] ?? $filters['category'] }}
                </div>
            @endif
            @if($filters['brand'])
                <div class="col-md-4 mb-2">
                    <strong>Merek:</strong> {{ $filters['brand'] }}
                </div>
            @endif
            @if($filters['status'])
                <div class="col-md-4 mb-2">
                    <strong>Status:</strong> {{ $filters['status'] == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                </div>
            @endif
            @if($filters['featured'] !== null)
                <div class="col-md-4 mb-2">
                    <strong>Unggulan:</strong> {{ $filters['featured'] == '1' ? 'Ya' : 'Tidak' }}
                </div>
            @endif
            @if($filters['date_from'])
                <div class="col-md-4 mb-2">
                    <strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($filters['date_from'])->format('d/m/Y') }}
                </div>
            @endif
            @if($filters['date_to'])
                <div class="col-md-4 mb-2">
                    <strong>Tanggal Akhir:</strong> {{ \Carbon\Carbon::parse($filters['date_to'])->format('d/m/Y') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endif

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="text-primary mb-1">{{ $statistics['total_products'] }}</h2>
                        <p class="text-muted mb-0">Total Produk</p>
                    </div>
                    <div class="text-primary">
                        <i class="fas fa-box fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="text-success mb-1">{{ $statistics['active_products'] }}</h2>
                        <p class="text-muted mb-0">Produk Aktif</p>
                    </div>
                    <div class="text-success">
                        <i class="fas fa-check-circle fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="text-warning mb-1">{{ $statistics['inactive_products'] }}</h2>
                        <p class="text-muted mb-0">Produk Tidak Aktif</p>
                    </div>
                    <div class="text-warning">
                        <i class="fas fa-pause-circle fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="text-info mb-1">{{ $statistics['featured_products'] }}</h2>
                        <p class="text-muted mb-0">Produk Unggulan</p>
                    </div>
                    <div class="text-info">
                        <i class="fas fa-star fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="text-success">Harga Terendah</h5>
                <h3>Rp {{ number_format($statistics['price_statistics']['min_price'], 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="text-primary">Harga Rata-rata</h5>
                <h3>Rp {{ number_format($statistics['price_statistics']['avg_price'], 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="text-danger">Harga Tertinggi</h5>
                <h3>Rp {{ number_format($statistics['price_statistics']['max_price'], 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-chart-pie"></i> Produk per Kategori</h5>
            </div>
            <div class="card-body">
                @if(count($statistics['products_by_category']) > 0)
                    <canvas id="categoryChart" width="400" height="300"></canvas>
                    <div class="mt-3">
                        @foreach($statistics['products_by_category'] as $category => $count)
                            <div class="d-flex justify-content-between mb-1">
                                <span>
                                    {{ $categoryTranslations[$category] ?? $category }}
                                </span>
                                <span class="badge bg-primary">{{ $count }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center">Tidak ada data kategori</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-chart-bar"></i> Top 10 Merek</h5>
            </div>
            <div class="card-body">
                @if(count($statistics['products_by_brand']) > 0)
                    <canvas id="brandChart" width="400" height="300"></canvas>
                    <div class="mt-3">
                        @foreach($statistics['products_by_brand'] as $brand => $count)
                            <div class="d-flex justify-content-between mb-1">
                                <span>{{ $brand }}</span>
                                <span class="badge bg-success">{{ $count }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center">Tidak ada data merek</p>
                @endif
            </div>
        </div>
    </div>
</div>

@if(count($statistics['recent_products']) > 0)
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-clock"></i> 5 Produk Terbaru</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Merek</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statistics['recent_products'] as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('img/products/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="img-thumbnail" 
                                 style="max-width: 50px; max-height: 50px;">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $categoryTranslations[$product->category] ?? $product->category }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>
                            @if($product->discounted_price)
                                <span class="text-decoration-line-through text-muted small">Rp {{ number_format($product->price, 0, ',', '.') }}</span><br>
                                <span class="text-danger">Rp {{ number_format($product->discounted_price, 0, ',', '.') }}</span>
                            @else
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            @endif
                        </td>
                        <td>
                            @if($product->status == 'active')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Semua Produk ({{ count($products) }} produk)</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>SKU/Code</th>
                        <th>Kategori</th>
                        <th>Merek</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Unggulan</th>
                        <th>Tanggal Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset('img/products/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="img-thumbnail" 
                                 style="max-width: 60px; max-height: 60px;">
                        </td>
                        <td>
                            <strong>{{ $product->name }}</strong>
                            @if($product->short_description)
                                <br><small class="text-muted">{{ Str::limit($product->short_description, 50) }}</small>
                            @endif
                        </td>
                        <td>
                            @if($product->sku)
                                <small>SKU: {{ $product->sku }}</small><br>
                            @endif
                            @if($product->code)
                                <small>Code: {{ $product->code }}</small>
                            @endif
                        </td>
                        <td>{{ $categoryTranslations[$product->category] ?? $product->category }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>
                            @if($product->discounted_price)
                                <span class="text-decoration-line-through text-muted small">Rp {{ number_format($product->price, 0, ',', '.') }}</span><br>
                                <span class="text-danger fw-bold">Rp {{ number_format($product->discounted_price, 0, ',', '.') }}</span>
                            @else
                                <span class="fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            @endif
                        </td>
                        <td>
                            @if($product->status == 'active')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            @if($product->featured)
                                <span class="badge bg-warning text-dark">Unggulan</span>
                            @else
                                <span class="badge bg-light text-dark">Tidak</span>
                            @endif
                        </td>
                        <td>
                            <small>{{ $product->created_at->format('d/m/Y') }}</small>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Tidak ada data produk ditemukan</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="text-center mt-4 text-muted">
    <small>
        Laporan dibuat pada: {{ now()->format('d/m/Y H:i:s') }} WIB
        <br>
        Total {{ count($products) }} produk ditampilkan
    </small>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(count($statistics['products_by_category']) > 0)
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryData = @json($statistics['products_by_category']);
    const categoryLabels = Object.keys(categoryData).map(category => {
        const translations = {
            'PC Component': 'Komponen PC',
            'Peripheral': 'Periferal',
            'Security': 'Keamanan & Jaringan'
        };
        return translations[category] || category;
    });
    const categoryValues = Object.values(categoryData);
    
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: categoryLabels,
            datasets: [{
                data: categoryValues,
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF',
                    '#FF9F40'
                ],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
    @endif

    @if(count($statistics['products_by_brand']) > 0)
    const brandCtx = document.getElementById('brandChart').getContext('2d');
    const brandData = @json($statistics['products_by_brand']);
    const brandLabels = Object.keys(brandData);
    const brandValues = Object.values(brandData);
    
    new Chart(brandCtx, {
        type: 'bar',
        data: {
            labels: brandLabels,
            datasets: [{
                label: 'Jumlah Produk',
                data: brandValues,
                backgroundColor: '#36A2EB',
                borderColor: '#36A2EB',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    @endif
});
</script>

<style>
.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.h-100 {
    height: 100% !important;
}

canvas {
    max-height: 300px !important;
}

@media print {
    .top-navbar, .btn {
        display: none !important;
    }
    
    .card {
        border: 1px solid #ddd !important;
        box-shadow: none !important;
    }
    
    .table {
        font-size: 12px;
    }
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
    
    .table-responsive {
        font-size: 0.875rem;
    }
    
    canvas {
        max-height: 250px !important;
    }
}
</style>
@endsection