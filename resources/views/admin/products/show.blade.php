@extends('layouts.app')

@section('title', 'Detail Produk')

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
        <h1>Detail Produk</h1>
        <p>Lihat informasi lengkap produk</p>
    </div>
    <div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Produk
        </a>
        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning ms-2">
            <i class="fas fa-edit"></i> Edit Produk
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Gambar Produk</h5>
            </div>
            <div class="card-body p-0 text-center">
                @if($product->image)
                    <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid p-3" style="max-height: 350px;">
                @else
                    <div class="p-5 text-muted">
                        <i class="fas fa-image fa-5x mb-3"></i>
                        <p>Tidak ada gambar tersedia</p>
                    </div>
                @endif
            </div>
            
            <div class="card-footer bg-white">
                <div class="mb-2">
                    <span class="fw-bold">Status:</span>
                    @if($product->status == 'active')
                        <span class="badge bg-success ms-2">Aktif</span>
                    @else
                        <span class="badge bg-secondary ms-2">Tidak Aktif</span>
                    @endif
                </div>
                
                <div class="mb-2">
                    <span class="fw-bold">Unggulan:</span>
                    @if($product->featured)
                        <span class="badge bg-primary ms-2">Ya</span>
                    @else
                        <span class="badge bg-light text-dark ms-2">Tidak</span>
                    @endif
                </div>
                
                <div class="mb-2">
                    <span class="fw-bold">Dibuat:</span>
                    <span class="ms-2">{{ $product->created_at->format('d M Y H:i') }}</span>
                </div>
                
                <div>
                    <span class="fw-bold">Terakhir Diperbarui:</span>
                    <span class="ms-2">{{ $product->updated_at->format('d M Y H:i') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 mb-4">
        <div class="card h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Informasi Produk</h5>
            </div>
            <div class="card-body">
                <h4 class="mb-1">{{ $product->name }}</h4>
                @if($product->short_description)
                    <p class="text-muted">{{ $product->short_description }}</p>
                @endif
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th style="width: 40%">Kategori:</th>
                                    <td>{{ $categoryTranslations[$product->category] ?? $product->category }}</td>
                                </tr>
                                @if($product->subcategory)
                                <tr>
                                    <th>Subkategori:</th>
                                    <td>{{ $product->subcategory }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Merek:</th>
                                    <td>{{ $product->brand }}</td>
                                </tr>
                                @if($product->weight)
                                <tr>
                                    <th>Berat:</th>
                                    <td>{{ $product->weight }} g</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th style="width: 40%">Harga:</th>
                                    <td>
                                        @if($product->discounted_price)
                                            <span class="text-decoration-line-through text-muted">{{ $product->formatted_price }}</span><br>
                                            <span class="text-danger fw-bold">{{ $product->formatted_discounted_price }}</span>
                                        @else
                                            <span class="fw-bold">{{ $product->formatted_price }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @if($product->sku)
                                <tr>
                                    <th>SKU:</th>
                                    <td>{{ $product->sku }}</td>
                                </tr>
                                @endif
                                @if($product->code)
                                <tr>
                                    <th>Kode Produk:</th>
                                    <td>{{ $product->code }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h5 class="border-bottom pb-2 mb-3">Deskripsi</h5>
                    <div class="product-description">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>
                
                @if($product->marketplace_shopee || $product->marketplace_tokopedia)
                <div class="mt-4">
                    <h5 class="border-bottom pb-2 mb-3">Tautan Marketplace</h5>
                    <div class="row">
                        @if($product->marketplace_shopee)
                        <div class="col-md-6 mb-2">
                            <a href="{{ $product->marketplace_shopee }}" target="_blank" class="btn btn-outline-primary w-100">
                                <i class="fas fa-shopping-bag me-2"></i> Beli di Shopee
                            </a>
                        </div>
                        @endif
                        
                        @if($product->marketplace_tokopedia)
                        <div class="col-md-6 mb-2">
                            <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="btn btn-outline-success w-100">
                                <i class="fas fa-store me-2"></i> Beli di Tokopedia
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-danger">Attention!!!</h5>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1">Hapus produk ini</h6>
                <p class="text-muted mb-0">Setelah Anda menghapus produk, tindakan ini tidak dapat dibatalkan. Harap pastikan.</p>
            </div>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Hapus Produk
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus <strong>{{ $product->name }}</strong>?</p>
                <p class="text-danger mb-0">Tindakan ini tidak dapat dibatalkan.</p>
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
@endsection