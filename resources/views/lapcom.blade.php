<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop & Komputer Terbaik di Bogor - Best Computer</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/lapcom.css'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <x-navbar></x-navbar>

    <!-- Hero Section -->
    <section class="hero-section flex items-center relative pt-28 pb-20 md:pt-36 md:pb-32" style="background-image: url('{{ asset('img/bglapcom.png') }}'); background-size: cover; background-position: center; min-height: 520px;">
        <div class="absolute inset-0 bg-gradient-to-b from-black/75 via-black/55 to-black/80 z-0"></div>
        <div class="hero-content w-full relative z-10">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-500/20 border border-green-400/40 text-green-300 text-xs md:text-sm font-medium mb-4 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                    Pusat Laptop & Komputer Terpercaya di Plaza Jambu Dua Bogor
                </span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4 leading-tight">
                    Temukan Laptop dan Komputer <span class="text-green-400">Impianmu</span>
                </h1>
                <p class="text-base sm:text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Pilihan terlengkap mulai dari laptop harian, ultrabook bisnis, PC editing, hingga monster PC gaming dengan garansi resmi dan harga terbaik!
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#kategori-pilihan" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-7 py-3.5 rounded-xl shadow-lg shadow-green-600/30 transition duration-300">
                        <span>Lihat Pilihan Produk</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </a>
                    <a href="#rakit-pc" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white border border-white/30 backdrop-blur-md font-semibold px-7 py-3.5 rounded-xl transition duration-300">
                        <span>Konsultasi Rakit PC</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Overview & Location Section -->
    <div class="relative z-20 -mt-10 md:-mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8 md:p-10">
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="text-xs uppercase tracking-wider font-bold text-green-600 bg-green-50 px-3 py-1 rounded-full">Best Computer Bogor</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-2">
                    Koleksi <span class="text-green-600">Laptop</span> & <span class="text-green-700">Komputer</span> Berkualitas
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2">
                    Kami menyediakan berbagai pilihan laptop dan komputer dari brand terkemuka (Asus, Lenovo, HP, Acer, Dell, MSI) dengan spesifikasi teruji, garansi resmi, dan jaminan purna jual terpercaya.
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
                            <div class="inline-block px-2.5 py-0.5 rounded bg-white/20 text-xs font-semibold mb-1">Kunjungi Toko Fisik Kami</div>
                            <h3 class="text-xl sm:text-2xl font-bold">Best Computer - Kota Bogor</h3>
                            <p class="text-white/90 text-sm mt-1 max-w-xl">
                                Plaza Jambu Dua Lantai Semi Dasar, Jl. A. Yani No.10, RT.01/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153
                            </p>
                            <p class="text-xs text-white/80 mt-2 flex items-center justify-center sm:justify-start gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-300 animate-pulse"></span>
                                Buka Setiap Hari: 10.00 – 21.00 WIB
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                        <a href="https://maps.app.goo.gl/gSRHZz7t5LJeXPHQ9" target="_blank" class="w-full sm:w-auto px-5 py-3 bg-white text-green-700 font-bold rounded-xl shadow hover:bg-gray-100 transition text-center text-sm inline-flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            <span>Buka di Google Maps</span>
                        </a>
                        <a href="https://wa.me/6285693801996" target="_blank" class="w-full sm:w-auto px-5 py-3 bg-green-800/60 hover:bg-green-800 text-white font-semibold rounded-xl border border-white/20 transition text-center text-sm inline-flex items-center justify-center gap-2">
                            <span>Hubungi: +62 856-9380-1996</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 3 Keunggulan Kami -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 transition duration-300 hover:shadow-md hover:border-green-200">
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Garansi Resmi Terjamin</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Semua unit baru dilengkapi kartu garansi resmi distributor. Unit second kami sertakan garansi toko demi keamanan pembelian Anda.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 transition duration-300 hover:shadow-md hover:border-green-200">
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Quality Control Ketat</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Setiap laptop dan PC melalui uji fungsi suhu, baterai, layar, dan performa stress-test sebelum diserahterimakan kepada pelanggan.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 transition duration-300 hover:shadow-md hover:border-green-200">
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Harga Transparan & Bersaing</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Dapatkan spesifikasi terbaik sesuai budget tanpa biaya terselubung. Siap melayani konsultasi spesifikasi gratis setiap saat.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Categories Section (Solusi Screenshot User) -->
    <section id="kategori-pilihan" class="py-16 bg-white border-y border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3.5 py-1.5 rounded-full">Pilihan Kategori Terpopuler</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">
                    Laptop & PC Sesuai <span class="text-green-600">Kebutuhan Anda</span>
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2">
                    Kami membagi rekomendasi perangkat berdasarkan kebutuhan utama agar Anda mendapatkan spesifikasi yang paling tepat, efisien, dan bertenaga.
                </p>
            </div>

            <div class="space-y-10">
                <!-- Card 1: Editing & Desain Grafis -->
                <div class="bg-gray-50 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 overflow-hidden">
                    <div class="flex flex-col lg:flex-row items-stretch">
                        <div class="w-full lg:w-5/12 relative min-h-[260px] lg:min-h-full">
                            <img src="{{ asset('img/editingsetup.jpg') }}" alt="Editing Setup" class="w-full h-full object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-blue-600 text-white text-xs font-bold shadow">
                                    Creative & 3D Workstation
                                </span>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 lg:p-10 w-full lg:w-7/12 flex flex-col justify-between">
                            <div>
                                <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-3">
                                    Editing, Desain Grafis, dan 3D Rendering
                                </h3>
                                <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-5">
                                    Butuh laptop atau PC untuk <span class="text-blue-600 font-semibold">desain grafis</span>, <span class="text-blue-600 font-semibold">editing video 4K</span>, animasi 3D, atau rendering arsitektur? Kami menyiapkan perangkat dengan kombinasi kartu grafis bertenaga, prosesor multi-core tinggi, serta layar berakurasi warna tinggi (100% sRGB).
                                </p>

                                <!-- Box Spesifikasi Rekomendasi -->
                                <div class="bg-white rounded-xl p-4 sm:p-5 border border-gray-200 mb-6 space-y-3">
                                    <h4 class="text-xs uppercase tracking-wider font-bold text-gray-500">Rekomendasi Spesifikasi Ideal:</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs sm:text-sm text-gray-700">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                            <span><strong>CPU:</strong> Intel Core i7 / AMD Ryzen 7</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                            <span><strong>GPU:</strong> RTX 3050 / 4060 6GB–8GB</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                            <span><strong>RAM:</strong> 16GB – 32GB Dual Channel</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                            <span><strong>Layar:</strong> IPS / OLED 100% sRGB</span>
                                        </div>
                                    </div>
                                    <div class="pt-2 border-t border-gray-100 flex flex-wrap items-center gap-1.5 text-xs">
                                        <span class="font-semibold text-gray-600 mr-1">Cocok untuk:</span>
                                        <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-100">Adobe Premiere</span>
                                        <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-100">After Effects</span>
                                        <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-100">Blender</span>
                                        <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-100">AutoCAD</span>
                                        <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-100">Photoshop</span>
                                    </div>
                                </div>
                            </div>

                            <!-- CTA Buttons -->
                            <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
                                <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20tertarik%20dengan%20laptop%20atau%20PC%20untuk%20Editing%20dan%20Desain%20Grafis." target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold text-sm rounded-xl transition duration-300 shadow">
                                    <span>Konsultasi Laptop Editing (WA)</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                                <a href="{{ url('/pcperipheral') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 bg-white hover:bg-gray-100 text-gray-700 border border-gray-300 font-medium text-sm rounded-xl transition duration-300">
                                    Lihat Part & Monitor Eksternal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Gaming & Live Stream (Alternating Layout) -->
                <div class="bg-gray-50 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 overflow-hidden">
                    <div class="flex flex-col lg:flex-row-reverse items-stretch">
                        <div class="w-full lg:w-5/12 relative min-h-[260px] lg:min-h-full">
                            <img src="{{ asset('img/gamingsetup.jpg') }}" alt="Gaming Setup" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full bg-red-600 text-white text-xs font-bold shadow">
                                    High FPS & Live Stream
                                </span>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 lg:p-10 w-full lg:w-7/12 flex flex-col justify-between">
                            <div>
                                <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-3">
                                    Gaming dan Live Stream
                                </h3>
                                <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-5">
                                    Ingin bermain game kompetitif atau game AAA dengan grafis ultra rata kanan tanpa framedrop? Dapatkan rekomendasi laptop gaming berlayar 144Hz–240Hz atau racikan PC custom dengan pendingin optimal agar live streaming tetap mulus berjam-jam.
                                </p>

                                <!-- Box Spesifikasi Rekomendasi -->
                                <div class="bg-white rounded-xl p-4 sm:p-5 border border-gray-200 mb-6 space-y-3">
                                    <h4 class="text-xs uppercase tracking-wider font-bold text-gray-500">Rekomendasi Spesifikasi Gaming:</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs sm:text-sm text-gray-700">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                            <span><strong>CPU:</strong> Ryzen 5 7600X / Core i5 13th Gen</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                            <span><strong>GPU:</strong> RTX 4060 / RX 7600 8GB GDDR6</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                            <span><strong>Storage:</strong> 1TB NVMe PCIe 4.0 SSD</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                            <span><strong>Layar/Monitor:</strong> 144Hz / 165Hz IPS 1ms</span>
                                        </div>
                                    </div>
                                    <div class="pt-2 border-t border-gray-100 flex flex-wrap items-center gap-1.5 text-xs">
                                        <span class="font-semibold text-gray-600 mr-1">Game Siap Libas:</span>
                                        <span class="px-2 py-0.5 rounded bg-red-50 text-red-700 border border-red-100">Valorant</span>
                                        <span class="px-2 py-0.5 rounded bg-red-50 text-red-700 border border-red-100">Dota 2</span>
                                        <span class="px-2 py-0.5 rounded bg-red-50 text-red-700 border border-red-100">Cyberpunk 2077</span>
                                        <span class="px-2 py-0.5 rounded bg-red-50 text-red-700 border border-red-100">GTA V</span>
                                        <span class="px-2 py-0.5 rounded bg-red-50 text-red-700 border border-red-100">OBS Streaming</span>
                                    </div>
                                </div>
                            </div>

                            <!-- CTA Buttons -->
                            <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
                                <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20tanya%20laptop%20gaming%20atau%20rakit%20PC%20gaming." target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold text-sm rounded-xl transition duration-300 shadow">
                                    <span>Konsultasi Build Gaming (WA)</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                                <a href="#rakit-pc" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 bg-white hover:bg-gray-100 text-gray-700 border border-gray-300 font-medium text-sm rounded-xl transition duration-300">
                                    Pelajari Alur Rakit PC
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Ultrabook & Produktivitas Ringan -->
                <div class="bg-gray-50 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 overflow-hidden">
                    <div class="flex flex-col lg:flex-row items-stretch">
                        <div class="w-full lg:w-5/12 relative min-h-[260px] lg:min-h-full">
                            <img src="{{ asset('img/slimlaptop.jpg') }}" alt="Portable Ultrabook" class="w-full h-full object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-emerald-600 text-white text-xs font-bold shadow">
                                    Ultrabook & Office
                                </span>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 lg:p-10 w-full lg:w-7/12 flex flex-col justify-between">
                            <div>
                                <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-3">
                                    Ringan, Tipis, dan Mudah Dibawa Kemanapun
                                </h3>
                                <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-5">
                                    Solusi sempurna untuk mahasiswa, pekerja kantor, dan profesional yang mengutamakan mobilitas tinggi. Desain slim, bobot di bawah 1.4 kg, baterai awet seharian, serta booting super cepat hitungan detik.
                                </p>

                                <!-- Box Spesifikasi Rekomendasi -->
                                <div class="bg-white rounded-xl p-4 sm:p-5 border border-gray-200 mb-6 space-y-3">
                                    <h4 class="text-xs uppercase tracking-wider font-bold text-gray-500">Keunggulan Utama:</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs sm:text-sm text-gray-700">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span><strong>Bobot:</strong> Ultra-ringan 1.1 – 1.4 kg</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span><strong>Baterai:</strong> Tahan hingga 8–12 Jam</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span><strong>Charging:</strong> USB Type-C Fast Charge 65W</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span><strong>Storage:</strong> SSD NVMe 512GB – 1TB</span>
                                        </div>
                                    </div>
                                    <div class="pt-2 border-t border-gray-100 flex flex-wrap items-center gap-1.5 text-xs">
                                        <span class="font-semibold text-gray-600 mr-1">Ideal untuk:</span>
                                        <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-100">Skripsi & Kuliah</span>
                                        <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-100">Microsoft Office 365</span>
                                        <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-100">Meeting Zoom/GMeet</span>
                                        <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-100">Canva & Administrasi</span>
                                    </div>
                                </div>
                            </div>

                            <!-- CTA Buttons -->
                            <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
                                <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20tanya%20laptop%20tipis%20ringan%20untuk%20kerja%20dan%20kuliah." target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold text-sm rounded-xl transition duration-300 shadow">
                                    <span>Tanya Laptop Ringan (WA)</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                                <a href="{{ url('/contact') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 bg-white hover:bg-gray-100 text-gray-700 border border-gray-300 font-medium text-sm rounded-xl transition duration-300">
                                    Cek Lokasi Toko
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kenapa Memilih Kami & Free Consultation Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                    Kenapa Memilih <span class="text-green-600">Laptop & Komputer</span> dari Kami?
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2">
                    Kami tidak sekadar menjual barang, tapi memberikan pendampingan teknis dan solusi perangkat yang tepat.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 transition hover:shadow-md flex flex-col justify-between">
                    <div>
                        <div class="rounded-xl overflow-hidden mb-6 h-56 sm:h-64">
                            <img src="{{ asset('img/service-center.jpg') }}" alt="Layanan Purna Jual" class="w-full h-full object-cover">
                        </div>
                        <h4 class="font-bold text-xl text-gray-900 mb-2">Layanan Purna Jual & Service Terpercaya</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Membeli di Best Computer memberi Anda akses langsung ke teknisi toko kami. Jika ada kendala pemakaian, instalasi software tambahan, atau klaim garansi, tim kami siap membantu tanpa ribet.
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 text-green-700 font-semibold text-xs flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        Dukungan teknisi langsung di Plaza Jambu Dua
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 transition hover:shadow-md flex flex-col justify-between">
                    <div>
                        <div class="rounded-xl overflow-hidden mb-6 h-56 sm:h-64">
                            <img src="{{ asset('img/product-quality.jpg') }}" alt="Kualitas Produk" class="w-full h-full object-cover">
                        </div>
                        <h4 class="font-bold text-xl text-gray-900 mb-2">Kualitas Produk Terjamin & 100% Original</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Semua laptop baru masih tersegel resmi dan bergaransi. Untuk unit second / ex-display, teknisi kami melakukan 15 titik pengecekan komponen ketat mulai dari kesehatan SSD hingga keyboard.
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 text-green-700 font-semibold text-xs flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        Garansi uang kembali bila produk tidak original
                    </div>
                </div>
            </div>

            <!-- Free Consultation Banner -->
            <div class="bg-gradient-to-r from-green-600 to-emerald-700 text-white rounded-2xl p-8 sm:p-10 shadow-lg text-center max-w-4xl mx-auto">
                <h3 class="text-2xl sm:text-3xl font-extrabold mb-3">Bingung Memilih Laptop atau Spesifikasi PC?</h3>
                <p class="text-green-100 text-sm sm:text-base max-w-2xl mx-auto mb-6">
                    Sebutkan kebutuhan (kantor/editing/gaming) dan budget Anda, teknisi kami akan meracikkan rekomendasi opsi terbaik tanpa dipungut biaya!
                </p>
                <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20konsultasi%20pilihan%20laptop%20atau%20spesifikasi%20komputer." target="_blank" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-green-700 hover:bg-green-50 font-bold rounded-xl shadow transition duration-300">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                    </svg>
                    <span>Konsultasi Gratis via WhatsApp Sekarang</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Custom PC Build Section -->
    <section id="rakit-pc" class="py-16 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3.5 py-1.5 rounded-full">Layanan Custom PC</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">
                    Rakit PC Impian <span class="text-green-600">Sesuai Budget & Kebutuhan</span>
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2">
                    Tidak menemukan komputer rakitan toko yang pas? Kami bantu merakit PC custom mulai dari PC Office hemat daya hingga PC Gaming & Editing bertenaga monster.
                </p>
            </div>

            <!-- 3 Langkah Alur Rakit PC -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-14">
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 relative">
                    <div class="w-10 h-10 rounded-xl bg-green-600 text-white font-extrabold flex items-center justify-center mb-4">
                        1
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Konsultasi & Estimasi Budget</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Diskusikan kebutuhan aplikasi atau game yang ingin dimainkan. Kami berikan daftar rekomendasi komponen (simulasi spek & harga).
                    </p>
                </div>

                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 relative">
                    <div class="w-10 h-10 rounded-xl bg-green-600 text-white font-extrabold flex items-center justify-center mb-4">
                        2
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Perakitan & Cable Management</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Dirakit oleh teknisi berpengalaman dengan manajemen kabel rapi, airflow optimal, dan pemasangan thermal paste berkualitas.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 relative">
                    <div class="w-10 h-10 rounded-xl bg-green-600 text-white font-extrabold flex items-center justify-center mb-4">
                        3
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Stress Test & Siap Pakai</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        PC diuji benchmark kestabilan suhu dan performa. Kami instalkan Windows, driver terbaru, dan aplikasi pendukung gratis!
                    </p>
                </div>
            </div>

            <!-- Build Example Showcase -->
            <div class="bg-gradient-to-br from-gray-900 to-gray-800 text-white rounded-3xl p-6 sm:p-10 shadow-xl overflow-hidden">
                <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
                    <div class="w-full lg:w-1/2 rounded-2xl overflow-hidden shadow-md">
                        <img src="{{ asset('img/custom-pc-build.jpg') }}" alt="Custom PC Build" class="w-full h-80 sm:h-96 object-cover">
                    </div>
                    <div class="w-full lg:w-1/2">
                        <span class="inline-block px-3 py-1 bg-green-500/20 text-green-400 border border-green-400/30 text-xs font-bold rounded-full mb-3">
                            Contoh Spesifikasi Populer
                        </span>
                        <h3 class="text-2xl sm:text-3xl font-bold mb-3">Best Gaming & Editing Build V1</h3>
                        <p class="text-gray-300 text-sm mb-6">
                            Konfigurasi favorit pelanggan kami untuk kebutuhan editing video berat dan game esports resolusi 2K tanpa kendala.
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-sm text-gray-200 mb-6">
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-400 inline flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span><strong>CPU:</strong> AMD Ryzen 7 5800X</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-400 inline flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span><strong>Mobo:</strong> MSI MAG B550 TOMAHAWK</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-400 inline flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span><strong>RAM:</strong> 16GB (2x8GB) DDR4-3600MHz</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-400 inline flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span><strong>VGA:</strong> NVIDIA RTX 3070 8GB</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-400 inline flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span><strong>SSD:</strong> 1TB NVMe M.2 High Speed</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-green-400 inline flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span><strong>PSU:</strong> 750W 80+ Gold Certified</span>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-700 flex flex-col sm:flex-row items-center gap-4">
                            <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20tertarik%20dengan%20contoh%20spesifikasi%20rakit%20PC%20di%20website.%20Boleh%20minta%20info%20harganya?" target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-bold text-sm rounded-xl transition duration-300">
                                <span>Tanya Penawaran / Custom Ulang</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            <span class="text-xs text-gray-400">*Spesifikasi komponen fleksibel disesuaikan dengan budget Anda.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Components Included -->
    <x-kenapakami></x-kenapakami>
    <x-brandlogo></x-brandlogo>
    <x-review></x-review>
    <x-floatingbutton></x-floatingbutton>

    @vite(['resources/js/lapcom.js'])
    <x-footer></x-footer>
</body>
</html>
