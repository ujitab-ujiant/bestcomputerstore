<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Komputer - Laptop dan Computer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/lapcom.css'])
    
</head>
<body class="font-sans antialiased bg-white">
    <x-navbar></x-navbar>
    <div class="hero-section flex items-center relative" style="background-image: url('{{ asset('img/bglapcom.png') }}'); background-size: cover; background-position: center; min-height: 800px; padding-bottom: 160px;">
        <div class="hero-content w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Temukan Laptop dan Komputer Impianmu</h1>
                <p class="text-xl text-white mb-8">Pilihan terlengkap dengan kualitas terjamin dan harga terbaik!</p>
                <a href="#produk-kami" class="inline-block bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-md transition duration-300">
                    Lihat Produk
                </a>
            </div>
        </div>
    </div>

    <div class="py-16 bg-transparent relative" style="margin-top: -200px; z-index: 10;">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto bg-white rounded-lg shadow-lg p-8 relative z-10" style="margin-bottom: -40px;">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold">
                        Produk <span class="text-green-500">Laptop</span> dan <span class="text-green-600">Computer</span> Terbaik
                    </h2>
                    <p class="text-xl mt-2">kualitas premium, harga bersaing!</p>
                </div>
                <div class="text-center mb-10">
                    <p class="text-gray-700 max-w-4xl mx-auto">
                        Kami menyediakan berbagai pilihan laptop dan komputer dari brand terkemuka dengan spesifikasi terbaru. Cocok untuk kebutuhan produktivitas, gaming, desain grafis, dan bisnis. Semua produk dilengkapi dengan garansi resmi dan layanan purna jual yang terpercaya.
                    </p>
                </div>

                <div class="max-w-4xl mx-auto mb-16">
                    <h3 class="text-2xl font-bold text-center mb-8">Lokasi Kami</h3>
                    
                    <div class="flex justify-center">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl shadow-lg p-8 text-center w-full max-w-2xl transform transition-all duration-300 hover:scale-105">
                            <div class="flex flex-col md:flex-row items-center justify-center gap-6">
                                <div class="flex-shrink-0 mb-4 md:mb-0">
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 6l6 6m0 0l-6 6" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="flex-grow text-left">
                                    <h3 class="text-2xl font-semibold mb-3">Best Computer - Kota Bogor</h3>
                                    <div class="flex items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <p>+62 856-9380-1996</p>
                                    </div>
                                    <div class="flex items-start mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <p>Plaza Jambu Dua Lantai Semi Dasar, Jl. A. Yani No.10, RT.01/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153</p>
                                    </div>
                                    <a href="https://maps.app.goo.gl/gSRHZz7t5LJeXPHQ9" target="_blank" class="inline-block px-6 py-2 bg-white text-green-600 font-medium rounded-full shadow-md hover:bg-green-50 transition-colors duration-300 mt-2">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                            </svg>
                                            Lihat di Peta
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4 lg:px-12">
                    <div class="text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Garansi Resmi</h3>
                        <p class="text-gray-600">
                            Semua produk kami dilengkapi dengan garansi resmi dari distributor dan produsen, memberikan ketenangan pikiran untuk setiap pembelian Anda.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Kualitas Terjamin</h3>
                        <p class="text-gray-600">
                            Setiap unit laptop dan komputer melalui proses pengecekan menyeluruh untuk memastikan kualitasnya dalam kondisi terbaik saat sampai ke tangan Anda.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Harga Bersaing</h3>
                        <p class="text-gray-600">
                            Dapatkan laptop dan komputer dengan spesifikasi terbaik di kelasnya dengan harga yang bersaing. Kami menawarkan berbagai pilihan yang sesuai dengan budget Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="produk-kami" class="py-12 bg-gray-100 mt-10"> 
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Berbagai Kategori <span class="text-red-500">Laptop dan Komputer</span> dengan banyak Pilihan</h2>
                <h3 class="text-xl mt-2">untuk meningkatkan Produktivitas kamu</h3>
                <p class="mt-4 text-gray-600 max-w-4xl mx-auto">
                    Kami menyediakan berbagai pilihan laptop dan komputer berkualitas untuk kebutuhan kerja, gaming, hingga produktivitas sehari-hari. Dengan spesifikasi terbaru dan harga bersaing, kamu bisa menemukan perangkat yang paling cocok untukmu di Etalase Kami !
                </p>
            </div>
            
            <div class="space-y-8 mb-12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/3">
                            <img src="{{ asset('img/editingsetup.jpg') }}" alt="Editing Setup" class="h-full w-full object-cover">
                        </div>
                        <div class="p-6 md:w-2/3">
                            <h3 class="text-xl font-medium text-gray-900 mb-2">Editing, Desain Grafis, dan 3D Rendering</h3>
                            <p class="text-gray-600">
                                Butuh laptop untuk <span class="text-blue-500">desain grafis</span>, <span class="text-blue-500">gaming</span> atau <span class="text-blue-500">editing video</span>? Kami punya rekomendasinya yang cocok untuk berbagai Hobi dan Pekerjaan kamu.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="md:flex flex-row-reverse">
                        <div class="md:w-1/3">
                            <img src="{{ asset('img/gamingsetup.jpg') }}" alt="Gaming Setup" class="h-full w-full object-cover">
                        </div>
                        <div class="p-6 md:w-2/3">
                            <h3 class="text-xl font-medium text-gray-900 mb-2">Gaming dan Live Stream</h3>
                            <p class="text-gray-600">
                                Ingin rakit PC gaming dengan performa tinggi? Ada banyak pilihan di sini untuk kamu yang antusias bermain Game dan ingin menjadi pemain Pro.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/3">
                            <img src="{{ asset('img/slimlaptop.jpg') }}" alt="Portable Laptop" class="h-full w-full object-cover">
                        </div>
                        <div class="p-6 md:w-2/3">
                            <h3 class="text-xl font-medium text-gray-900 mb-2">Ringan dan Mudah dibawa Kemanapun</h3>
                            <p class="text-gray-600">
                                Laptop ringan dengan performa handal untuk produktivitas kerja dan mobilitas tinggi. Ideal untuk profesional yang sering bepergian.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Kenapa Memilih <span class="text-green-500">Laptop dan Komputer</span> dari Kami?</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div class="flex flex-col">
                    <div class="relative h-64 md:h-80 rounded-lg overflow-hidden mb-4">
                        <img src="{{ asset('img/service-center.jpg') }}" alt="Layanan Purna Jual" class="w-full h-full object-cover">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h4 class="font-bold text-lg mb-2">Layanan Purna Jual Terpercaya</h4>
                        <p>Kami memberikan layanan purna jual yang komprehensif, termasuk garansi resmi, dukungan teknis, dan layanan servis dari teknisi berpengalaman untuk semua produk yang kami jual.</p>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="relative h-64 md:h-80 rounded-lg overflow-hidden mb-4">
                        <img src="{{ asset('img/product-quality.jpg') }}" alt="Kualitas Produk" class="w-full h-full object-cover">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h4 class="font-bold text-lg mb-2">Kualitas Produk Terjamin</h4>
                        <p>Setiap unit laptop dan komputer yang kami jual telah melalui proses quality control yang ketat untuk memastikan pelanggan mendapatkan produk berkualitas terbaik dengan performa optimal.</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 p-8 rounded-lg shadow-sm">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Bingung Memilih Laptop atau Komputer yang Tepat?</h3>
                    <p class="text-gray-600 mt-2">Konsultasikan kebutuhanmu dengan tim ahli kami untuk mendapatkan rekomendasi terbaik sesuai kebutuhan dan budget.</p>
                </div>
                <div class="flex justify-center">
                    <a href="https://wa.me/6285693801996" target="_blank" class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Konsultasi Gratis Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-green-600 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-bold text-white sm:text-4xl sm:truncate">Ingin memiliki laptop atau komputer baru?
                </h2>
                <p class="mt-3 text-lg text-green-100">
                    Kunjungi toko kami atau hubungi untuk penawaran terbaik!
                </p>
            </div>
            <div class="mt-6 flex flex-shrink-0 md:mt-0 md:ml-4">
                <a href="/contact" class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-base font-medium rounded-md text-green-700 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Rakit PC <span class="text-green-500">Sesuai Kebutuhanmu</span></h2>
                <p class="mt-4 text-lg text-gray-600 max-w-4xl mx-auto">
                    Tidak menemukan komputer yang sesuai dengan kebutuhanmu? Kami menyediakan layanan rakit PC custom dengan komponen pilihan terbaik yang disesuaikan dengan kebutuhan dan budget kamu.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-600 text-white mb-4">
                        <span class="text-lg font-bold">1</span>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Konsultasi</h3>
                    <p class="text-gray-600">
                        Diskusikan kebutuhan dan budget dengan tim ahli kami untuk mendapatkan rekomendasi komponen yang tepat untuk PC kamu.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-600 text-white mb-4">
                        <span class="text-lg font-bold">2</span>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Perakitan</h3>
                    <p class="text-gray-600">
                        Tim teknisi berpengalaman kami akan merakit PC kamu dengan teliti menggunakan komponen berkualitas dan terbaru.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-600 text-white mb-4">
                        <span class="text-lg font-bold">3</span>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Pengujian & Serah Terima</h3>
                    <p class="text-gray-600">
                        Setiap PC custom akan diuji secara menyeluruh sebelum diserahkan ke kamu, termasuk instalasi software sesuai permintaan.
                    </p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md">
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Contoh Build PC Gaming</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="rounded-lg overflow-hidden">
                        <img src="{{ asset('img/custom-pc-build.jpg') }}" alt="Custom PC Build" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-semibold text-lg mb-3">Spesifikasi:</h4>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span><strong>Processor:</strong> AMD Ryzen 7 5800X</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span><strong>Motherboard:</strong> MSI MAG B550 TOMAHAWK</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span><strong>RAM:</strong> G.Skill Trident Z RGB 16GB (2x8GB) DDR4-3600MHz</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span><strong>Graphics Card:</strong> NVIDIA GeForce RTX 3070 8GB</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span><strong>Storage:</strong> Samsung 970 EVO Plus 1TB NVMe SSD</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span><strong>Power Supply:</strong> Corsair RM750x 750W 80+ Gold Certified</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span><strong>Case:</strong> NZXT H510 ATX Mid Tower Case</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span><strong>Cooling:</strong> NZXT Kraken X63 RGB 280mm AIO Liquid CPU Cooler</span>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <p class="text-sm text-gray-500 mt-1">*Harga dapat berubah sesuai ketersediaan komponen</p>
                            <a href="https://wa.me/6285693801996" target="blank" class="inline-block mt-4 bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded-md transition duration-300">
                                Tanya Penawaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-kenapakami></x-kenapakami>
    <x-brandlogo></x-brandlogo>
    <x-review></x-review>
    <x-floatingbutton></x-floatingbutton>
    @vite(['resources/js/lapcom.js'])
    <x-footer></x-footer>
</body>
</html>