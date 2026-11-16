<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Servis Laptop & Maintenance IT Bogor - Best Computer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/servmaintenance.css'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <x-navbar></x-navbar>

    @php
        $heroSec = isset($page) ? $page->getSection('hero') : null;
        $heroContent = $heroSec?->content ?? [];
    @endphp

    @if(!$heroSec || $heroSec->is_visible)
    <!-- Hero Section -->
    <section class="hero-section flex items-center relative pt-28 pb-20 md:pt-36 md:pb-32" style="background-image: url('{{ asset('img/bgservmaintenance.jpg') }}'); background-size: cover; background-position: center; min-height: 520px;">
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-black/85 z-0"></div>
        <div class="hero-content w-full relative z-10">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-500/20 border border-green-400/40 text-green-300 text-xs md:text-sm font-medium mb-4 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                    {{ $heroContent['badge'] ?? 'Solusi Cepat, Tepat, dan Bergaransi di Kota Bogor' }}
                </span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4 leading-tight">
                    {{ $heroContent['title'] ?? 'Bingung Mencari Tempat Servis Laptop Terpercaya?' }}
                </h1>
                <p class="text-base sm:text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ $heroContent['subtitle'] ?? 'Perbaikan motherboard, layar pecah, ganti baterai, install ulang, hingga maintenance IT kantor. Pengecekan transparan dan bisa cek status perbaikan secara online!' }}
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20laptop%20saya%20sedang%20bermasalah.%20Boleh%20konsultasi%20dulu?" target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-7 py-3.5 rounded-xl shadow-lg shadow-green-600/30 transition duration-300">
                        <span>Konsultasi Masalahmu (Gratis)</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="{{ url('/servicestatus') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white border border-white/30 backdrop-blur-md font-semibold px-7 py-3.5 rounded-xl transition duration-300">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        <span>Cek Status Servis Online</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Floating Overview & Location Section -->
    <div class="relative z-20 -mt-10 md:-mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8 md:p-10">
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="text-xs uppercase tracking-wider font-bold text-green-600 bg-green-50 px-3 py-1 rounded-full">Layanan Perbaikan & Pemeliharaan</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-2">
                    Butuh <span class="text-green-600">Perbaikan</span> atau Sekadar <span class="text-green-700">Maintenance</span> Berkala?
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2">
                    Apapun kendala laptop atau komputermu, mulai dari mati total hingga perawatan sistem berkala, teknisi bersertifikasi kami siap mengembalikan performa perangkatmu ke kondisi prima.
                </p>
            </div>

            <!-- Lokasi Card -->
            <div class="bg-gradient-to-r from-emerald-600 to-green-700 text-white rounded-2xl p-6 sm:p-8 mb-12 shadow-md">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left gap-5">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white/15 backdrop-blur-sm rounded-2xl flex items-center justify-center flex-shrink-0 border border-white/20">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="inline-block px-2.5 py-0.5 rounded bg-white/20 text-xs font-semibold mb-1">Pusat Layanan Servis</div>
                            <h3 class="text-xl sm:text-2xl font-bold">Best Computer - Kota Bogor</h3>
                            <p class="text-white/90 text-sm mt-1 max-w-xl">
                                Plaza Jambu Dua Lantai Semi Dasar, Jl. A. Yani No.10, RT.01/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153
                            </p>
                            <p class="text-xs text-white/80 mt-2 flex items-center justify-center sm:justify-start gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-300 animate-pulse"></span>
                                Siap melayani servis langsung di tempat setiap hari (10.00 - 21.00 WIB)
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                        <a href="https://maps.app.goo.gl/gSRHZz7t5LJeXPHQ9" target="_blank" class="w-full sm:w-auto px-5 py-3 bg-white text-green-700 font-bold rounded-xl shadow hover:bg-gray-100 transition text-center text-sm inline-flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            <span>Petunjuk Arah Maps</span>
                        </a>
                        <a href="https://wa.me/6285693801996" target="_blank" class="w-full sm:w-auto px-5 py-3 bg-green-800/60 hover:bg-green-800 text-white font-semibold rounded-xl border border-white/20 transition text-center text-sm inline-flex items-center justify-center gap-2">
                            <span>Hubungi Teknisi</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 3 Keunggulan Servis -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 transition duration-300 hover:shadow-md hover:border-green-200">
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Pengecekan Awal Transparan</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Kami periksa kerusakan terlebih dahulu dan konfirmasi biaya perbaikan kepada Anda. Tidak ada tindakan atau pergantian part tanpa persetujuan Anda.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 transition duration-300 hover:shadow-md hover:border-green-200">
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Tracking Progres Online</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Pelanggan mendapatkan nomor nota servis untuk memantau status perbaikan (Pending, Proses, Selesai) secara langsung melalui situs web kami.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 transition duration-300 hover:shadow-md hover:border-green-200">
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Garansi Servis Pasti</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Setiap pengerjaan hardware dan pergantian komponen kami berikan jaminan garansi servis. Jika kendala terulang dalam masa garansi, kami perbaiki kembali.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- 6 Kategori Layanan Servis -->
    <section id="layanan-servis" class="py-16 bg-white border-y border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3.5 py-1.5 rounded-full">Katalog Layanan Teknis</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">
                    Solusi Perbaikan untuk <span class="text-green-600">Semua Masalah Laptop</span>
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2">
                    Dari perbaikan hardware motherboard hingga optimalisasi sistem operasi, ditangani langsung oleh teknisi berpengalaman dengan peralatan lengkap.
                </p>
            </div>

            <!-- Quick Action Bar -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12">
                <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20konsultasi%20kendala%20laptop%20saya." target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl transition duration-300 shadow">
                    <span>Chat Teknisi di WhatsApp →</span>
                </a>
                <a href="{{ url('/servicestatus') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold px-6 py-3 rounded-xl transition duration-300 border border-gray-200">
                    <span>Cek Status Perbaikan Anda →</span>
                </a>
            </div>

            <!-- 6 Grid Card Layanan -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- 1. Perbaikan Hardware -->
                <div class="service-card bg-gray-50 rounded-2xl p-6 sm:p-7 border border-gray-200 transition-all duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-green-600 text-white flex items-center justify-center shadow">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-green-100 text-green-700"><svg class="w-3.5 h-3.5 inline me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Estimasi 1 - 3 Hari</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Perbaikan Hardware</h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Mengatasi kerusakan komponen fisik seperti motherboard mati total, ganti keyboard rusak, ganti layar LCD bergaris/pecah, ganti engsel patah, hingga konektor charger kendur.
                        </p>
                        <ul class="text-xs text-gray-600 space-y-1 mb-4">
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Ganti Layar LCD & Fleksibel</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Servis Motherboard & IC Power</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Ganti Baterai & Keyboard Original</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20tanya%20servis%20hardware%20laptop." target="_blank" class="mt-2 text-sm font-semibold text-green-600 hover:text-green-700 inline-flex items-center gap-1">
                        Tanya Biaya Hardware →
                    </a>
                </div>

                <!-- 2. Perbaikan Software -->
                <div class="service-card bg-gray-50 rounded-2xl p-6 sm:p-7 border border-gray-200 transition-all duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-green-600 text-white flex items-center justify-center shadow">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-blue-100 text-blue-700"><svg class="w-3.5 h-3.5 inline me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Bisa Ditunggu (1-2 Jam)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Perbaikan Software & OS</h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Penyelesaian masalah sistem operasi lambat, error Blue Screen (BSOD), infeksi virus/malware, aktivasi Windows asli, instalasi driver, hingga paket aplikasi kerja lengkap.
                        </p>
                        <ul class="text-xs text-gray-600 space-y-1 mb-4">
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Instal Ulang Windows 10/11 & Driver</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Pembersihan Virus & Malware Tuntas</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Instalasi Microsoft Office & Utility</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20instal%20ulang%20atau%20perbaikan%20software." target="_blank" class="mt-2 text-sm font-semibold text-green-600 hover:text-green-700 inline-flex items-center gap-1">
                        Konsultasi Software →
                    </a>
                </div>

                <!-- 3. Upgrade Komponen -->
                <div class="service-card bg-gray-50 rounded-2xl p-6 sm:p-7 border border-gray-200 transition-all duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-green-600 text-white flex items-center justify-center shadow">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700"><svg class="w-3.5 h-3.5 inline me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Cepat 30 - 60 Menit</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Upgrade Komponen (SSD & RAM)</h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Laptop lama lemot? Upgrade dari Hardisk biasa ke SSD NVMe super kencang dan tambah kapasitas RAM hingga 16GB/32GB agar multitasking lancar seketika.
                        </p>
                        <ul class="text-xs text-gray-600 space-y-1 mb-4">
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Ganti HDD ke SSD NVMe / SATA M.2</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Tambah RAM DDR4 / DDR5 Original</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Kloning Data Tanpa Hilang File Lama</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20tanya%20upgrade%20SSD%20dan%20RAM." target="_blank" class="mt-2 text-sm font-semibold text-green-600 hover:text-green-700 inline-flex items-center gap-1">
                        Cek Harga Upgrade →
                    </a>
                </div>

                <!-- 4. Perawatan Berkala / Deep Cleaning -->
                <div class="service-card bg-gray-50 rounded-2xl p-6 sm:p-7 border border-gray-200 transition-all duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-green-600 text-white flex items-center justify-center shadow">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-amber-100 text-amber-800"><svg class="w-3.5 h-3.5 inline me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Bisa Ditunggu (45 Menit)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Deep Cleaning & Thermal Paste</h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Laptop cepat panas, kipas berisik, atau sering mati mendadak saat dipakai berat? Kami bersihkan debu internal dan mengganti thermal paste dengan kualitas high-performance.
                        </p>
                        <ul class="text-xs text-gray-600 space-y-1 mb-4">
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Pembersihan Heatsink & Kipas Total</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Repaste Thermal Berkualitas Tinggi</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Suhu Turun 10°C - 20°C Lebih Dingin</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20cleaning%20laptop%20dan%20ganti%20thermal%20paste." target="_blank" class="mt-2 text-sm font-semibold text-green-600 hover:text-green-700 inline-flex items-center gap-1">
                        Jadwalkan Cleaning →
                    </a>
                </div>

                <!-- 5. Backup & Recovery Data -->
                <div class="service-card bg-gray-50 rounded-2xl p-6 sm:p-7 border border-gray-200 transition-all duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-green-600 text-white flex items-center justify-center shadow">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-purple-100 text-purple-700"><svg class="w-3.5 h-3.5 inline me-1 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>Aman & Rahasia</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Backup & Recovery Data</h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Penyelamatan data penting dari hardisk laptop rusak, bad sector, flashdisk error, atau partisi terformat secara tidak sengaja dengan menjaga kerahasiaan data 100%.
                        </p>
                        <ul class="text-xs text-gray-600 space-y-1 mb-4">
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Ekstraksi File dari Laptop Mati Total</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Pemulihan Hardisk Bad Sector</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Solusi Backup Otomatis Cloud/Eksternal</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20butuh%20bantuan%20recovery%20data%20laptop/harddisk." target="_blank" class="mt-2 text-sm font-semibold text-green-600 hover:text-green-700 inline-flex items-center gap-1">
                        Konsultasi Recovery Data →
                    </a>
                </div>

                <!-- 6. Konsultasi & Diagnosa -->
                <div class="service-card bg-gray-50 rounded-2xl p-6 sm:p-7 border border-gray-200 transition-all duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-green-600 text-white flex items-center justify-center shadow">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-green-100 text-green-700"><svg class="w-3.5 h-3.5 inline me-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>100% Gratis</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Konsultasi & Cek Kondisi Unit</h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Bawa laptop atau PC Anda ke toko kami di Plaza Jambu Dua untuk pengecekan awal. Teknisi kami akan menganalisis penyebab kerusakan dan estimasi biaya secara gratis tanpa paksaan servis.
                        </p>
                        <ul class="text-xs text-gray-600 space-y-1 mb-4">
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Diagnosa Awal Kerusakan Cepat</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Estimasi Biaya Jelas di Awal</li>
                            <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Bebas Biaya jika Batal Servis</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20bawa%20laptop%20untuk%20cek%20kondisi%20di%20toko." target="_blank" class="mt-2 text-sm font-semibold text-green-600 hover:text-green-700 inline-flex items-center gap-1">
                        Hubungi via WhatsApp →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Opsi Layanan: Datang ke Toko vs Servis dari Rumah -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3.5 py-1.5 rounded-full">Fleksibilitas Pelayanan</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-2">
                    Dua Cara Mudah Memperbaiki Perangkat Anda
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2">
                    Pilih opsi yang paling nyaman untuk jadwal dan kebutuhan Anda sehari-hari.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Opsi 1: Datang ke Toko -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-200 transition hover:shadow-md flex flex-col justify-between">
                    <div>
                        <div class="rounded-xl overflow-hidden mb-6 h-56 sm:h-64 relative">
                            <img src="{{ asset('img/laptopserv.jpg') }}" alt="Service di Toko Best Computer" class="w-full h-full object-cover">
                            <span class="absolute top-3 left-3 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                Opsi 1: Servis di Toko
                            </span>
                        </div>
                        <h4 class="font-bold text-xl text-gray-900 mb-2">Datang Langsung ke Toko (Plaza Jambu Dua)</h4>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Kunjungi toko kami di Plaza Jambu Dua Bogor. Staff teknisi kami langsung mengecek unit di hadapan Anda, memberikan diagnosa transparan, dan pengerjaan ringan bisa ditunggu langsung.
                        </p>
                        <ul class="text-xs text-gray-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Pengecekan unit langsung di tempat</li>
                            <li class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Peralatan servis lengkap dan sparepart ready stock</li>
                            <li class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Tempat nyaman di dalam mall Plaza Jambu Dua</li>
                        </ul>
                    </div>
                    <a href="https://maps.app.goo.gl/gSRHZz7t5LJeXPHQ9" target="_blank" class="w-full text-center px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold text-sm rounded-xl transition">
                        Lihat Lokasi & Rute di Maps →
                    </a>
                </div>

                <!-- Opsi 2: Servis Panggilan / Di Rumah -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-200 transition hover:shadow-md flex flex-col justify-between">
                    <div>
                        <div class="rounded-xl overflow-hidden mb-6 h-56 sm:h-64 relative">
                            <img src="{{ asset('img/laptopserv2.jpg') }}" alt="Service Panggilan dari Rumah" class="w-full h-full object-cover">
                            <span class="absolute top-3 left-3 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                Opsi 2: Servis di Rumah / Kantor
                            </span>
                        </div>
                        <h4 class="font-bold text-xl text-gray-900 mb-2">Layanan Servis Panggilan (On-Site)</h4>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Sibuk dan tidak sempat keluar? Best Computer menyediakan layanan kunjungan teknisi langsung ke rumah, kantor, atau tempat usaha Anda di wilayah Kota & Kabupaten Bogor.
                        </p>
                        <ul class="text-xs text-gray-600 space-y-2 mb-6">
                            <li class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-blue-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Praktis tanpa repot macet mengantar unit</li>
                            <li class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-blue-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Penjadwalan kunjungan fleksibel sesuai waktu luang</li>
                            <li class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-blue-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Cocok untuk PC kantor, printer, & jaringan WiFi</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20jadwalkan%20servis%20panggilan%20ke%20rumah/kantor." target="_blank" class="w-full text-center px-5 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold text-sm rounded-xl transition shadow">
                        Jadwalkan Kunjungan Teknisi via WhatsApp →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Maintenance Kantor & Sekolah (Perbaikan Struktur Gambar & Konten) -->
    <section id="maintenance-kantor" class="py-16 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3.5 py-1.5 rounded-full">Layanan B2B & Instansi</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">
                    Maintenance Handal untuk <span class="text-green-600">Sekolah, Kantor & Bisnis</span>
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2">
                    Kurangi downtime operasional dan cegah kerusakan mendadak. Kami menyediakan kontrak perawatan berkala perangkat komputer, lab, printer, dan infrastruktur IT instansi Anda.
                </p>
            </div>

            <!-- 3 Pilar Maintenance Card -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- 1. Kantor & Perusahaan -->
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-200 transition hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('img/mainkantor.jpg') }}" alt="Maintenance untuk Kantor" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <span class="text-xs font-bold text-green-600 uppercase tracking-wider block mb-1">Corporate IT</span>
                            <h4 class="font-bold text-xl text-gray-900 mb-2">Kantor & Perusahaan</h4>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                Perawatan rutin seluruh PC karyawan, update patch keamanan, pengecekan koneksi jaringan kabel LAN/WiFi kantor, printer sharing, dan backup file penting perusahaan.
                            </p>
                            <ul class="text-xs text-gray-600 space-y-1.5">
                                <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Teknisi standby responsif</li>
                                <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Bebas macet kerja akibat PC lemot</li>
                                <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-green-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Laporan berkala kondisi aset IT</li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="https://wa.me/6287772938153?text=Halo%20Best%20Computer,%20saya%20mau%20minta%20info%20maintenance%20kantor." target="_blank" class="w-full block text-center py-2.5 bg-white border border-gray-300 hover:border-green-600 hover:text-green-600 font-semibold text-xs rounded-lg transition">
                            Minta Penawaran Kantor →
                        </a>
                    </div>
                </div>

                <!-- 2. Instansi Pendidikan & Lab Komputer -->
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-200 transition hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('img/maininstansi.jpg') }}" alt="Maintenance untuk Instansi Pendidikan" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider block mb-1">Education Labs</span>
                            <h4 class="font-bold text-xl text-gray-900 mb-2">Instansi Pendidikan & Sekolah</h4>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                Solusi menyeluruh untuk laboratorium komputer sekolah, kampus, dan lembaga kursus. Persiapan sistem ujian berbasis komputer (CBT / ANBK), instalasi jaringan, dan deep cleaning massal.
                            </p>
                            <ul class="text-xs text-gray-600 space-y-1.5">
                                <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-blue-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Konfigurasi Lab Ujian CBT / ANBK</li>
                                <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-blue-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Kloning sistem puluhan PC cepat</li>
                                <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-blue-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Harga paket sekolah terjangkau</li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="https://wa.me/6287772938153?text=Halo%20Best%20Computer,%20saya%20mau%20minta%20info%20maintenance%20lab%20sekolah." target="_blank" class="w-full block text-center py-2.5 bg-white border border-gray-300 hover:border-blue-600 hover:text-blue-600 font-semibold text-xs rounded-lg transition">
                            Minta Penawaran Lab Sekolah →
                        </a>
                    </div>
                </div>

                <!-- 3. Bisnis Retail, Cafe & UMKM -->
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-200 transition hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('img/mainbisniscomp.jpg') }}" alt="Maintenance Bisnis & Retail" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider block mb-1">Retail & SME</span>
                            <h4 class="font-bold text-xl text-gray-900 mb-2">Bisnis Retail, Cafe & UMKM</h4>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                Pastikan mesin kasir (POS), printer kasir thermal, barcode scanner, dan komputer toko Anda tidak pernah bermasalah di saat jam ramai pengunjung.
                            </p>
                            <ul class="text-xs text-gray-600 space-y-1.5">
                                <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-emerald-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Penanganan cepat saat kasir macet</li>
                                <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-emerald-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Pengecekan printer & jaringan kasir</li>
                                <li class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-emerald-600 inline flex-shrink-0 me-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Perlindungan lonjakan listrik (UPS)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="https://wa.me/6287772938153?text=Halo%20Best%20Computer,%20saya%20mau%20minta%20info%20maintenance%20PC%20toko/kasir." target="_blank" class="w-full block text-center py-2.5 bg-white border border-gray-300 hover:border-emerald-600 hover:text-emerald-600 font-semibold text-xs rounded-lg transition">
                            Minta Penawaran Retail →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kerjasama Banner -->
            <div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white rounded-2xl p-8 sm:p-10 shadow-lg text-center max-w-4xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="text-center sm:text-left">
                    <h3 class="text-xl sm:text-2xl font-bold">Ingin Mengajukan Kerjasama Maintenance?</h3>
                    <p class="text-gray-300 text-sm mt-1">Kami menyediakan skema kontrak bulanan, semesteran, atau tahunan dengan invoice resmi.</p>
                </div>
                <a href="https://wa.me/6287772938153?text=Halo%20Best%20Computer,%20kami%20ingin%20berdiskusi%20tentang%20kerjasama%20maintenance%20rutin." target="_blank" class="flex-shrink-0 px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-bold text-sm rounded-xl transition shadow">
                    Hubungi Tim B2B Kami →
                </a>
            </div>
        </div>
    </section>

    <!-- Cek Status Servis Banner -->
    <div class="py-14 bg-emerald-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="text-center md:text-left">
                <span class="inline-block px-3 py-1 bg-white/20 text-white text-xs font-semibold rounded-full mb-2">Transparan & Real-time</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold">Perangkat Anda Sedang Diservis di Toko Kami?</h2>
                <p class="text-emerald-100 text-sm sm:text-base mt-1">
                    Cukup masukkan nomor kode servis nota Anda untuk melihat progres penanganan teknisi.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ url('/servicestatus') }}" class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-emerald-700 hover:bg-emerald-50 font-bold rounded-xl shadow-lg transition">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Cek Status Sekarang</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Components Included -->
    <x-kenapakami></x-kenapakami>
    <x-brandlogo></x-brandlogo>
    <x-review></x-review>
    <x-floatingbutton></x-floatingbutton>

    @vite(['resources/js/servmaintenance.js'])
    <x-footer></x-footer>
</body>
</html>
