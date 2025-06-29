{{-- resources/views/servicestatus.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Perbaikan - Layanan Servis Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/servicestatus.css'])
</head>
<body>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="status-card">
                    <div class="status-header">
                        <div class="status-icon">
                            <i class="fas fa-laptop-medical"></i>
                        </div>
                        <h2 class="mb-0">Lacak Status Perbaikan</h2>
                        <p class="mb-0 mt-2">Masukkan kode servis untuk memeriksa status perbaikan saat ini</p>
                    </div>
                    
                    <div class="card-body p-4">
                        <form action="{{ url('/servicestatus') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-search text-primary"></i>
                                    </span>
                                    <input type="text" id="service_code" name="service_code" 
                                           class="form-control border-start-0" 
                                           placeholder="contoh: SVC-ABC123" required>
                                </div>
                                <div class="form-text text-muted">
                                    <i class="fas fa-info-circle"></i> Kode servis diberikan saat Anda menyerahkan perangkat
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-check-status">
                                    <i class="fas fa-search me-2"></i> Cek Status
                                </button>
                            </div>
                        </form>

                        @if(session('error'))
                            <div class="alert alert-danger mt-4">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="action-buttons">
                    <a href="{{ url('/') }}" class="btn btn-back">
                        <i class="fas fa-home me-2"></i> Kembali ke Beranda
                    </a>
                    <a href="{{ url('/contact') }}" class="btn btn-back ms-2">
                        <i class="fas fa-headset me-2"></i> Hubungi Dukungan
                    </a>
                </div>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/servicestatus.js'])
</body>
</html>