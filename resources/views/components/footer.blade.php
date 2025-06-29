<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda  Best Computer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
</head>
<body>

<footer class="bg-gray-800 mt-0">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="md:col-span-1">
                <a href="{{ url('/') }}">
                    <img class="h-10" src="{{ asset('img/logo.png') }}" alt="Logo">
                </a>
                <p class="mt-4 text-base text-gray-300">
                  Solusi Service Laptop terbaik untuk kebutuhan personal dan bisnis Anda.
                </p>
                <div class="mt-4">
                    <h2 class="text-2xl font-bold text-green-500 italic">BEST COMPUTER</h2>
                </div>
            </div>
            <div class="md:col-span-1">
                <h3 class="text-sm font-semibold text-white tracking-wider uppercase">Layanan</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="{{ url('/lapcom') }}" class="text-base text-gray-300 hover:text-green-600 transition-colors">Laptop & Komputer</a></li>
                    <li><a href="{{ url('/servmaintenance') }}" class="text-base text-gray-300 hover:text-green-600 transition-colors">Servis & Maintenance</a></li>
                    <li><a href="{{ url('/pcperipheral') }}" class="text-base text-gray-300 hover:text-green-600 transition-colors">Part PC & Peripheral</a></li>
                </ul>
            </div>
            <div class="md:col-span-1">
                <h3 class="text-sm font-semibold text-white tracking-wider uppercase">Perusahaan</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="{{ url('/about') }}" class="text-base text-gray-300 hover:text-green-600 transition-colors">Tentang Kami</a></li>
                    <li><a href="{{ url('/help') }}" class="text-base text-gray-300 hover:text-green-600 transition-colors">Bantuan</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-base text-gray-300 hover:text-green-600 transition-colors">Kontak</a></li>
                </ul>
            </div>
            <div class="md:col-span-1">
                <h3 class="text-sm font-semibold text-white tracking-wider uppercase">Hubungi Kami</h3>
                <div class="mt-4 space-y-2">
                    <p class="text-base text-gray-300">Email: bestcomputerpjd@gmail.com</p>
                    <p class="text-base text-gray-300">Telepon: +62 856-9380-1996</p>
                    <p class="text-base text-gray-300">Alamat: Plaza Jambu Dua Lantai Semi Dasar, Jl. A. Yani No.10, RT.01/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153</p>
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-8">
            <p class="text-base text-gray-400 text-center">
                &copy; 2025 Best Computer. All rights reserved.
            </p>
        </div>
    </div>
</footer>

</body>
</html>