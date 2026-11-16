<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Status Servis: {{ $serviceOrder->service_code }} - Best Computer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-between">
    <x-navbar></x-navbar>

    <main class="flex-grow pt-28 pb-16 md:pt-36 md:pb-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex items-center justify-center gap-2 text-xs sm:text-sm text-gray-500 mb-6">
                <a href="{{ url('/') }}" class="hover:text-green-600 transition">Beranda</a>
                <span>/</span>
                <a href="{{ url('/servicestatus') }}" class="hover:text-green-600 transition">Cek Status</a>
                <span>/</span>
                <span class="text-gray-900 font-semibold">{{ $serviceOrder->service_code }}</span>
            </nav>

            <!-- Card Utama Hasil Servis -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden mb-8">
                <!-- Header Status Badge -->
                <div class="p-6 sm:p-8 border-b border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-gradient-to-r from-gray-50 to-white">
                    <div>
                        <div class="text-xs uppercase tracking-wider font-bold text-gray-500">Nomor Registrasi Servis</div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 font-mono tracking-tight mt-0.5">
                            {{ $serviceOrder->service_code }}
                        </h1>
                        <p class="text-xs text-gray-500 mt-1">Diterima: {{ $serviceOrder->created_at->format('d M Y, H:i') }} WIB</p>
                    </div>

                    <!-- Status Pill -->
                    <div>
                        @if($serviceOrder->status == 'completed')
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-800 font-extrabold text-sm border border-emerald-300 shadow-sm">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-600 animate-pulse"></span>
                                Selesai • Siap Diambil
                            </span>
                        @elseif($serviceOrder->status == 'process')
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-100 text-blue-800 font-extrabold text-sm border border-blue-300 shadow-sm">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-600 animate-pulse"></span>
                                Sedang Dalam Pengerjaan
                            </span>
                        @elseif($serviceOrder->status == 'cancelled')
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-800 font-extrabold text-sm border border-red-300 shadow-sm">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                Dibatalkan
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-100 text-amber-800 font-extrabold text-sm border border-amber-300 shadow-sm">
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-600 animate-ping"></span>
                                Menunggu Antrean / Diagnosa
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Info Grid: Data Perangkat & Pemilik -->
                <div class="p-6 sm:p-8">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">Informasi Perangkat</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100">
                            <div class="text-xs text-gray-500 font-medium">Nama Pelanggan</div>
                            <div class="text-base font-bold text-gray-900 mt-0.5">{{ $serviceOrder->customer_name }}</div>
                        </div>

                        <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100">
                            <div class="text-xs text-gray-500 font-medium">Nama / Merk Perangkat</div>
                            <div class="text-base font-bold text-gray-900 mt-0.5">{{ $serviceOrder->laptop_name }}</div>
                        </div>

                        <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100">
                            <div class="text-xs text-gray-500 font-medium">Model / Tipe Laptop</div>
                            <div class="text-base font-bold text-gray-900 mt-0.5">{{ $serviceOrder->laptop_type }}</div>
                        </div>

                        <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100">
                            <div class="text-xs text-gray-500 font-medium">Estimasi Biaya</div>
                            <div class="text-base font-bold text-green-600 mt-0.5">
                                @if($serviceOrder->price)
                                    Rp {{ number_format($serviceOrder->price, 0, ',', '.') }}
                                @else
                                    <span class="text-gray-500 font-normal italic">Menunggu konfirmasi teknisi</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Problem Description & Note -->
                    <div class="space-y-4">
                        <div class="p-5 rounded-2xl bg-amber-50/50 border border-amber-200">
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-amber-800 mb-1.5">
                                <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                <span>Keluhan / Masalah Saat Diterima</span>
                            </div>
                            <p class="text-sm text-gray-800 leading-relaxed">{{ $serviceOrder->problem_description }}</p>
                        </div>

                        <div class="p-5 rounded-2xl bg-blue-50/50 border border-blue-200">
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-blue-800 mb-1.5">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <span>Catatan Tindakan Teknisi</span>
                            </div>
                            <p class="text-sm text-gray-800 leading-relaxed">{{ $serviceOrder->service_note ?? 'Unit sedang dalam antrean atau pemeriksaan tim teknisi.' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Visual Timeline Section -->
                <div class="p-6 sm:p-8 bg-gray-50 border-t border-gray-100">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-6">Timeline Progres Servis</h3>
                    
                    <div class="relative pl-6 sm:pl-8 border-l-2 border-gray-200 space-y-8 ml-2">
                        <!-- Step 1: Diterima -->
                        <div class="relative">
                            <span class="absolute -left-[31px] sm:-left-[39px] top-0.5 w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-bold ring-4 ring-white"><svg class="w-4 h-4 text-white inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg></span>
                            <div class="font-bold text-sm text-gray-900">1. Unit Diterima Toko</div>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $serviceOrder->created_at->format('d M Y, H:i') }} WIB • Terdaftar pada sistem</p>
                        </div>

                        <!-- Step 2: Diagnosa -->
                        <div class="relative">
                            <span class="absolute -left-[31px] sm:-left-[39px] top-0.5 w-6 h-6 rounded-full {{ $serviceOrder->status != 'pending' ? 'bg-emerald-600 text-white' : 'bg-amber-500 text-white animate-pulse' }} flex items-center justify-center text-xs font-bold ring-4 ring-white">
                                {!! $serviceOrder->status != 'pending' ? '<svg class="w-4 h-4 text-white inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>' : '2' !!}
                            </span>
                            <div class="font-bold text-sm text-gray-900">2. Pengecekan & Diagnosa Kerusakan</div>
                            <p class="text-xs text-gray-500 mt-0.5">
                                @if($serviceOrder->status == 'pending')
                                    Sedang dianalisis oleh teknisi
                                @else
                                    Selesai diperiksa • Solusi & estimasi biaya telah ditetapkan
                                @endif
                            </p>
                        </div>

                        <!-- Step 3: Pengerjaan -->
                        <div class="relative">
                            <span class="absolute -left-[31px] sm:-left-[39px] top-0.5 w-6 h-6 rounded-full {{ $serviceOrder->status == 'completed' ? 'bg-emerald-600 text-white' : ($serviceOrder->status == 'process' ? 'bg-blue-600 text-white animate-pulse' : 'bg-gray-300 text-gray-600') }} flex items-center justify-center text-xs font-bold ring-4 ring-white">
                                {!! $serviceOrder->status == 'completed' ? '<svg class="w-4 h-4 text-white inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>' : '3' !!}
                            </span>
                            <div class="font-bold text-sm text-gray-900">3. Proses Perbaikan & Penggantian Part</div>
                            <p class="text-xs text-gray-500 mt-0.5">
                                @if($serviceOrder->status == 'completed')
                                    Perbaikan selesai dengan pengujian QC
                                @elseif($serviceOrder->status == 'process')
                                    Sedang dikerjakan oleh teknisi kami
                                @else
                                    Menunggu giliran pengerjaan
                                @endif
                            </p>
                        </div>

                        <!-- Step 4: Selesai -->
                        <div class="relative">
                            <span class="absolute -left-[31px] sm:-left-[39px] top-0.5 w-6 h-6 rounded-full {{ $serviceOrder->status == 'completed' ? 'bg-emerald-600 text-white' : 'bg-gray-300 text-gray-600' }} flex items-center justify-center text-xs font-bold ring-4 ring-white">
                                {!! $serviceOrder->status == 'completed' ? '<svg class="w-4 h-4 text-white inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>' : '4' !!}
                            </span>
                            <div class="font-bold text-sm text-gray-900">4. Siap Diambil di Plaza Jambu Dua</div>
                            <p class="text-xs text-gray-500 mt-0.5">
                                @if($serviceOrder->status == 'completed')
                                    <span class="text-emerald-700 font-semibold">Unit sudah bisa diambil di toko kami dengan menunjukkan nota fisik.</span>
                                @else
                                    Menunggu perbaikan rampung
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi & Navigasi -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ url('/servicestatus') }}" class="w-full sm:w-auto px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold rounded-xl transition text-xs sm:text-sm text-center border border-gray-200">
                    ← Cek Kode Servis Lain
                </a>
                <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20tanya%20progres%20servis%20dengan%20kode%20{{ $serviceOrder->service_code }}." target="_blank" class="w-full sm:w-auto px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl shadow transition text-xs sm:text-sm text-center flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    <span>Hubungi Teknisi via WhatsApp</span>
                </a>
                <a href="{{ url('/') }}" class="w-full sm:w-auto px-6 py-3 bg-white hover:bg-gray-100 text-gray-700 font-medium rounded-xl transition text-xs sm:text-sm text-center border border-gray-200">
                    Ke Beranda
                </a>
            </div>
        </div>
    </main>

    <x-floatingbutton></x-floatingbutton>
    <x-footer></x-footer>
</body>
</html>
