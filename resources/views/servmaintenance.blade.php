<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Komputer - Service & Maintenance</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/servmaintenance.css'])

</head>
<body class="font-sans antialiased bg-white">
    <x-navbar></x-navbar>

    <div class="hero-section flex items-center relative" style="background-image: url('{{ asset('img/bgservmaintenance.jpg') }}'); background-size: cover; background-position: center; min-height: 800px; padding-bottom: 160px;">
        <div class="hero-content w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Bingung Mencari Tempat Servis?</h1>
                <p class="text-xl text-white mb-8">Servis saja laptopmu di sini!</p>
                <a href="#layanan-servis" class="inline-block bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-md transition duration-300">
                    Info Lebih Lanjut
                </a>
            </div>
        </div>
    </div>

    <div class="py-16 bg-transparent relative" style="margin-top: -200px; z-index: 10;">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8"> 
            <div class="mx-auto bg-white rounded-lg shadow-lg p-8 relative z-10" style="margin-bottom: -40px;"> 
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold">
                        Butuh <span class="text-green-500">Perbaikan</span> atau hanya sekedar <span class="text-green-600">Maintenance</span>?
                    </h2>
                    <p class="text-xl mt-2">disini pasti terjamin!</p>
                </div>
                <div class="text-center mb-10">
                    <p class="text-gray-700 max-w-4xl mx-auto">
                        Apapun kendala laptop atau komputermu, dari perbaikan hingga maintenance rutin, kami siap membantu! Dengan teknisi berpengalaman dan layanan terpercaya, perangkatmu akan kembali dalam kondisi prima.
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
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Pengecekan Unit Perangkat</h3>
                        <p class="text-gray-600">
                            Sebelum laptop atau komputer sampai ke tangan pengguna, setiap unit melalui proses pengecekan menyeluruh untuk memastikan kualitasnya dalam kondisi terbaik.
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
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Garansi dan Layanan Purna Jual</h3>
                        <p class="text-gray-600">
                            Setiap produk yang kami jual dilengkapi dengan garansi resmi serta layanan purna jual yang siap membantu jika ada kendala.
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
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Pilihan Terlengkap dan Harga Terbaik</h3>
                        <p class="text-gray-600">
                            Kami menyediakan berbagai jenis laptop dan komputer dengan spesifikasi terbaru, dari kebutuhan kerja hingga gaming dengan berbagai pilihan dari harga terendah sampai harga tertinggi!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="layanan-servis" class="py-12 bg-gray-100 mt-10"> 
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Berbagai Kategori <span class="text-green-500">Layanan Servis</span> yang akan Mempermudah Kamu</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-4xl mx-auto">
                    Kami menyediakan berbagai layanan servis yang dirancang untuk memenuhi setiap kebutuhanmu! Dari perbaikan hardware, instalasi software, hingga maintenance rutin—semuanya ditangani oleh teknisi berpengalaman dengan proses yang cepat, aman, dan terpercaya.
                </p>
            </div>
            <div class="flex flex-col md:flex-row justify-center gap-6 mb-10">
                <a href="https://wa.me/6285693801996" target="_blank" class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-3 rounded-md transition duration-300 text-center">
                    Konsultasikan Masalahmu! Gratis →
                </a>
                <a href="{{ url('/servicestatus') }}" target="_blank" class="bg-white border border-green-600 text-green-600 hover:bg-green-50 font-medium px-6 py-3 rounded-md transition duration-300 text-center">
                    Cek Status Perbaikanmu di sini →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <div class="service-card bg-white rounded-lg shadow-md overflow-hidden border border-green-100">
                    <div class="p-6">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-600 text-white mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Perbaikan Hardware</h3>
                        <p class="text-gray-600">
                            Mengatasi kerusakan pada komponen fisik laptop dan PC seperti motherboard, hard disk, RAM, dan komponen lainnya.
                        </p>
                    </div>
                </div>

                <div class="service-card bg-white rounded-lg shadow-md overflow-hidden border border-green-100">
                    <div class="p-6">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-600 text-white mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Perbaikan Software</h3>
                        <p class="text-gray-600">
                            Menyelesaikan masalah pada sistem operasi, virus, malware, dan instalasi program yang dibutuhkan.
                        </p>
                    </div>
                </div>

                <div class="service-card bg-white rounded-lg shadow-md overflow-hidden border border-green-100">
                    <div class="p-6">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-600 text-white mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Upgrade Komponen</h3>
                        <p class="text-gray-600">
                            Meningkatkan performa perangkat dengan penggantian komponen ke spesifikasi yang lebih tinggi.
                        </p>
                    </div>
                </div>

                <div class="service-card bg-white rounded-lg shadow-md overflow-hidden border border-green-100">
                    <div class="p-6">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-600 text-white mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Perawatan Berkala</h3>
                        <p class="text-gray-600">
                            Layanan pembersihan, penggantian thermal paste, dan optimalisasi sistem untuk menjaga performa maksimal.
                        </p>
                    </div>
                </div>

                <div class="service-card bg-white rounded-lg shadow-md overflow-hidden border border-green-100">
                    <div class="p-6">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-600 text-white mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Backup & Recovery Data</h3>
                        <p class="text-gray-600">
                            Penyelamatan data penting dari perangkat yang rusak dan solusi backup untuk menghindari kehilangan data.
                        </p>
                    </div>
                </div>

                <div class="service-card bg-white rounded-lg shadow-md overflow-hidden border border-green-100">
                    <div class="p-6">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-600 text-white mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Konsultasi Teknis</h3>
                        <p class="text-gray-600">
                            Bantuan profesional untuk memilih spesifikasi dan solusi yang tepat sesuai kebutuhan dan anggaran Anda.
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <div class="flex flex-col">
                    <div class="relative h-64 md:h-80 rounded-lg overflow-hidden mb-4">
                        <img src="{{ asset('img/laptopserv.jpg') }}" alt="Service di Best Computer" class="w-full h-full object-cover">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h4 class="font-bold text-lg mb-2">Service di Best Computer.</h4>
                        <p>Kamu dapat memperbaiki laptopmu dengan langsung datang ke Lokasi Best Computer yang tertera. Staff kami akan langsung melayani dan mengecek kondisi laptopmu saat itu juga.</p>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="relative h-64 md:h-80 rounded-lg overflow-hidden mb-4">
                        <img src="{{ asset('img/laptopserv2.jpg') }}" alt="Service di Best Computer" class="w-full h-full object-cover">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h4 class="font-bold text-lg mb-2">Service Dari Rumah.</h4>
                        <p>Best Computer kini menyediakan layanan Servis dari Rumah sebagai salah satu opsi kemudahan untuk kamu. Cukup hubungi kami lewat WhatsApp untuk konsultasi awal, dan tim kami akan membantu mengatur jadwal kunjungan teknisi ke lokasi kamu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold">Maintenance Handal untuk <span class="text-green-500">Sekolah, Kantor, dan Bisnis Anda</span></h2>
            <p class="mt-4 text-lg text-gray-600 max-w-4xl mx-auto">
                Kami menyediakan layanan maintenance berkualitas untuk sekolah, kantor, dan bisnis Anda. Dengan teknisi profesional, kami memastikan perangkat tetap optimal, mengurangi downtime, dan mendukung kelancaran operasional tanpa gangguan.
            </p>
        </div>

        <div class="flex flex-col space-y-6 mb-12">
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('img/mainkantor.jpg') }}" alt="Maintenance untuk Kantor" class="w-full object-cover h-96">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('img/maininstansi.jpg') }}" alt="Maintenance untuk Instansi" class="w-full object-cover h-64">
                    <div class="bg-white p-4">
                        <h4 class="font-bold text-lg mb-2">Maintenance untuk Instansi Pendidikan</h4>
                        <p>Solusi maintenance komprehensif untuk laboratorium komputer dan fasilitas teknologi di sekolah dan kampus.</p>
                    </div>
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('img/mainbisniscomp.jpg') }}" alt="Maintenance untuk Bisnis" class="w-full object-cover h-64">
                    <div class="bg-white p-4">
                        <h4 class="font-bold text-lg mb-2">Maintenance untuk Bisnis</h4>
                        <p>Layanan perawatan berkala untuk menjaga infrastruktur IT bisnis Anda tetap berjalan optimal dan produktif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="bg-green-600 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-bold text-white sm:text-4xl sm:truncate">
                    Butuh bantuan untuk perangkat Anda?
                </h2>
                <p class="mt-3 text-lg text-green-100">
                    Hubungi kami atau kunjungi toko terdekat untuk konsultasi gratis!
                </p>
            </div>
            <div class="mt-6 flex flex-shrink-0 md:mt-0 md:ml-4">
                <a href="https://wa.me/6287772938153" class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-base font-medium rounded-md text-green-700 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <x-kenapakami></x-kenapakami>
    <x-brandlogo></x-brandlogo>
    <x-review></x-review>
    <x-floatingbutton></x-floatingbutton>
    @vite(['resources/js/servmaintenance.js'])
    <x-footer></x-footer>
</body>
</html>