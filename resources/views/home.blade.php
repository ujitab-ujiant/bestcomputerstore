<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda  Best Computer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
    @vite('resources/css/home.css')
    @vite('resources/js/home.js')
</head>
<body class="font-sans">
    <x-navbar></x-navbar>
   <div class="hero-section flex items-center relative" style="background-image: url('{{ asset('img/bghome.jpg') }}'); background-size: cover; background-position: center; height: 800px;">
    <div class="absolute inset-0 bg-black bg-opacity-30 z-0"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pl-[7%] pr-[25%] text-left">
        <div class="mt-10 md:mt-0">
            <h1 class="text-2xl md:text-4xl font-bold text-white leading-tight">
                Toko Komputer Yang Memenuhi<br>Semua Kebutuhan Komputer Anda Dalam Satu Tempat
            </h1>
            <p class="mt-6 text-lg text-white max-w-2xl">
                Cepat. Tepat. Profesional
            </p>

            <div class="mt-8" x-data="searchComponent()">
                <div class="relative max-w-xl">
                    <div class="relative">
                        <input 
                            type="text" 
                            x-model="searchQuery"
                            @input="handleSearch"
                            @focus="showSuggestions = true"
                            @keydown.escape="showSuggestions = false"
                            @keydown.arrow-down.prevent="navigateSuggestions('down')"
                            @keydown.arrow-up.prevent="navigateSuggestions('up')"
                            @keydown.enter.prevent="selectSuggestion()"
                            placeholder="Cari laptop, komputer, komponen PC, layanan servis..."
                            class="w-full px-4 py-3 pr-12 text-gray-900 bg-white rounded-lg border-2 border-white focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base shadow-md">
                        <button @click="performSearch()" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-600 hover:bg-green-700 text-white p-2 rounded-md transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>

                    <div x-show="showSuggestions && (filteredSuggestions.length > 0 || searchQuery.length > 0)" 
                         x-transition
                         @click.outside="showSuggestions = false"
                         class="absolute z-20 w-full mt-2 bg-white rounded-lg shadow-xl border border-gray-200 search-suggestions">

                        <div x-show="searchQuery === ''" class="p-3 border-b border-gray-200">
                            <h4 class="text-sm font-semibold text-gray-700 mb-2">Kategori Populer</h4>
                            <div class="flex flex-wrap gap-2">
                                <template x-for="category in quickCategories" :key="category.name">
                                    <button @click="selectCategory(category)" 
                                            class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs hover:bg-green-200 transition duration-200">
                                        <span x-text="category.name"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <div x-show="searchQuery.length > 0" class="max-h-48 overflow-y-auto">
                            <template x-if="filteredSuggestions.length === 0 && searchQuery.length > 0">
                                <div class="p-3 text-gray-500 text-center text-sm">
                                    Tidak ada hasil untuk "<span x-text="searchQuery"></span>"
                                    <br>
                                    <button @click="contactUs()" class="text-green-600 hover:text-green-700 underline mt-1 text-xs">
                                        Hubungi kami untuk konsultasi
                                    </button>
                                </div>
                            </template>
                            <template x-for="(suggestion, index) in filteredSuggestions" :key="index">
                                <button @click="selectSearchResult(suggestion)" 
                                        :class="{'bg-gray-100': selectedIndex === index}"
                                        class="w-full px-3 py-2 text-left hover:bg-gray-50 search-suggestion-item border-b border-gray-100 last:border-b-0">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 mr-2">
                                            <span x-html="suggestion.icon" class="text-green-600 text-sm"></span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-medium text-gray-900 text-sm" x-text="suggestion.title"></div>
                                            <div class="text-xs text-gray-500" x-text="suggestion.category"></div>
                                        </div>
                                    </div>
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10">
                <a href="#services" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-full border-2 border-white transition duration-300">
                    Jelajahi Layanan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
                <a href="{{ url('/servicestatus') }}" target="_blank" class="inline-flex items-center px-6 py-3 ml-4 bg-white border-2 border-blue-600 text-blue-600 font-medium rounded-full transition duration-300">
                    Perangkat Masih Diservis? Cek Statusnya
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

    <div class="bg-white py-16">
        <x-kenapakami></x-kenapakami>
    </div>

    <div id="services" class="py-24 pt-36 bg-gray-50" x-data="{
        activeTab: 'laptop',
        tabs: {
            laptop: {
                title: 'Laptop & Komputer',
                description: 'Penjualan laptop dan komputer untuk berbagai kebutuhan: editing, desain grafis, 3D rendering, gaming, live streaming, hingga laptop ringan untuk mobilitas tinggi. Dengan layanan purna jual terpercaya dan kualitas produk terjamin.',
                url: '/lapcom',
                image: 'img/laptophome.jpg',
                whatsappUrl: 'https://wa.me/6285693801996',
                infoUrl: '/lapcom',
                buttonText: {
                    whatsapp: 'Hubungi Kami',
                    info: 'Lebih Lanjut'
                }
            },
            service: {
                title: 'Service & Maintenance',
                description: 'Layanan perbaikan hardware & software, upgrade komponen, perawatan berkala, backup & recovery data, dan konsultasi teknis. Tersedia service di toko atau di tempat Anda. Maintenance handal untuk sekolah, kantor, dan bisnis.',
                url: '/servmaintenance',
                image: 'img/servicehome.jpg',
                whatsappUrl: 'https://wa.me/6285693801996',
                infoUrl: '/servmaintenance',
                buttonText: {
                    whatsapp: 'Konsultasi Gratis',
                    info: 'Lebih Lanjut'
                }
            },
            parts: {
                title: 'Part PC & Peripheral',
                description: 'Komponen PC & laptop berkualitas dari brand terpercaya, peripheral & aksesoris untuk produktivitas, serta perangkat keamanan PC. Tersedia katalog lengkap dengan opsi pembelian melalui toko, Shopee, dan Tokopedia.',
                url: '/pcperipheral',
                image: 'img/partshome.jpg',
                whatsappUrl: 'https://wa.me/6285693801996',
                infoUrl: '/pcperipheral',
                buttonText: {
                    whatsapp: 'Tanyakan Stok',
                    info: 'Lihat Produk'
                }
            }
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Pelayanan <span class="text-green-600">BEST COMPUTER</span></h2>
                <div class="mt-6 max-w-3xl mx-auto text-center italic text-gray-600 border-l-4 border-r-4 border-gray-200 px-6 py-4">
                    "Kami berkomitmen memberikan layanan cepat dan profesional. Untuk servis berat, kami menyediakan sistem cek status repair, sehingga pelanggan bisa memantau progres perbaikan perangkat mereka dengan mudah dan transparan."
                </div>
            </div>
    
            <div class="flex flex-wrap justify-center mt-8 gap-4">
                <button 
                    @click="activeTab = 'laptop'" 
                    :class="{'bg-green-600 text-white': activeTab === 'laptop', 'bg-gray-200 hover:bg-gray-300 text-gray-800': activeTab !== 'laptop'}"
                    class="px-6 py-3 rounded-md font-medium transition duration-300">
                    Laptop & Komputer
                </button>
                <button 
                    @click="activeTab = 'service'" 
                    :class="{'bg-green-600 text-white': activeTab === 'service', 'bg-gray-200 hover:bg-gray-300 text-gray-800': activeTab !== 'service'}"
                    class="px-6 py-3 rounded-md font-medium transition duration-300">
                    Service & Maintenance
                </button>
                <button 
                    @click="activeTab = 'parts'" 
                    :class="{'bg-green-600 text-white': activeTab === 'parts', 'bg-gray-200 hover:bg-gray-300 text-gray-800': activeTab !== 'parts'}"
                    class="px-6 py-3 rounded-md font-medium transition duration-300">
                    Part PC & Peripheral
                </button>
            </div>
    
            <div class="mt-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="w-full md:w-1/2">
                        <div class="relative" style="height: 400px; width: 100%; max-width: 640px; margin: 0 auto;">
                            <template x-if="activeTab === 'laptop'">
                                <div class="absolute inset-0 rounded-lg overflow-hidden shadow-lg">
                                    <img src="img/laptophome.jpg" alt="Laptop & Komputer" class="w-full h-full object-cover" />
                                </div>
                            </template>

                            <template x-if="activeTab === 'service'">
                                <div class="absolute inset-0 rounded-lg overflow-hidden shadow-lg">
                                    <img src="img/servicehome.jpg" alt="Service & Maintenance" class="w-full h-full object-cover" />
                                </div>
                            </template>

                            <template x-if="activeTab === 'parts'">
                                <div class="absolute inset-0 rounded-lg overflow-hidden shadow-lg">
                                    <img src="img/partshome.jpg" alt="Part PC & Peripheral" class="w-full h-full object-cover" />
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4" x-text="tabs[activeTab].title"></h3>
                        <p class="text-gray-600 mb-6" x-text="tabs[activeTab].description"></p>
                        <div class="flex gap-4">
                            <a :href="tabs[activeTab].whatsappUrl" target="_blank" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22c-5.523 0-10-4.477-10-10S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                                </svg>
                                <span x-text="tabs[activeTab].buttonText.whatsapp"></span>
                            </a>
                            <a :href="tabs[activeTab].infoUrl" class="px-6 py-2 bg-green-200 text-green-800 rounded-md hover:bg-green-300 transition duration-300">
                                <span x-text="tabs[activeTab].buttonText.info"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="py-16 bg-gray-100 mt-20" >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-green-600 rounded-lg shadow-lg p-8 text-center text-white">
                <h2 class="text-3xl font-bold mb-4">Cek Status Servis</h2>
                <p class="text-xl mb-8">
                    Pantau progres perbaikan perangkat Anda dengan mudah melalui sistem tracking kami
                </p>
                <a href="{{ url('/servicestatus') }}" target="_blank" class="inline-block bg-white text-green-600 font-medium px-8 py-3 rounded-md hover:bg-gray-100 transition duration-300">
                    Cek Status Sekarang
                </a>
            </div>
        </div>
    </div>

    <div class="bg-lime-500 ">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white md:text-4xl">
                <span class="block text-blue-400">Solusi IT terbaik untuk berbagai kebutuhan Anda</span>
                <span class="block text-blue-500">Hubungi kami hari ini.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-full shadow">
                    <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-full text-blue-700 bg-blue-200 hover:bg-blue-400">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
    <x-floatingbutton></x-floatingbutton>
    <x-brandlogo></x-brandlogo>
    <x-review></x-review>
    <x-footer></x-footer>
</body>
</html>