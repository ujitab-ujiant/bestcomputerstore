<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Best Komputer</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="fixed top-0 left-0 right-0 z-50">
        <div class="h-20 bg-blue-600"></div>
        <x-navbar></x-navbar>
    </div>

    <div class="pt-20">
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('pcperipheral') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">PC & Peripheral</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Detail Produk</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div class="aspect-w-1 aspect-h-1 bg-white rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover">
                    </div>

                    @if($product->marketplace_shopee || $product->marketplace_tokopedia)
                        <div class="flex space-x-4 justify-center">
                            @if($product->marketplace_shopee)
                                <a href="{{ $product->marketplace_shopee }}" target="_blank" class="flex items-center bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition duration-300">
                                    <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-6 h-6 mr-2">
                                    Beli di Shopee
                                </a>
                            @endif
                            @if($product->marketplace_tokopedia)
                                <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="flex items-center bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition duration-300">
                                    <img src="{{ asset('img/tokopedia-icon.png') }}" alt="Tokopedia" class="w-6 h-6 mr-2">
                                    Beli di Tokopedia
                                </a>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="space-y-6">
                    <div>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold">{{ $product->subcategory ?? $product->category }}</span>
                        <h1 class="text-3xl font-bold text-gray-900 mt-2">{{ $product->name }}</h1>
                        @if($product->short_description)
                            <p class="text-lg text-gray-600 mt-2 leading-relaxed">{{ $product->short_description }}</p>
                        @endif
                    </div>
                    <div class="border-t border-b border-gray-200 py-4">
                        @if($product->discounted_price)
                            <div class="flex items-center space-x-3">
                                <span class="text-3xl font-bold text-gray-900">{{ 'Rp ' . number_format($product->discounted_price, 0, ',', '.') }}</span>
                                <span class="text-xl text-gray-500 line-through">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                                <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-sm font-semibold">
                                    {{ round((($product->price - $product->discounted_price) / $product->price) * 100) }}% OFF
                                </span>
                            </div>
                        @else
                            <span class="text-3xl font-bold text-gray-900">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</span>
                        @endif
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Produk</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            @php
                                $categoryTranslations = [
                                    'PC Component' => 'Komponen PC',
                                    'Peripheral' => 'Periferal',
                                    'Security' => 'Keamanan & Jaringan'
                                ];
                            @endphp
                            
                            <div>
                                <span class="font-semibold text-gray-700">Kategori:</span>
                                <span class="text-gray-600 block">{{ $categoryTranslations[$product->category] ?? $product->category }}</span>
                            </div>
                            
                            @if($product->subcategory)
                            <div>
                                <span class="font-semibold text-gray-700">Subkategori:</span>
                                <span class="text-gray-600 block">{{ $product->subcategory }}</span>
                            </div>
                            @endif
                            
                            @if($product->brand)
                            <div>
                                <span class="font-semibold text-gray-700">Merek:</span>
                                <span class="text-gray-600 block">{{ $product->brand }}</span>
                            </div>
                            @endif
                            
                            @if($product->weight)
                            <div>
                                <span class="font-semibold text-gray-700">Berat:</span>
                                <span class="text-gray-600 block">
                                    @if($product->weight >= 1000)
                                        {{ number_format($product->weight / 1000, $product->weight % 1000 == 0 ? 0 : 1) }} kg
                                    @else
                                        {{ number_format($product->weight, 0) }} gram
                                    @endif
                                </span>
                            </div>
                            @endif
                            
                            @if($product->sku)
                            <div>
                                <span class="font-semibold text-gray-700">SKU:</span>
                                <span class="text-gray-600 block">{{ $product->sku }}</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($product->description)
                    <div class="bg-white rounded-lg border p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi Lengkap</h3>
                        <div class="prose prose-sm max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>
                    @endif

                    <div class="space-y-4">
                        <a href="https://wa.me/6285693801996?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}. Apakah masih tersedia?" target="_blank" class="w-full bg-green-500 hover:bg-green-600 text-white font-medium py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            Tanyakan Ketersediaan Stok
                        </a>
                        
                        @if($product->marketplace_shopee || $product->marketplace_tokopedia)
                            <div class="grid grid-cols-1 @if($product->marketplace_shopee && $product->marketplace_tokopedia) md:grid-cols-2 @endif gap-4">
                                @if($product->marketplace_shopee)
                                    <a href="{{ $product->marketplace_shopee }}" target="_blank" class="bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center">
                                        <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-5 h-5 mr-2">
                                        Beli di Shopee
                                    </a>
                                @endif
                                @if($product->marketplace_tokopedia)
                                    <a href="{{ $product->marketplace_tokopedia }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center">
                                        <img src="{{ asset('img/tokopedia-icon.png') }}" alt="Tokopedia" class="w-5 h-5 mr-2">
                                        Beli di Tokopedia
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="bg-blue-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-3">Keunggulan Berbelanja di Best Komputer:</h4>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                100% Original & Bergaransi Resmi
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Konsultasi Gratis dengan Tim Ahli
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Tersedia di Marketplace Terpercaya
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Support After Sales Terbaik
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Pengiriman Cepat & Aman
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @if($relatedProducts->count() > 0)
            <div class="bg-white py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Produk Terkait</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedProducts as $relatedProduct)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="relative">
                                    <img src="{{ asset('img/products/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover">
                                    @if($relatedProduct->marketplace_shopee || $relatedProduct->marketplace_tokopedia)
                                        <div class="absolute top-2 right-2 flex space-x-1">
                                            @if($relatedProduct->marketplace_shopee)
                                                <a href="{{ $relatedProduct->marketplace_shopee }}" target="_blank" class="p-1 rounded-full bg-orange-500 hover:bg-orange-700 transition">
                                                    <img src="{{ asset('img/shopee-icon.png') }}" alt="Shopee" class="w-4 h-4">
                                                </a>
                                            @endif
                                            @if($relatedProduct->marketplace_tokopedia)
                                                <a href="{{ $relatedProduct->marketplace_tokopedia }}" target="_blank" class="p-1 rounded-full bg-green-100 hover:bg-green-200 transition">
                                                    <img src="{{ asset('img/tokopedia-icon.png') }}" alt="Tokopedia" class="w-4 h-4">
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded-full">{{ $relatedProduct->subcategory ?? $relatedProduct->category }}</span>
                                    <h3 class="text-lg font-medium text-gray-900 mt-2">{{ $relatedProduct->name }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit($relatedProduct->short_description, 60) }}</p>
                                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                                        @if($relatedProduct->discounted_price)
                                            <div>
                                                <span class="text-gray-500 text-sm line-through">{{ 'Rp ' . number_format($relatedProduct->price, 0, ',', '.') }}</span>
                                                <span class="text-gray-900 font-bold block">{{ 'Rp ' . number_format($relatedProduct->discounted_price, 0, ',', '.') }}</span>
                                            </div>
                                        @else
                                            <span class="text-gray-900 font-bold">{{ 'Rp ' . number_format($relatedProduct->price, 0, ',', '.') }}</span>
                                        @endif
                                        <a href="{{ route('product.detail', $relatedProduct->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium px-3 py-2 rounded-md transition duration-300">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    <x-floatingbutton></x-floatingbutton>
    <x-footer></x-footer>
</body>
</html>