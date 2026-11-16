<footer class="bg-gray-900 text-gray-300 mt-0 border-t border-gray-800">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="space-y-4">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2">
                    <img class="h-10 w-auto" src="{{ asset('img/logo.png') }}" alt="Best Computer Logo">
                    <span class="text-xl font-extrabold text-white tracking-tight">BEST <span class="text-green-500">COMPUTER</span></span>
                </a>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Pusat penjualan laptop, perakitan komputer, suku cadang, dan jasa servis profesional terpercaya di Kota Bogor.
                </p>
                <div class="pt-2 text-xs text-gray-500">
                    <span class="inline-block px-2.5 py-1 rounded bg-gray-800 text-green-400 font-medium">Buka Setiap Hari: 10.00 - 21.00 WIB</span>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Layanan Utama</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ url('/lapcom') }}" class="hover:text-green-400 transition-colors">Laptop & Komputer Baru/Second</a></li>
                    <li><a href="{{ url('/lapcom#rakit-pc') }}" class="hover:text-green-400 transition-colors">Jasa Rakit PC Custom</a></li>
                    <li><a href="{{ url('/servmaintenance') }}" class="hover:text-green-400 transition-colors">Servis Hardware & Software</a></li>
                    <li><a href="{{ url('/servmaintenance#maintenance-kantor') }}" class="hover:text-green-400 transition-colors">Maintenance Kantor & Sekolah</a></li>
                    <li><a href="{{ url('/pcperipheral') }}" class="hover:text-green-400 transition-colors">Part PC & Aksesoris</a></li>
                    <li><a href="{{ url('/servicestatus') }}" class="text-green-400 hover:text-green-300 font-medium transition-colors">→ Cek Status Servis Online</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Informasi</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ url('/about') }}" class="hover:text-green-400 transition-colors">Tentang Kami</a></li>
                    <li><a href="{{ url('/help') }}" class="hover:text-green-400 transition-colors">Pertanyaan Umum (FAQ)</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-green-400 transition-colors">Kontak & Lokasi Toko</a></li>
                    <li><a href="https://maps.app.goo.gl/gSRHZz7t5LJeXPHQ9" target="_blank" class="hover:text-green-400 transition-colors">Google Maps Plaza Jambu Dua</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Hubungi Kami</h3>
                <div class="space-y-3 text-sm text-gray-400">
                    <p class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Plaza Jambu Dua Lantai Semi Dasar, Jl. A. Yani No.10, Kota Bogor</span>
                    </p>
                    <p class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <a href="https://wa.me/6285693801996" target="_blank" class="hover:text-green-400 transition-colors">+62 856-9380-1996</a>
                    </p>
                    <p class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:bestcomputerpjd@gmail.com" class="hover:text-green-400 transition-colors">bestcomputerpjd@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-10 pt-6 border-t border-gray-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-500 pb-16 sm:pb-4 sm:pr-20">
            <p>&copy; {{ date('Y') }} Best Computer Bogor. All rights reserved.</p>
            <div class="flex items-center gap-4">
                <a href="{{ url('/about') }}" class="hover:text-gray-400 transition-colors">Tentang</a>
                <a href="{{ url('/help') }}" class="hover:text-gray-400 transition-colors">Bantuan</a>
                <a href="{{ url('/contact') }}" class="hover:text-gray-400 transition-colors">Kontak</a>
                <a href="{{ url('/login') }}" class="text-gray-400 hover:text-green-400 transition-colors font-medium">Staff Login</a>
            </div>
        </div>
    </div>
</footer>