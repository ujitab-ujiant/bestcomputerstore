<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Best Computer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    @vite(['resources/css/about.css'])
</head>
<body class="font-sans">
    <x-navbar></x-navbar>

    <header class="header-about">
        <img src="{{ asset('img/bgabout.jpg') }}" alt="Header background" class="header-background" />
        <div class="header-overlay">
            <h1 class="header-title">Tentang Kami</h1>
            <nav class="header-breadcrumb">
                <a href="{{ url('/') }}" class="breadcrumb-link">Beranda</a>
                <i class="fas fa-chevron-right breadcrumb-separator"></i>
                <span>Tentang Kami</span>
            </nav>
        </div>
    </header>

    <main>
        <section class="bg-gray-200 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-4">Mengapa Memilih Best Computer?</h2>
                <p class="text-center text-gray-700 max-w-3xl mx-auto mb-12">
                    Kami hadir sebagai solusi lengkap untuk segala kebutuhan komputer dan IT mu. 
                    Dengan layanan servis profesional, produk berkualitas, serta kemudahan dalam 
                    pemesanan dan konsultasi, kami memastikan setiap pelanggan mendapatkan 
                    pengalaman terbaik.
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="bg-white rounded-lg shadow-md p-6 text-center flex flex-col items-center">
                        <div class="feature-icon text-green-600">
                            <i class="fas fa-tools fa-3x"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Layanan Servis Profesional</h3>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 text-center flex flex-col items-center">
                        <div class="feature-icon text-green-600">
                            <i class="fas fa-award fa-3x"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Produk Berkualitas</h3>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 text-center flex flex-col items-center">
                        <div class="feature-icon text-green-600">
                            <i class="fas fa-cogs fa-3x"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Layanan Maintenance</h3>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 text-center flex flex-col items-center">
                        <div class="feature-icon text-green-600">
                            <i class="fas fa-shopping-cart fa-3x"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Pemesanan Mudah</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/tentangkami.jpg');">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-white mb-8 relative inline-block">
                    Tentang Kami
                    <span class="absolute left-1/4 right-1/4 bottom-0 h-1 bg-green-500" style="bottom: -15px;"></span>
                </h2>
                <p class="text-white max-w-4xl mx-auto mb-6">
                    Best Computer didirikan pada tahun 2012 dengan tujuan menyediakan solusi terbaik dalam bidang komputer dan 
                    teknologi. Kami menawarkan berbagai layanan, mulai dari penjualan perangkat hingga perbaikan dan perawatan 
                    berkala, untuk memastikan pelanggan mendapatkan pengalaman terbaik dalam menggunakan teknologi.
                </p>
                <p class="text-white max-w-4xl mx-auto mb-16">
                    Dengan pengalaman dan keahlian dalam bidang IT, kami berkomitmen untuk memberikan pelayanan terbaik 
                    kepada pelanggan yang anda cintai. Kami percaya bahwa teknologi yang terkelola dengan baik akan mendukung 
                    produktivitas dan kualitas hidup yang lebih baik.
                </p>
            </div>
        </section>

        <section class="py-0 -mt-12 mb-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between gap-8">
                    <div class="bg-white rounded-lg shadow-md p-8 text-center flex-1 border-t-4 border-green-500" style="border-left: 1px solid #e5e7eb; border-right: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb;">
                        <h3 class="text-xl font-bold mb-6 text-green-700">Visi</h3>
                        <div class="card-content">
                            <p>Menjadi penyedia solusi teknologi komputer yang terpercaya dan inovatif, memberikan layanan berkualitas untuk meningkatkan produktivitas dan kepuasan pelanggan</p>
                            <p class="font-bold mt-2">Yang Terpercaya, Diperhitungkan dan Berkualitas</p>
                        </div>
                    </div>
   
                    <div class="bg-white rounded-lg shadow-md p-8 text-center flex-1 border-t-4 border-green-500" style="border-left: 1px solid #e5e7eb; border-right: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb;">
                        <h3 class="text-xl font-bold mb-6 text-green-700">Nilai Pelayanan</h3>
                        <div class="grid grid-cols-1 gap-4">
                            <div class="flex items-center">
                                <div class="bg-green-500 rounded-full w-6 h-6 flex items-center justify-center mr-2 text-white">✓</div>
                                <span>Pelayanan Ramah & Responsif</span>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-green-500 rounded-full w-6 h-6 flex items-center justify-center mr-2 text-white">✓</div>
                                <span>Kualitas Servis Terjamin</span>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-green-500 rounded-full w-6 h-6 flex items-center justify-center mr-2 text-white">✓</div>
                                <span>Kemudahan Akses Layanan</span>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-green-500 rounded-full w-6 h-6 flex items-center justify-center mr-2 text-white">✓</div>
                                <span>Keamanan & Kepercayaan Pelanggan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="team-section py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div>
                        <h2 class="text-3xl font-bold mb-6 team-title">Team Kami</h2>
                        <p class="text-gray-700 mb-6">
                            Didukung oleh tim profesional dengan berbagai keahlian di bidang teknis, layanan pelanggan, 
                            administrasi, dan manajemen, Best Computer berkomitmen memberikan layanan terbaik. Setiap anggota 
                            tim kami mendapatkan pelatihan berkala untuk memastikan keahlian mereka selalu selaras dengan 
                            perkembangan teknologi. Dengan semangat kerja yang solid dan penuh dedikasi, kami siap membantu 
                            setiap kebutuhan pelanggan dengan solusi yang cepat, tepat, dan terpercaya.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-300 rounded-md overflow-hidden h-40">
                            <img src="{{ asset('img/about_img1.jpg') }}" 
                                alt="Team member 1" 
                                class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-300 rounded-md overflow-hidden h-40">
                            <img src="{{ asset('img/about_img2.jpg') }}" 
                                alt="Team member 2" 
                                class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-300 rounded-md col-span-2 overflow-hidden h-40">
                            <img src="{{ asset('img/about_img3.jpg') }}" 
                                alt="Team group photo" 
                                class="w-full h-full object-cover">
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