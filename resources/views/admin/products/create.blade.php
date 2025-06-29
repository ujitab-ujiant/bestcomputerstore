@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="top-navbar d-flex justify-content-between align-items-center mb-4">
    <div class="welcome-text">
        <h1>Tambah Produk Baru</h1>
        <p>Buat produk baru untuk katalog Anda</p>
    </div>
    <div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Produk
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Informasi Produk</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="short_description" class="form-label">Deskripsi Singkat</label>
                        <input type="text" class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" value="{{ old('short_description') }}">
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Deskripsi singkat (maksimal 255 karakter)</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Lengkap <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Produk <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format yang diterima: jpeg, png, jpg, gif (maksimal 2MB)</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="text-center p-3 border rounded mt-2">
                            <img id="image-preview" src="#" alt="Pratinjau Gambar" style="max-width: 100%; max-height: 200px; display: none;">
                            <div id="no-image" class="text-muted">
                                <i class="fas fa-image fa-3x mb-2"></i>
                                <p>Pratinjau gambar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="discounted_price" class="form-label">Harga Diskon</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('discounted_price') is-invalid @enderror" id="discounted_price" name="discounted_price" value="{{ old('discounted_price') }}">
                            @error('discounted_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="weight" class="form-label">Berat (g)</label>
                        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}">
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="PC Component" {{ old('category') == 'PC Component' ? 'selected' : '' }}>Komponen PC</option>
                            <option value="Peripheral" {{ old('category') == 'Peripheral' ? 'selected' : '' }}>Periferal</option>
                            <option value="Security" {{ old('category') == 'Security' ? 'selected' : '' }}>Keamanan & Jaringan</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="subcategory" class="form-label">Subkategori</label>
                        <input type="text" class="form-control @error('subcategory') is-invalid @enderror" id="subcategory" name="subcategory" value="{{ old('subcategory') }}">
                        @error('subcategory')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="brand" class="form-label">Merek <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand') }}" required>
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku') }}">
                        @error('sku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="code" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label d-block">Produk Unggulan</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="featured">Tampilkan di Produk Unggulan</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="marketplace_shopee" class="form-label">URL Shopee</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                            <input type="url" class="form-control @error('marketplace_shopee') is-invalid @enderror" id="marketplace_shopee" name="marketplace_shopee" value="{{ old('marketplace_shopee') }}">
                            @error('marketplace_shopee')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="marketplace_tokopedia" class="form-label">URL Tokopedia</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-store"></i></span>
                            <input type="url" class="form-control @error('marketplace_tokopedia') is-invalid @enderror" id="marketplace_tokopedia" name="marketplace_tokopedia" value="{{ old('marketplace_tokopedia') }}">
                            @error('marketplace_tokopedia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function(event) {
            const imgPreview = document.getElementById('image-preview');
            imgPreview.src = event.target.result;
            imgPreview.style.display = 'block';
            document.getElementById('no-image').style.display = 'none';
        }
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endpush