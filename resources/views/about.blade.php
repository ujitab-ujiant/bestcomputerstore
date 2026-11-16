<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Best Computer Bogor</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/about.css'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <x-navbar></x-navbar>

    @php
        $heroSec = isset($page) ? $page->getSection('hero') : null;
        $heroContent = $heroSec?->content ?? [];
        $storySec = isset($page) ? $page->getSection('story') : null;
        $storyContent = $storySec?->content ?? [];
        $valuesSec = isset($page) ? $page->getSection('values') : null;
        $valuesItems = $valuesSec?->content['items'] ?? null;
    @endphp

    @if(!$heroSec || $heroSec->is_visible)
    <!-- Header Hero Section -->
    <header class="relative pt-28 pb-16 md:pt-36 md:pb-24 bg-gray-900 text-white overflow-hidden" style="background-image: url('{{ asset('img/bgabout.jpg') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/65 to-black/85 z-0"></div>
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-green-500/20 border border-green-400/40 text-green-300 text-xs sm:text-sm font-medium mb-4 backdrop-blur-sm">
                <svg class="w-4 h-4 text-green-600 inline me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg> 
                {{ $heroContent['badge'] ?? 'Mengenal Lebih Dekat Best Computer' }}
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight mb-3">
                {{ $heroContent['title'] ?? 'Tentang Best Computer' }}
            </h1>
            <p class="text-gray-300 text-sm sm:text-base max-w-2xl mx-auto mb-6">
                {{ $heroContent['subtitle'] ?? 'Pusat penjualan perangkat IT, rakit PC custom, dan layanan servis profesional terpercaya di Kota Bogor sejak 2012.' }}
            </p>
            <nav class="flex justify-center items-center gap-2 text-xs sm:text-sm text-gray-400">
                <a href="{{ url('/') }}" class="hover:text-green-400 transition">Beranda</a>
                <span>/</span>
                <span class="text-white font-medium">Tentang Kami</span>
            </nav>
        </div>
    </header>
    @endif

    <main>
        <!-- Cerita & Profil Singkat -->
        <section class="py-16 bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3.5 py-1.5 rounded-full">Perjalanan Kami</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3 mb-6">
                            Menyediakan Solusi IT Terbaik dengan <span class="text-green-600">Integritas & Keahlian</span>
                        </h2>
                        <div class="space-y-4 text-gray-600 text-sm sm:text-base leading-relaxed">
                            @if(isset($storyContent['paragraph1']))
                                <p>{{ $storyContent['paragraph1'] }}</p>
                            @else
                                <p>
                                    <strong>Best Computer</strong> didirikan pada tahun 2012 dengan komitmen menghadirkan layanan komputer yang transparan, berkualitas, dan mudah diakses bagi masyarakat Kota Bogor dan sekitarnya.
                                </p>
                            @endif
                            @if(isset($storyContent['paragraph2']))
                                <p>{{ $storyContent['paragraph2'] }}</p>
                            @else
                                <p>
                                    Berlokasi strategis di <strong>Plaza Jambu Dua Lantai Semi Dasar</strong>, kami melayani ribuan pelanggan mulai dari pelajar, mahasiswa, profesional kreatif, hingga perkantoran dan sekolah yang membutuhkan pengadaan perangkat maupun pemeliharaan sistem komputer.
                                </p>
                            @endif
                        </div>

                        <!-- Stats Box -->
                        <div class="grid grid-cols-3 gap-4 mt-8 pt-6 border-t border-gray-100">
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-green-600">2012</div>
                                <div class="text-xs text-gray-500 font-medium">Tahun Berdiri</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-green-600">5.000+</div>
                                <div class="text-xs text-gray-500 font-medium">Unit Tertangani</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-green-600">100%</div>
                                <div class="text-xs text-gray-500 font-medium">Original Part</div>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-200">
                            <img src="{{ asset('img/tentangkami.jpg') }}" alt="Tentang Best Computer Toko" class="w-full h-80 sm:h-[450px] object-cover">
                        </div>
                        <div class="absolute -bottom-6 -left-6 bg-white p-4 sm:p-5 rounded-2xl shadow-xl border border-gray-100 hidden sm:flex items-center gap-4 max-w-xs">
                            <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-gray-900">Plaza Jambu Dua Bogor</div>
                                <div class="text-xs text-gray-500">Lantai Semi Dasar • Siap melayani setiap hari</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4 Pilar Keunggulan -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-100/60 px-3.5 py-1.5 rounded-full">Keunggulan Layanan</span>
                    <h2 class="text-3xl font-extrabold text-gray-900 mt-3">Mengapa Memilih Best Computer?</h2>
                    <p class="text-gray-600 text-sm sm:text-base mt-2">
                        Kami menjunjung tinggi integritas teknis, kecepatan kerja, dan kepuasan pelanggan dalam setiap perbaikan maupun transaksi.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-sm border border-gray-200 transition duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Servis Profesional</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Dikerjakan langsung oleh teknisi berpengalaman dengan peralatan diagnostik modern dan pengecekan menyeluruh.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-sm border border-gray-200 transition duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Produk 100% Original</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Semua laptop, komponen PC, dan suku cadang pengganti berasal dari distributor resmi dan dilengkapi kartu garansi.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-sm border border-gray-200 transition duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Kontrak Maintenance</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Melayani kerjasama pemeliharaan berkala untuk laboratorium sekolah, komputer kantor, dan infrastruktur IT bisnis.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-sm border border-gray-200 transition duration-300 hover:shadow-lg hover:border-green-300 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Pelayanan Cepat & Ramah</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Konsultasi santai via WhatsApp atau langsung di toko, dengan sistem nomor resi cek status servis secara online.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi & Nilai Pelayanan Section -->
        <section class="py-16 bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Visi Card -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 sm:p-10 border border-green-200 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-green-600 text-white flex items-center justify-center mb-6 shadow">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <span class="text-xs uppercase tracking-widest font-bold text-green-700 block mb-1">Arah & Tujuan</span>
                            <h3 class="text-2xl font-extrabold text-gray-900 mb-4">Visi Kami</h3>
                            <p class="text-gray-700 text-base leading-relaxed mb-4">
                                &ldquo;Menjadi penyedia solusi teknologi komputer terkemuka dan paling terpercaya di Bogor yang memberikan nilai tambah nyata bagi produktivitas, pendidikan, dan bisnis masyarakat.&rdquo;
                            </p>
                        </div>
                        <div class="pt-4 border-t border-green-200 text-sm font-semibold text-green-800">
                            <svg class="w-4 h-4 text-green-400 inline me-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg> Terpercaya • Diperhitungkan • Berkualitas Tinggi
                        </div>
                    </div>

                    <!-- Nilai Pelayanan Card -->
                    <div class="bg-gray-50 rounded-3xl p-8 sm:p-10 border border-gray-200 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-gray-900 text-white flex items-center justify-center mb-6 shadow">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <span class="text-xs uppercase tracking-widest font-bold text-gray-500 block mb-1">Prinsip Kerja</span>
                            <h3 class="text-2xl font-extrabold text-gray-900 mb-4">Nilai Pelayanan</h3>
                            <div class="space-y-3 text-sm text-gray-700">
                                <div class="flex items-center gap-3">
                                    <span class="w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    <span><strong>Transparansi Penuh:</strong> Konfirmasi biaya di awal tanpa biaya siluman.</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    <span><strong>Keamanan Data:</strong> Menjaga kerahasiaan file pribadi pelanggan 100%.</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    <span><strong>Garansi Nyata:</strong> Garansi purna jual yang mudah diklaim tanpa berbelit.</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    <span><strong>Pelayanan Ramah:</strong> Selalu siap memberikan solusi terbaik sesuai budget.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tim Kami Section -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-100/60 px-3.5 py-1.5 rounded-full">Keluarga Besar</span>
                        <h2 class="text-3xl font-extrabold text-gray-900 mt-3 mb-6">
                            Didukung Tim Teknisi & Staf yang Berdedikasi
                        </h2>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-4">
                            Kekuatan utama Best Computer terletak pada orang-orang di baliknya. Dari teknisi spesialis motherboard, perakit PC enthusiast, hingga tim customer support yang selalu mendengarkan keluhan pelanggan.
                        </p>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-6">
                            Kami selalu mengikuti perkembangan hardware dan software terbaru agar solusi yang kami berikan selalu relevan, efisien, dan tepat sasaran.
                        </p>
                        <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-bold text-sm rounded-xl shadow transition">
                            <span>Hubungi Tim Kami Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-2xl overflow-hidden shadow-md h-48 bg-gray-200">
                            <img src="{{ asset('img/about_img1.jpg') }}" alt="Aktivitas Servis 1" class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-2xl overflow-hidden shadow-md h-48 bg-gray-200">
                            <img src="{{ asset('img/about_img2.jpg') }}" alt="Aktivitas Servis 2" class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-2xl overflow-hidden shadow-md h-48 col-span-2 bg-gray-200">
                            <img src="{{ asset('img/about_img3.jpg') }}" alt="Foto Tim Bersama" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-kenapakami></x-kenapakami>
        <x-brandlogo></x-brandlogo>
        <x-review></x-review>
    </main>
    
    <x-floatingbutton></x-floatingbutton>
    <x-footer></x-footer>
</body>
</html>
