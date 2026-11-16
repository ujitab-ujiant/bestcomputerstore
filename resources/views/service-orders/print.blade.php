<!DOCTYPE html>
<html>
<head>
    <title>Laporan Service Order</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .logo {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .report-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .report-meta {
            margin-bottom: 20px;
        }
        .meta-item {
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-style: italic;
        }
        .print-button {
            text-align: center;
            margin: 20px 0;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">Service Laptop Management System</div>
        <div class="report-title">
            @if(Auth::user()->role == 'admin')
            Laporan Service Order - Semua Teknisi
            @else
            Laporan Service Order - Teknisi: {{ Auth::user()->name }}
            @endif
        </div>
    </div>
    
    <div class="report-meta">
        <div class="meta-item"><strong>Periode:</strong> {{ $dateFrom }} sampai {{ $dateTo }}</div>
        <div class="meta-item"><strong>Status:</strong> {{ $status }}</div>
        <div class="meta-item"><strong>Dihasilkan pada:</strong> {{ $generatedAt }}</div>
        <div class="meta-item"><strong>Dihasilkan oleh:</strong> {{ $generatedBy }}</div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Service</th>
                <th>Customer</th>
                <th>Laptop</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Biaya</th>
                @if(Auth::user()->role == 'admin')
                <th>Teknisi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($serviceOrders as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order->service_code }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->laptop_name }} ({{ $order->laptop_type }})</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td>
                    @if($order->status == 'pending')
                    Pending
                    @elseif($order->status == 'process')
                    Process
                    @elseif($order->status == 'completed')
                    Completed
                    @else
                    Cancelled
                    @endif
                </td>
                <td>{{ $order->price ? 'Rp ' . number_format($order->price, 0, ',', '.') : '-' }}</td>
                @if(Auth::user()->role == 'admin')
                <td>{{ $order->technician ? $order->technician->name : 'Belum ditugaskan' }}</td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="{{ Auth::user()->role == 'admin' ? 8 : 7 }}" class="text-center">Tidak ada data service order untuk periode ini</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-bottom: 20px;">
        <table>
            <tr>
                <th colspan="2">Ringkasan Laporan</th>
            </tr>
            <tr>
                <td><strong>Total Service Order</strong></td>
                <td>{{ $serviceOrders->count() }}</td>
            </tr>
            <tr>
                <td><strong>Pending</strong></td>
                <td>{{ $serviceOrders->where('status', 'pending')->count() }}</td>
            </tr>
            <tr>
                <td><strong>Process</strong></td>
                <td>{{ $serviceOrders->where('status', 'process')->count() }}</td>
            </tr>
            <tr>
                <td><strong>Completed</strong></td>
                <td>{{ $serviceOrders->where('status', 'completed')->count() }}</td>
            </tr>
            <tr>
                <td><strong>Cancelled</strong></td>
                <td>{{ $serviceOrders->where('status', 'cancelled')->count() }}</td>
            </tr>
            <tr>
                <td><strong>Total Pendapatan</strong></td>
                <td>Rp {{ number_format($serviceOrders->sum('price'), 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
    
    <div class="footer">
        <p>Laporan ini dihasilkan secara otomatis oleh sistem.</p>
    </div>
    
    <div class="print-button">
        <button onclick="window.print()">Cetak Laporan</button>
        <button onclick="window.close()">Tutup</button>
    </div>
</body>
</html>