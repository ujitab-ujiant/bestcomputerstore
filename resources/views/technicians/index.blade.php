@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">Manage Teknisi</h1>
            <p class="text-muted">Kelola akun teknisi untuk sistem servis komputer</p>
        </div>
        <a href="{{ route('technicians.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Teknisi
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Cari Teknisi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('technicians.index') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <label for="search" class="form-label">Cari berdasarkan nama atau email</label>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Masukkan nama atau email teknisi..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <div class="d-grid gap-2 w-100">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        <a href="{{ route('technicians.index') }}" class="btn btn-secondary">
                            <i class="fas fa-sync"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Teknisi</h5>
            @if(request('search'))
            <small class="text-muted">
                Hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                ({{ $technicians->total() }} teknisi ditemukan)
            </small>
            @else
            <small class="text-muted">Total: {{ $technicians->total() }} teknisi</small>
            @endif
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Teknisi</th>
                            <th>Email</th>
                            <th>Terdaftar Pada</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($technicians as $technician)
                        <tr>
                            <td>{{ $technician->id }}</td>
                            <td>{{ $technician->name }}</td>
                            <td>{{ $technician->email }}</td>
                            <td>{{ $technician->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('technicians.show', $technician->id) }}" class="btn btn-sm btn-info text-white" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('technicians.edit', $technician->id) }}" class="btn btn-sm btn-warning text-white" title="Edit Teknisi">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $technician->id }}" title="Hapus Teknisi">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <div class="text-muted">
                                    @if(request('search'))
                                        <i class="fas fa-search fa-3x mb-3"></i>
                                        <p class="mb-0">Tidak ada teknisi yang ditemukan</p>
                                        <small>Coba gunakan kata kunci yang berbeda atau <a href="{{ route('technicians.index') }}">lihat semua teknisi</a></small>
                                    @else
                                        <i class="fas fa-users fa-3x mb-3"></i>
                                        <p class="mb-0">Belum ada data teknisi</p>
                                        <small>Klik tombol "Tambah Teknisi" untuk menambahkan teknisi baru</small>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($technicians->hasPages())
        <div class="card-footer bg-white py-3 d-flex justify-content-center">
            <div class="custom-pagination">
                {{ $technicians->appends(request()->query())->links('custom.pagination') }}
            </div>
        </div>
        @endif
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

@media (max-width: 576px) {
    .custom-pagination .pagination {
        flex-wrap: wrap;
        gap: 4px;
    }
    
    .custom-pagination .page-link {
        padding: 6px 10px;
        min-width: 36px;
        font-size: 14px;
    }
}
</style>
@endsection