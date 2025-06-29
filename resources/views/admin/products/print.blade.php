<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Produk - {{ now()->format('d-m-Y') }}</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        @page {
            size: A4;
            margin: 1cm;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }
        
        .header {
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .company-info {
            text-align: center;
        }
        
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 5px;
        }
        
        .report-title {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0 10px 0;
        }
        
        .report-date {
            color: #666;
            margin-bottom: 20px;
        }
        
        .filter-info {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .filter-title {
            font-weight: bold;
            color: #495057;
            margin-bottom: 10px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .stat-box {
            text-align: center;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
        
        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        
        .stat-label {
            font-size: 11px;
            color: #666;
            margin-top: 5px;
        }
        
        .price-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .price-box {
            text-align: center;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        
        .price-min { background-color: #d4edda; }
        .price-avg { background-color: #cce5ff; }
        .price-max { background-color: #f8d7da; }
        
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #495057;
            margin: 30px 0 15px 0;
            padding-bottom: 5px;
            border-bottom: 2px solid #dee2e6;
        }
        
        .category-brand-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .category-list, .brand-list {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
        }
        
        .list-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            padding: 5px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .list-item:last-child {
            border-bottom: none;
        }
        
        .list-name {
            flex: 1;
        }
        
        .list-count {
            font-weight: bold;
            color: #007bff;
        }
        
        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .products-table th,
        .products-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
            font-size: 11px;
        }
        
        .products-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #495057;
        }
        
        .products-table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        .product-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 3px;
        }
        
        .status-badge {
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
        
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-inactive {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .featured-yes {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .featured-no {
            background-color: #e2e3e5;
            color: #383d41;
        }
        
        .price-original {
            text-decoration: line-through;
            color: #6c757d;
            font-size: 10px;
        }
        
        .price-discount {
            color: #dc3545;
            font-weight: bold;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            text-align: center;
            color: #666;
            font-size: 11px;
        }
        
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .no-print {
                display: none !important;
            }
            
            .page-break {
                page-break-before: always;
            }
        }
        
        @media screen {
            .print-button {
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 1000;
            }
        }
    </style>
</head>
<body>
    <div class="print-button no-print">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="fas fa-print"></i> Cetak
        </button>
        <button onclick="window.close()" class="btn btn-secondary ms-2">
            <i class="fas fa-times"></i> Tutup
        </button>
    </div>

    <div class="header">
        <div class="company-info">
            <div class="company-name">BEST COMPUTER</div>
            <div>Sistem Manajemen Produk</div>
        </div>
        <div class="report-title">LAPORAN PRODUK</div>
        <div class="report-date">
            Dicetak pada: {{ now()->format('d F Y, H:i:s') }} WIB
        </div>
    </div>

    @if(collect($filters)->filter()->isNotEmpty())
    <div class="filter-info">
        <div class="filter-title">Filter yang Diterapkan:</div>
        <div class="row">
            @if($filters['search'])
                <div class="col-6 mb-2">
                    <strong>Pencarian:</strong> {{ $filters['search'] }}
                </div>
            @endif
            @if($filters['category'])
                <div class="col-6 mb-2">
                    <strong>Kategori:</strong> 
                    @php
                        $categoryTranslations = [
                            'PC Component' => 'Komponen PC',
                            'Peripheral' => 'Periferal',
                            'Security' => 'Keamanan & Jaringan'
                        ];
                    @endphp
                    {{ $categoryTranslations[$filters['category']] ?? $filters['category'] }}
                </div>
            @endif
            @if($filters['brand'])
                <div class="col-6 mb-2">
                    <strong>Merek:</strong> {{ $filters['brand'] }}
                </div>
            @endif
            @if($filters['status'])
                <div class="col-6 mb-2">
                    <strong>Status:</strong> {{ $filters['status'] == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                </div>
            @endif
            @if($filters['featured'] !== null)
                <div class="col-6 mb-2">
                    <strong>Unggulan:</strong> {{ $filters['featured'] == '1' ? 'Ya' : 'Tidak' }}
                </div>
            @endif
            @if($filters['date_from'])
                <div class="col-6 mb-2">
                    <strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($filters['date_from'])->format('d/m/Y') }}
                </div>
            @endif
            @if($filters['date_to'])
                <div class="col-6 mb-2">
                    <strong>Tanggal Akhir:</strong> {{ \Carbon\Carbon::parse($filters['date_to'])->format('d/m/Y') }}
                </div>
            @endif
        </div>
    </div>
    @endif

    <div class="section-title">Ringkasan Statistik</div>
    <div class="stats-grid">
        <div class="stat-box">
            <div class="stat-number">{{ $statistics['total_products'] }}</div>
            <div class="stat-label">Total Produk</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">{{ $statistics['active_products'] }}</div>
            <div class="stat-label">Produk Aktif</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">{{ $statistics['inactive_products'] }}</div>
            <div class="stat-label">Produk Tidak Aktif</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">{{ $statistics['featured_products'] }}</div>
            <div class="stat-label">Produk Unggulan</div>
        </div>
    </div>

    <div class="section-title">Statistik Harga</div>
    <div class="price-stats">
        <div class="price-box price-min">
            <strong>Harga Terendah</strong><br>
            Rp {{ number_format($statistics['price_statistics']['min_price'], 0, ',', '.') }}
        </div>
        <div class="price-box price-avg">
            <strong>Harga Rata-rata</strong><br>
            Rp {{ number_format($statistics['price_statistics']['avg_price'], 0, ',', '.') }}
        </div>
        <div class="price-box price-max">
            <strong>Harga Tertinggi</strong><br>
            Rp {{ number_format($statistics['price_statistics']['max_price'], 0, ',', '.') }}
        </div>
    </div>

    <div class="section-title">Distribusi Kategori dan Merek</div>
    <div class="category-brand-grid">
        <div class="category-list">
            <h6 style="font-weight: bold; margin-bottom: 15px;">Produk per Kategori</h6>
            @if(count($statistics['products_by_category']) > 0)
                @foreach($statistics['products_by_category'] as $category => $count)
                    <div class="list-item">
                        <span class="list-name">
                            @php
                                $categoryTranslations = [
                                    'PC Component' => 'Komponen PC',
                                    'Peripheral' => 'Periferal',
                                    'Security' => 'Keamanan & Jaringan'
                                ];
                            @endphp
                            {{ $categoryTranslations[$category] ?? $category }}
                        </span>
                        <span class="list-count">{{ $count }}</span>
                    </div>
                @endforeach
            @else
                <p style="color: #666; text-align: center;">Tidak ada data kategori</p>
            @endif
        </div>

        <div class="brand-list">
            <h6 style="font-weight: bold; margin-bottom: 15px;">Top 10 Merek</h6>
            @if(count($statistics['products_by_brand']) > 0)
                @foreach($statistics['products_by_brand'] as $brand => $count)
                    <div class="list-item">
                        <span class="list-name">{{ $brand }}</span>
                        <span class="list-count">{{ $count }}</span>
                    </div>
                @endforeach
            @else
                <p style="color: #666; text-align: center;">Tidak ada data merek</p>
            @endif
        </div>
    </div>

    @if(count($statistics['recent_products']) > 0)
    <div class="section-title">5 Produk Terbaru</div>
    <table class="products-table">
        <thead>
            <tr>
                <th style="width: 8%;">Gambar</th>
                <th style="width: 25%;">Nama</th>
                <th style="width: 12%;">Kategori</th>
                <th style="width: 12%;">Merek</th>
                <th style="width: 15%;">Harga</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 18%;">Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statistics['recent_products'] as $product)
            <tr>
                <td>
                    <img src="{{ asset('img/products/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="product-img">
                </td>
                <td>
                    <strong>{{ $product->name }}</strong>
                    @if($product->short_description)
                        <br><small style="color: #666;">{{ Str::limit($product->short_description, 40) }}</small>
                    @endif
                </td>
                <td>
                    @php
                        $categoryTranslations = [
                            'PC Component' => 'Komponen PC',
                            'Peripheral' => 'Periferal',
                            'Security' => 'Keamanan & Jaringan'
                        ];
                    @endphp
                    {{ $categoryTranslations[$product->category] ?? $product->category }}
                </td>
                <td>{{ $product->brand }}</td>
                <td>
                    @if($product->discounted_price)
                        <div class="price-original">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        <div class="price-discount">Rp {{ number_format($product->discounted_price, 0, ',', '.') }}</div>
                    @else
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    @endif
                </td>
                <td>
                    <span class="status-badge {{ $product->status == 'active' ? 'status-active' : 'status-inactive' }}">
                        {{ $product->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </td>
                <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    <div class="page-break"></div>
    <div class="section-title">Daftar Semua Produk ({{ count($products) }} produk)</div>
    <table class="products-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 8%;">Gambar</th>
                <th style="width: 20%;">Nama</th>
                <th style="width: 10%;">SKU/Code</th>
                <th style="width: 10%;">Kategori</th>
                <th style="width: 10%;">Merek</th>
                <th style="width: 12%;">Harga</th>
                <th style="width: 8%;">Status</th>
                <th style="width: 8%;">Unggulan</th>
                <th style="width: 9%;">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img src="{{ asset('img/products/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="product-img">
                </td>
                <td>
                    <strong>{{ $product->name }}</strong>
                    @if($product->short_description)
                        <br><small style="color: #666;">{{ Str::limit($product->short_description, 30) }}</small>
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
                <td>
                    @php
                        $categoryTranslations = [
                            'PC Component' => 'Komponen PC',
                            'Peripheral' => 'Periferal',
                            'Security' => 'Keamanan & Jaringan'
                        ];
                    @endphp
                    {{ $categoryTranslations[$product->category] ?? $product->category }}
                </td>
                <td>{{ $product->brand }}</td>
                <td>
                    @if($product->discounted_price)
                        <div class="price-original">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        <div class="price-discount">Rp {{ number_format($product->discounted_price, 0, ',', '.') }}</div>
                    @else
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    @endif
                </td>
                <td>
                    <span class="status-badge {{ $product->status == 'active' ? 'status-active' : 'status-inactive' }}">
                        {{ $product->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </td>
                <td>
                    <span class="status-badge {{ $product->featured ? 'featured-yes' : 'featured-no' }}">
                        {{ $product->featured ? 'Unggulan' : 'Tidak' }}
                    </span>
                </td>
                <td>{{ $product->created_at->format('d/m/Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="10" style="text-align: center; padding: 20px; color: #666;">
                    Tidak ada data produk ditemukan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <div>
            <strong>Laporan Produk - {{ now()->format('d F Y, H:i:s') }} WIB</strong>
        </div>
        <div style="margin-top: 5px;">
            Total {{ count($products) }} produk ditampilkan
            @if(collect($filters)->filter()->isNotEmpty())
                | Filter diterapkan
            @endif
        </div>
        <div style="margin-top: 10px; font-size: 10px;">
            Dicetak oleh: BEST COMPUTER PJD
        </div>
    </div>

</body>
</html>