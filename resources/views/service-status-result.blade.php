{{-- resources/views/service-status-result.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Perbaikan - Layanan Servis Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/service-status-result.css'])
</head>
<body>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="result-card">
                    <div class="status-header">
                        <div class="status-icon">
                            @if($serviceOrder->status == 'completed')
                                <i class="fas fa-check-circle"></i>
                            @elseif($serviceOrder->status == 'process')
                                <i class="fas fa-tools"></i>
                            @elseif($serviceOrder->status == 'cancelled')
                                <i class="fas fa-times-circle"></i>
                            @else
                                <i class="fas fa-clock"></i>
                            @endif
                        </div>
                        <h2 class="mb-2">Status Perbaikan</h2>
                        <p class="mb-3">{{ $serviceOrder->service_code }}</p>
                        <div class="d-inline-block">
                            <span class="badge status-badge status-{{ $serviceOrder->status }}">
                                @if($serviceOrder->status == 'pending')
                                    Menunggu
                                @elseif($serviceOrder->status == 'process')
                                    Dalam Proses
                                @elseif($serviceOrder->status == 'completed')
                                    Selesai
                                @elseif($serviceOrder->status == 'cancelled')
                                    Dibatalkan
                                @endif
                            </span>
                        </div>
                    </div>
                    
                    <div class="info-section">
                        <div class="info-item">
                            <span class="info-icon"><i class="fas fa-user"></i></span>
                            <span class="info-label">Pelanggan:</span>
                            <span class="info-value">{{ $serviceOrder->customer_name }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-icon"><i class="fas fa-laptop"></i></span>
                            <span class="info-label">Perangkat:</span>
                            <span class="info-value">{{ $serviceOrder->laptop_name }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-icon"><i class="fas fa-tag"></i></span>
                            <span class="info-label">Tipe/Model:</span>
                            <span class="info-value">{{ $serviceOrder->laptop_type }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-icon"><i class="fas fa-calendar-alt"></i></span>
                            <span class="info-label">Tanggal Diterima:</span>
                            <span class="info-value">{{ $serviceOrder->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="description-section">
                        <h5 class="mb-3"><i class="fas fa-exclamation-triangle me-2 text-warning"></i>Deskripsi Masalah</h5>
                        <p class="mb-4">{{ $serviceOrder->problem_description }}</p>
                        
                        <h5 class="mb-3"><i class="fas fa-clipboard-list me-2 text-primary"></i>Catatan Servis</h5>
                        <p class="mb-0">{{ $serviceOrder->service_note ?? 'Belum ada catatan servis.' }}</p>
                    </div>
                </div>
                
                <div class="result-card">
                    <div class="timeline-section">
                        <h5 class="mb-4"><i class="fas fa-history me-2"></i>Service Timeline</h5>
                        
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-dot completed"></div>
                                <div class="timeline-content">
                                    <h6>Penerimaan Servis</h6>
                                    <p class="text-muted mb-0">{{ $serviceOrder->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-dot {{ $serviceOrder->status == 'pending' ? 'pending' : ($serviceOrder->status == 'process' || $serviceOrder->status == 'completed' ? 'completed' : '') }}"></div>
                                <div class="timeline-content">
                                    <h6>Diagnosa</h6>
                                    <p class="text-muted mb-0">
                                        @if($serviceOrder->status == 'pending')
                                            Sedang berlangsung
                                        @else
                                            Selesai
                                        @endif
                                    </p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-dot {{ $serviceOrder->status == 'process' || $serviceOrder->status == 'completed' ? 'completed' : '' }}"></div>
                                <div class="timeline-content">
                                    <h6>Proses Perbaikan</h6>
                                    <p class="text-muted mb-0">
                                        @if($serviceOrder->status == 'pending')
                                            Menunggu
                                        @elseif($serviceOrder->status == 'process')
                                            Sedang berlangsung
                                        @elseif($serviceOrder->status == 'completed')
                                            Selesai
                                        @endif
                                    </p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-dot {{ $serviceOrder->status == 'completed' ? 'completed' : '' }}"></div>
                                <div class="timeline-content">
                                    <h6>Perbaikan Selesai</h6>
                                    <p class="text-muted mb-0">
                                        @if($serviceOrder->status == 'completed')
                                            Siap diambil
                                        @else
                                            Menunggu
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <a href="{{ url('/servicestatus') }}" class="btn btn-primary btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Cek Status
                    </a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-primary ms-2">
                        <i class="fas fa-headset me-2"></i> Hubungi Dukungan
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary ms-2">
                        <i class="fas fa-home me-2"></i> Beranda
                    </a>
                </div>
            </div>
        </div>
    </main>
    
    <x-footer></x-footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>