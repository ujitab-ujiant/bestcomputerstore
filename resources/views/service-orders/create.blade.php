@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Tambah Service Order Baru</h1>
        <a href="{{ route('service-orders.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('service-orders.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <h5>Informasi Pelanggan</h5>
                        <hr>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="customer_name" class="form-label">Nama Customer</label>
                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                        @error('customer_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="customer_phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('customer_phone') is-invalid @enderror" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}">
                        @error('customer_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="customer_email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('customer_email') is-invalid @enderror" id="customer_email" name="customer_email" value="{{ old('customer_email') }}">
                        @error('customer_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="customer_address" class="form-label">Alamat</label>
                        <textarea class="form-control @error('customer_address') is-invalid @enderror" id="customer_address" name="customer_address">{{ old('customer_address') }}</textarea>
                        @error('customer_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-12 mb-3">
                        <h5>Informasi Service</h5>
                        <hr>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="laptop_name" class="form-label">Nama Laptop</label>
                        <input type="text" class="form-control @error('laptop_name') is-invalid @enderror" id="laptop_name" name="laptop_name" value="{{ old('laptop_name') }}" required>
                        @error('laptop_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="laptop_type" class="form-label">Tipe Laptop</label>
                        <input type="text" class="form-control @error('laptop_type') is-invalid @enderror" id="laptop_type" name="laptop_type" value="{{ old('laptop_type') }}" required>
                        @error('laptop_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="process" {{ old('status') == 'process' ? 'selected' : '' }}>Process</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Biaya</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="0">
                        </div>
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label for="problem_description" class="form-label">Deskripsi Masalah</label>
                        <textarea class="form-control @error('problem_description') is-invalid @enderror" id="problem_description" name="problem_description" rows="3" required>{{ old('problem_description') }}</textarea>
                        @error('problem_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label for="service_note" class="form-label">Catatan Service (Opsional)</label>
                        <textarea class="form-control" id="service_note" name="service_note" rows="3">{{ old('service_note') }}</textarea>
                    </div>
                    
                    @if(Auth::user()->role == 'admin')
                    <div class="col-md-6 mb-3">
                        <label for="technician_id" class="form-label">Teknisi</label>
                        <select class="form-select" id="technician_id" name="technician_id">
                            <option value="">-- Pilih Teknisi --</option>
                            @foreach($technicians as $technician)
                            <option value="{{ $technician->id }}" {{ old('technician_id') == $technician->id ? 'selected' : '' }}>
                                {{ $technician->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Simpan Service Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/rupiah-format.js') }}"></script>
@endsection