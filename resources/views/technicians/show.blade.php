@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Detail Teknisi</h1>
        <a href="{{ route('technicians.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0">Informasi Teknisi</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tech-info p-3 bg-light rounded mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>ID:</strong> {{ $technician->id }}</p>
                                <p><strong>Nama Teknisi:</strong> {{ $technician->name }}</p>
                                <p><strong>Username:</strong> {{ $technician->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Role:</strong> {{ ucfirst($technician->role) }}</p>
                                <p><strong>Terdaftar Pada:</strong> {{ $technician->created_at->format('d M Y H:i') }}</p>
                                <p><strong>Terakhir Diperbarui:</strong> {{ $technician->updated_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('technicians.edit', $technician->id) }}" class="btn btn-primary me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $technician->id }}">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal{{ $technician->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $technician->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $technician->id }}">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus teknisi <strong>{{ $technician->name }}</strong>?
                <br><small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('technicians.destroy', $technician->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection