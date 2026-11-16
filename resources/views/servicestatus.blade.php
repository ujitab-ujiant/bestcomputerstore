<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Status Perbaikan - Best Computer Bogor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-between">
    <x-navbar></x-navbar>

    <main class="flex-grow pt-28 pb-16 md:pt-36 md:pb-24">
        <div class="max-w-xl mx-auto px-4 sm:px-6">
            <!-- Breadcrumb -->
            <nav class="flex items-center justify-center gap-2 text-xs sm:text-sm text-gray-500 mb-6">
                <a href="{{ url('/') }}" class="hover:text-green-600 transition">Beranda</a>
                <span>/</span>
                <a href="{{ url('/servmaintenance') }}" class="hover:text-green-600 transition">Layanan Servis</a>
                <span>/</span>
                <span class="text-gray-900 font-semibold">Cek Status</span>
            </nav>

            <!-- Card Utama Cek Status -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-emerald-600 to-green-700 text-white p-6 sm:p-8 text-center relative overflow-hidden">
                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center mx-auto mb-4 border border-white/20 shadow">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <span class="inline-block px-3 py-1 bg-white/20 rounded-full text-xs font-semibold mb-2">Tracking Online Real-time</span>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Lacak Status Perbaikan</h1>
                    <p class="text-green-100 text-xs sm:text-sm mt-1 max-w-sm mx-auto">
                        Pantau progres penanganan laptop atau komputer Anda secara langsung dan transparan.
                    </p>
                </div>

                <!-- Form Body -->
                <div class="p-6 sm:p-8">
                    @if(session('error'))
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-start gap-3">
                            <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <strong class="font-bold">Kode Tidak Ditemukan:</strong>
                                <p class="text-xs mt-0.5">{{ session('error') }} Mohon periksa kembali kode servis pada nota fisik Anda.</p>
                            </div>
                        </div>
                    @endif

                    <form action="{{ url('/servicestatus') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="service_code" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Masukkan Kode Servis
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input 
                                    type="text" 
                                    id="service_code" 
                                    name="service_code" 
                                    required 
                                    placeholder="Contoh: SVC-ABC123"
                                    class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-300 focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-100 font-mono text-base font-semibold uppercase tracking-wider text-gray-900 transition">
                            </div>
                            <p class="text-xs text-gray-500 mt-2 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Kode servis tercetak pada nota fisik saat Anda menyerahkan perangkat di toko.
                            </p>
                        </div>

                        <button type="submit" class="w-full py-3.5 px-6 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl shadow-lg shadow-green-600/30 transition duration-300 text-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span>Periksa Status Sekarang</span>
                        </button>
                    </form>

                    <!-- Bantuan Lupa Kode -->
                    <div class="mt-6 pt-6 border-t border-gray-100 text-center">
                        <p class="text-xs text-gray-500">
                            Kehilangan nota atau lupa kode servis?
                            <a href="https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20lupa%20kode%20servis%20saya.%20Boleh%20bantu%20cek?" target="_blank" class="text-green-600 font-bold hover:underline ml-1">
                                Hubungi Admin WhatsApp →
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tombol Navigasi Cepat -->
            <div class="flex items-center justify-center gap-4 mt-8 text-xs sm:text-sm">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-gray-600 hover:text-green-600 font-medium transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Kembali ke Beranda</span>
                </a>
                <span class="text-gray-300">•</span>
                <a href="{{ url('/contact') }}" class="inline-flex items-center gap-1.5 text-gray-600 hover:text-green-600 font-medium transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span>Hubungi Dukungan</span>
                </a>
            </div>
        </div>
    </main>

    <x-floatingbutton></x-floatingbutton>
    <x-footer></x-footer>
</body>
</html>
