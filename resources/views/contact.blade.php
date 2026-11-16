<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Best Computer Bogor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/contact.css'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <x-navbar></x-navbar>

    @php
        $heroSec = isset($page) ? $page->getSection('hero') : null;
        $heroContent = $heroSec?->content ?? [];
        $infoSec = isset($page) ? $page->getSection('info') : null;
        $infoContent = $infoSec?->content ?? [];
    @endphp
    
    @if(!$heroSec || $heroSec->is_visible)
    <!-- Hero Header -->
    <header class="relative pt-28 pb-16 md:pt-36 md:pb-24 bg-gray-900 text-white overflow-hidden" style="background-image: url('{{ asset('img/bgcontact.jpg') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/65 to-black/85 z-0"></div>
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-green-500/20 border border-green-400/40 text-green-300 text-xs sm:text-sm font-medium mb-4 backdrop-blur-sm">
                <svg class="w-4 h-4 text-green-600 inline me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg> 
                {{ $heroContent['badge'] ?? 'Kami Siap Membantu Kebutuhan Komputer Anda' }}
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight mb-3">
                {{ $heroContent['title'] ?? 'Hubungi Best Computer' }}
            </h1>
            <p class="text-gray-300 text-sm sm:text-base max-w-2xl mx-auto mb-6">
                {{ $heroContent['subtitle'] ?? 'Punya pertanyaan tentang produk, jasa servis, rakit PC, atau jadwal kunjungan teknisi? Hubungi kami langsung melalui WhatsApp atau datang ke toko kami.' }}
            </p>
            <nav class="flex justify-center items-center gap-2 text-xs sm:text-sm text-gray-400">
                <a href="{{ url('/') }}" class="hover:text-green-400 transition">Beranda</a>
                <span>/</span>
                <span class="text-white font-medium">Kontak</span>
            </nav>
        </div>
    </header>
    @endif

    <main class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start mb-16">
                <!-- Kolom Kiri: Kartu Kontak & Info Toko (5 cols) -->
                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3 py-1 rounded-full">Informasi Lengkap</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-2 mb-3">Saluran Komunikasi Kami</h2>
                        <p class="text-gray-600 text-sm">
                            Silakan hubungi kami melalui saluran berikut. Tim kami akan merespons secepat mungkin pada jam operasional.
                        </p>
                    </div>

                    <!-- WhatsApp / Telepon -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 transition duration-300 hover:shadow-md hover:border-green-300 flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-xs uppercase tracking-wider font-bold text-gray-500">Telepon & WhatsApp</div>
                            <div class="text-base font-bold text-gray-900 mt-0.5">{{ $infoContent['phone'] ?? '+62 856-9380-1996' }}</div>
                            <p class="text-xs text-gray-500 mt-1">Konsultasi cepat, cek stok barang, atau konfirmasi servis.</p>
                            <a href="https://wa.me/{{ $infoContent['whatsapp'] ?? '6285693801996' }}" target="_blank" class="inline-flex items-center gap-1.5 mt-2.5 text-xs font-bold text-green-600 hover:text-green-700">
                                <span>Chat via WhatsApp Sekarang</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Alamat Toko Fisik -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 transition duration-300 hover:shadow-md hover:border-green-300 flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-xs uppercase tracking-wider font-bold text-gray-500">Alamat Toko Kami</div>
                            <div class="text-sm font-bold text-gray-900 mt-0.5">{{ $infoContent['store_name'] ?? 'Plaza Jambu Dua Kota Bogor' }}</div>
                            <p class="text-xs text-gray-600 mt-1 leading-relaxed">
                                {{ $infoContent['address'] ?? 'Lantai Semi Dasar, Jl. A. Yani No.10, RT.01/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153' }}
                            </p>
                            <a href="{{ $infoContent['maps_link'] ?? 'https://maps.app.goo.gl/gSRHZz7t5LJeXPHQ9' }}" target="_blank" class="inline-flex items-center gap-1.5 mt-2.5 text-xs font-bold text-blue-600 hover:text-blue-700">
                                <span>Buka Petunjuk Arah Google Maps</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Email & Jam Buka -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 transition duration-300 hover:shadow-md hover:border-green-300 flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-xs uppercase tracking-wider font-bold text-gray-500">Jam Operasional & Email</div>
                            <div class="text-sm font-bold text-gray-900 mt-0.5">{{ $infoContent['store_hours'] ?? 'Buka Setiap Hari: 10.00 – 21.00 WIB' }}</div>
                            <p class="text-xs text-gray-600 mt-1">Email: <a href="mailto:{{ $infoContent['email'] ?? 'bestcomputerpjd@gmail.com' }}" class="text-purple-600 font-semibold underline">{{ $infoContent['email'] ?? 'bestcomputerpjd@gmail.com' }}</a></p>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Form Kirim Pesan Cepat via WA (7 cols) -->
                <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-10 shadow-lg border border-gray-200">
                    <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3 py-1 rounded-full">Formulir Kontak Cepat</span>
                    <h3 class="text-2xl font-extrabold text-gray-900 mt-2 mb-2">Kirim Pesan ke Tim Kami</h3>
                    <p class="text-gray-600 text-sm mb-6">
                        Isi form singkat di bawah ini dan kami akan mengarahkan pesan Anda langsung ke WhatsApp resmi Best Computer secara otomatis.
                    </p>

                    <form onsubmit="handleContactSubmit(event)" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="contact_name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                                <input type="text" id="contact_name" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 text-sm">
                            </div>
                            <div>
                                <label for="contact_phone" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                                <input type="tel" id="contact_phone" placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="contact_subject" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Kebutuhan / Layanan</label>
                            <select id="contact_subject" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 text-sm bg-white">
                                <option value="Servis Laptop / Komputer">Servis Laptop / Komputer Rusak</option>
                                <option value="Beli Laptop / PC Baru">Informasi Beli Laptop Baru / Second</option>
                                <option value="Rakit PC Custom">Konsultasi Rakit PC Custom</option>
                                <option value="Beli Sparepart / Peripheral">Beli Sparepart / Aksesoris Komputer</option>
                                <option value="Maintenance Kantor / Sekolah">Kerjasama Maintenance Kantor / Sekolah</option>
                                <option value="Lainnya">Pertanyaan Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="contact_message" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Detail Pertanyaan / Kendala</label>
                            <textarea id="contact_message" rows="4" required placeholder="Jelaskan jenis laptop, kendala yang dialami, atau spesifikasi yang Anda cari..." class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 text-sm"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 px-6 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition shadow-lg shadow-green-600/30 text-sm flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                            <span>Kirim ke WhatsApp Best Computer</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Interactive Map Section -->
            <section class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-gray-200">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Peta Lokasi Toko di Plaza Jambu Dua</h3>
                        <p class="text-sm text-gray-600">Patokan: Lantai Semi Dasar, area pertokoan komputer.</p>
                    </div>
                    <a href="https://maps.app.goo.gl/gSRHZz7t5LJeXPHQ9" target="_blank" class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold text-xs rounded-xl shadow transition inline-flex items-center gap-2">
                        <span>Buka Rute Navigasi</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
                <div class="h-80 sm:h-96 w-full rounded-2xl overflow-hidden border border-gray-200">
                    <iframe
                        class="w-full h-full border-0"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen=""
                        src="https://maps.google.com/maps?q=-6.56923,106.80796&z=18&output=embed"
                        title="Lokasi Best Computer di Plaza Jambu Dua, Bogor">
                    </iframe>
                </div>
            </section>
        </div>
    </main>
    
    <script>
    function handleContactSubmit(event) {
        event.preventDefault();
        const name = document.getElementById('contact_name').value;
        const phone = document.getElementById('contact_phone').value;
        const subject = document.getElementById('contact_subject').value;
        const message = document.getElementById('contact_message').value;

        const text = `Halo Best Computer,%0A%0ASaya ingin konsultasi:%0A- Nama: ${encodeURIComponent(name)}%0A- Kontak: ${encodeURIComponent(phone)}%0A- Topik: ${encodeURIComponent(subject)}%0A- Pesan: ${encodeURIComponent(message)}`;
        
        window.open(`https://wa.me/6285693801996?text=${text}`, '_blank');
    }
    </script>

    <x-floatingbutton></x-floatingbutton>
    <x-footer></x-footer>
</body>
</html>
