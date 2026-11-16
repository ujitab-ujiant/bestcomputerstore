<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Komputer - PC Parts & Peripheral</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/pcperipheral.css'])
    
</head>
<body class="font-sans antialiased bg-gray-50">
    <x-navbar></x-navbar>
    <div class="hero-section flex items-center relative pt-28 pb-20 md:pt-36 md:pb-32" style="background-image: url('{{ asset('img/bgpcperipheral.jpg') }}'); background-size: cover; background-position: center; min-height: 520px;">
        <div class="hero-content w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Temukan Berbagai Part PC & Peripheral Berkualitas!</h1>
                <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto">Upgrade dan lengkapi kebutuhan komputermu dengan produk terbaik!</p>
                <a href="#part-pc" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-7 py-3.5 rounded-xl shadow-lg transition duration-300">
                    Lihat Katalog
                </a>
            </div>
        </div>
    </div>

    <div class="relative z-20 -mt-10 md:-mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div>
            <div class="mx-auto bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8 md:p-10 relative z-10">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold">
                        Temukan apapun yang <span class="text-blue-500">Kamu Butuhkan</span>
                    </h2>
                    <p class="text-xl mt-2">Kualitas terbaik dengan harga terjangkau!</p>
                </div>
                <div class="text-center mb-10">
                    <p class="text-gray-700 max-w-4xl mx-auto">
                        Dapatkan berbagai komponen, aksesori, dan perangkat terbaik untuk menunjang kebutuhan komputermu. Dari upgrade performa hingga penggantian suku cadang, kami menyediakan produk berkualitas dengan layanan yang terpercaya!
                    </p>
                </div>

                <div id="kategori-produk" class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4 lg:px-12 mb-12">
                    <div class="category-card bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6 text-center">
                        <div class="mb-4 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Upgrade dan ganti Komponen PC</h3>
                        <p class="mb-4">Processor, Motherboard, RAM, VGA Card, dan masih banyak lagi untuk tingkatkan performa PC-mu!</p>
                        <a href="#part-pc" class="inline-block bg-white text-blue-600 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-blue-50">Lihat Produk</a>
                    </div>

                    <div class="category-card bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6 text-center">
                        <div class="mb-4 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Set Peripheral untuk produktivitas</h3>
                        <p class="mb-4">Keyboard, Mouse, Monitor, Webcam, dan aksesoris lainnya untuk produktivitas maksimal!</p>
                        <a href="#peripheral" class="inline-block bg-white text-purple-600 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-purple-50">Lihat Produk</a>
                    </div>

                    <div class="category-card bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6 text-center">
                        <div class="mb-4 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Keamanan Komponen PC-mu</h3>
                        <p class="mb-4">UPS, Stabilizer, Kabel LAN, dan solusi keamanan lainnya untuk perlindungan optimal!</p>
                        <a href="#keamanan" class="inline-block bg-white text-green-600 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-green-50">Lihat Produk</a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4 lg:px-12 mb-12">
                    <div class="text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">100% Original dan Bergaransi</h3>
                        <p class="text-gray-600">
                            Semua produk yang kami tawarkan adalah 100% original dengan garansi resmi dari distributor atau brand langsung.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Beli di Marketplace Terpercaya</h3>
                        <p class="text-gray-600">
                            Dapatkan produk favorit melalui Shopee atau Tokopedia dengan penawaran eksklusif dan kemudahan pembayaran.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Konsultasi Gratis</h3>
                        <p class="text-gray-600">
                            Bingung memilih spesifikasi? Konsultasikan kebutuhanmu dengan tim ahli kami secara gratis!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="part-pc" class="py-12 bg-gradient-to-r from-blue-50 to-indigo-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold mb-3">TOP PICKS</span>
                <h2 class="text-3xl font-bold">Produk <span class="text-blue-500">Unggulan</span></h2>
                <p class="mt-4 text-lg text-gray-600 max-w-4xl mx-auto">
                    Temukan produk-produk terlaris dan terbaik yang paling diminati oleh para pelanggan kami!
                </p>
            </div>

            <div class="swiper featured-products-swiper">
                <div class="swiper-wrapper">
                    @forelse ($featuredProducts as $product)
                        <div class="swiper-slide">
                            <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                                <div class="absolute top-0 left-0 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-1 rounded-br-lg text-sm font-semibold z-10">
                                    UNGGULAN
                                </div>
                                @if($product->marketplace_shopee || $product->marketplace_tokopedia)
                                    <div class="marketplace-badge flex space-x-2">
                                        @if($product->marketplace_shopee)
                                            <a href="{{ $product->marketplace_shopee }}" target="_blank" class="bg-orange-500 text-white px-2 py-1 rounded-sm text-xs hover:bg-orange-600 transition">Shopee</a>
                                        @endif
                                        @if($product->marketplace_tokopedia)
                                            <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="bg-green-500 text-white px-2 py-1 rounded-sm text-xs hover:bg-green-600 transition">Tokopedia</a>
                                        @endif
                                    </div>
                                @endif
                                <div class="relative">
                                    <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-56 object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div class="p-5">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded-full">{{ $product->subcategory ?? $product->category }}</span>
                                        <div class="flex space-x-1">
                                            @if($product->marketplace_shopee)
                                                <a href="{{ $product->marketplace_shopee }}" target="_blank" class="p-1 rounded-full bg-orange-500 hover:bg-orange-700 transition">
                                                    <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-6 h-6">
                                                </a>
                                            @endif
                                            @if($product->marketplace_tokopedia)
                                                <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="p-1 rounded-full bg-green-100 hover:bg-green-200 transition">
                                                    <img src="{{ asset('img/tokopedia-icon.png') }}" alt="Tokopedia" class="w-6 h-6">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mt-2">{{ $product->name }}</h3>
                                    <p class="text-gray-600 text-sm mt-1 mb-4">{{ $product->short_description }}</p>
                                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                                        @if($product->discounted_price)
                                            <div>
                                                <span class="text-gray-500 text-sm line-through">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                                <span class="text-gray-900 font-bold block text-lg">{{ 'Rp ' . number_format($product->discounted_price, 0, ',', '.') }}</span>
                                            </div>
                                        @else
                                            <span class="text-gray-900 font-bold text-lg">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                        @endif
                                        <div class="flex flex-col space-y-2">
                                            <a href="{{ route('product.detail', $product->id) }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium px-3 py-2 rounded-md transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Detail Produk
                                            </a>
                                            <a href="https://wa.me/6285693801996?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}. Apakah masih tersedia?" target="_blank" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white text-xs font-medium px-3 py-2 rounded-md transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                                </svg>
                                                Tanyakan Stok
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500">Belum ada produk unggulan.</p>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            
            <div class="text-center">
                <a href="https://id.shp.ee/Ao9XCzo" target="_blank" class="inline-flex items-center bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-medium px-8 py-3 rounded-md transition duration-300 shadow-md hover:shadow-lg">
                    <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-6 h-6 mr-2">
                    Lihat Semua Produk Unggulan
                </a>
            </div>
        </div>
    </div>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Komponen <span class="text-blue-500">PC & Laptop</span> Terbaik</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-4xl mx-auto">
                    Upgrade performa komputermu dengan komponen berkualitas dari brand terpercaya. Dari processor, VGA, RAM, hingga storage, semua tersedia untuk kebutuhanmu!
                </p>
            </div>          
            <div class="swiper pc-components-swiper">
                <div class="swiper-wrapper">
                    @forelse ($pcComponents as $product)
                        <div class="swiper-slide">
                            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden relative group">
                                @if($product->marketplace_shopee || $product->marketplace_tokopedia)
                                    <div class="marketplace-badge flex space-x-2">
                                        @if($product->marketplace_shopee)
                                            <a href="{{ $product->marketplace_shopee }}" target="_blank" class="bg-orange-500 text-white px-2 py-1 rounded-sm text-xs hover:bg-orange-600 transition">Shopee</a>
                                        @endif
                                        @if($product->marketplace_tokopedia)
                                            <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="bg-green-500 text-white px-2 py-1 rounded-sm text-xs hover:bg-green-600 transition">Tokopedia</a>
                                        @endif
                                    </div>
                                @endif
                                <div class="relative">
                                    <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div class="p-4">
                                    <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded-full">{{ $product->subcategory ?? $product->category }}</span>
                                    <h3 class="text-lg font-medium text-gray-900 mt-2">{{ $product->name }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ $product->short_description }}</p>
                                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                                        @if($product->discounted_price)
                                            <div>
                                                <span class="text-gray-500 text-sm line-through">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                                <span class="text-gray-900 font-bold block text-lg">{{ 'Rp ' . number_format($product->discounted_price, 0, ',', '.') }}</span>
                                            </div>
                                        @else
                                            <span class="text-gray-900 font-bold text-lg">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                        @endif
                                        <div class="flex items-center space-x-2">
                                            <div class="flex space-x-1">
                                                @if($product->marketplace_shopee)
                                                    <a href="{{ $product->marketplace_shopee }}" target="_blank" class="p-1 rounded-full bg-orange-500 hover:bg-orange-700 transition">
                                                        <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-6 h-6">
                                                    </a>
                                                @endif
                                                @if($product->marketplace_tokopedia)
                                                    <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="p-1 rounded-full bg-green-100 hover:bg-green-200 transition">
                                                        <img src="{{ asset('img/tokopedia-icon.png') }}" alt="Tokopedia" class="w-6 h-6">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="flex flex-col space-y-1">
                                                <a href="{{ route('product.detail', $product->id) }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded-md transition duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Detail
                                                </a>
                                                <a href="https://wa.me/6285693801996?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}. Apakah masih tersedia?" target="_blank" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white text-xs font-medium px-2 py-1 rounded-md transition duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                                    </svg>
                                                    WA
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500">Belum ada produk dalam kategori ini.</p>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="text-center mt-8">
                <a href="https://id.shp.ee/Ao9XCzo" target="_blank" class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-3 rounded-md transition duration-300">
                    <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-6 h-6 mr-2">
                    Lihat Semua Komponen PC
                </a>
            </div>
        </div>
    </div>

    <div id="peripheral" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold"><span class="text-purple-500">Peripheral</span> & Aksesoris</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-4xl mx-auto">
                    Lengkapi setup-mu dengan peripheral dan aksesoris berkualitas yang meningkatkan produktivitas dan kenyamanan. Dari keyboard, mouse, hingga headset gaming!
                </p>
            </div>

            <div class="swiper peripherals-swiper">
                <div class="swiper-wrapper">
                    @forelse ($peripherals as $product)
                        <div class="swiper-slide">
                            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden relative group">
                                @if($product->marketplace_shopee || $product->marketplace_tokopedia)
                                    <div class="marketplace-badge flex space-x-2">
                                        @if($product->marketplace_shopee)
                                            <a href="{{ $product->marketplace_shopee }}" target="_blank" class="bg-orange-500 text-white px-2 py-1 rounded-sm text-xs hover:bg-orange-600 transition">Shopee</a>
                                        @endif
                                        @if($product->marketplace_tokopedia)
                                            <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="bg-green-500 text-white px-2 py-1 rounded-sm text-xs hover:bg-green-600 transition">Tokopedia</a>
                                        @endif
                                    </div>
                                @endif
                                <div class="relative">
                                    <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div class="p-4">
                                    <span class="text-xs font-semibold text-purple-600 bg-purple-100 px-2 py-1 rounded-full">{{ $product->subcategory ?? $product->category }}</span>
                                    <h3 class="text-lg font-medium text-gray-900 mt-2">{{ $product->name }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ $product->short_description }}</p>
                                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                                        @if($product->discounted_price)
                                            <div>
                                                <span class="text-gray-500 text-sm line-through">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                                <span class="text-gray-900 font-bold block text-lg">{{ 'Rp ' . number_format($product->discounted_price, 0, ',', '.') }}</span>
                                            </div>
                                        @else
                                            <span class="text-gray-900 font-bold text-lg">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                        @endif
                                        <div class="flex items-center space-x-2">
                                            <div class="flex space-x-1">
                                                @if($product->marketplace_shopee)
                                                    <a href="{{ $product->marketplace_shopee }}" target="_blank" class="p-1 rounded-full bg-orange-500 hover:bg-orange-700 transition">
                                                        <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-6 h-6">
                                                    </a>
                                                @endif
                                                @if($product->marketplace_tokopedia)
                                                    <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="p-1 rounded-full bg-green-100 hover:bg-green-200 transition">
                                                        <img src="{{ asset('img/tokopedia-icon.png') }}" alt="Tokopedia" class="w-6 h-6">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="flex flex-col space-y-1">
                                                <a href="{{ route('product.detail', $product->id) }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded-md transition duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Detail
                                                </a>
                                                <a href="https://wa.me/6285693801996?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}. Apakah masih tersedia?" target="_blank" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white text-xs font-medium px-2 py-1 rounded-md transition duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                                    </svg>
                                                    WA
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500">Belum ada produk dalam kategori ini.</p>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="text-center mt-8">
                <a href="https://id.shp.ee/Ao9XCzo" target="_blank" class="inline-flex items-center bg-purple-500 hover:bg-purple-600 text-white font-medium px-6 py-3 rounded-md transition duration-300">
                    <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-6 h-6 mr-2">
                    Lihat Semua Peripheral
                </a>
            </div>
        </div>
    </div>

    <div id="keamanan" class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Perangkat <span class="text-green-500">Keamanan</span> PC</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-4xl mx-auto">
                    Lindungi investasi komputermu dengan perangkat keamanan terbaik. Dari UPS, Stabilizer, hingga Peralatan Jaringan berkualitas untuk perlindungan optimal!
                </p>
            </div>

            <div class="swiper security-products-swiper">
                <div class="swiper-wrapper">
                    @forelse ($securityProducts as $product)
                        <div class="swiper-slide">
                            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden relative group">
                                @if($product->marketplace_shopee || $product->marketplace_tokopedia)
                                    <div class="marketplace-badge flex space-x-2">
                                        @if($product->marketplace_shopee)
                                            <a href="{{ $product->marketplace_shopee }}" target="_blank" class="bg-orange-500 text-white px-2 py-1 rounded-sm text-xs hover:bg-orange-600 transition">Shopee</a>
                                        @endif
                                        @if($product->marketplace_tokopedia)
                                            <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="bg-green-500 text-white px-2 py-1 rounded-sm text-xs hover:bg-green-600 transition">Tokopedia</a>
                                        @endif
                                    </div>
                                @endif
                                <div class="relative">
                                    <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                <div class="p-4">
                                    <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-full">{{ $product->subcategory ?? $product->category }}</span>
                                    <h3 class="text-lg font-medium text-gray-900 mt-2">{{ $product->name }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ $product->short_description }}</p>
                                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                                        @if($product->discounted_price)
                                            <div>
                                                <span class="text-gray-500 text-sm line-through">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                                <span class="text-gray-900 font-bold block text-lg">{{ 'Rp ' . number_format($product->discounted_price, 0, ',', '.') }}</span>
                                            </div>
                                        @else
                                            <span class="text-gray-900 font-bold text-lg">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                        @endif
                                        <div class="flex items-center space-x-2">
                                            <div class="flex space-x-1">
                                                @if($product->marketplace_shopee)
                                                    <a href="{{ $product->marketplace_shopee }}" target="_blank" class="p-1 rounded-full bg-orange-500 hover:bg-orange-700 transition">
                                                        <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-6 h-6">
                                                    </a>
                                                @endif
                                                @if($product->marketplace_tokopedia)
                                                    <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="p-1 rounded-full bg-green-100 hover:bg-green-200 transition">
                                                        <img src="{{ asset('img/tokopedia-icon.png') }}" alt="Tokopedia" class="w-6 h-6">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="flex flex-col space-y-1">
                                                <a href="{{ route('product.detail', $product->id) }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium px-2 py-1 rounded-md transition duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Detail
                                                </a>
                                                <a href="https://wa.me/6285693801996?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}. Apakah masih tersedia?" target="_blank" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white text-xs font-medium px-2 py-1 rounded-md transition duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                                    </svg>
                                                    WA
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500">Belum ada produk dalam kategori ini.</p>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="text-center mt-8">
                <a href="https://id.shp.ee/Ao9XCzo" target="_blank" class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-md transition duration-300">
                    <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-6 h-6 mr-2">
                    Lihat Semua Produk Keamanan
                </a>
            </div>
        </div>
    </div>

    <div class="py-16 bg-blue-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Masih Bingung Memilih Produk yang Tepat?</h2>
            <p class="text-xl text-white mb-8 max-w-3xl mx-auto">
                Tim ahli kami siap membantu memberikan rekomendasi produk sesuai dengan kebutuhan dan budget Anda!
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center justify-center bg-white text-blue-600 font-medium px-6 py-3 rounded-md hover:bg-blue-50 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    Konsultasi via WhatsApp
                </a>
                <a href="mailto:info@bestkomputer.com" class="inline-flex items-center justify-center bg-green-500 text-white font-medium px-6 py-3 rounded-md hover:bg-green-600 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Email Kami
                </a>
            </div>
        </div>
    </div>

    <x-kenapakami></x-kenapakami>
    <x-brandlogo></x-brandlogo>
    <x-floatingbutton></x-floatingbutton>
    <x-footer></x-footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @vite(['resources/js/pcperipheral.js'])
</body>
</html>