<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Computer - Toko Komputer & Servis Laptop Terbaik di Bogor</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <script>
    window.searchComponent = function() {
        return {
            searchQuery: '',
            showSuggestions: false,
            selectedIndex: -1,
            quickCategories: [
                { name: 'Laptop', url: '/lapcom' },
                { name: 'Service', url: '/servmaintenance' },
                { name: 'Komponen PC', url: '/pcperipheral' },
                { name: 'Gaming Setup', url: '/pcperipheral' },
                { name: 'Cek Status Servis', url: '/servicestatus' },
                { name: 'Tentang Kami', url: '/about' },
                { name: 'Bantuan/FAQ', url: '/help' },
                { name: 'Kontak', url: '/contact' }
            ],
            searchSuggestions: [
                { title: 'Laptop Editing & Desain Grafis', category: 'Laptop & Komputer', url: '/lapcom' },
                { title: 'Laptop 3D Rendering', category: 'Laptop & Komputer', url: '/lapcom' },
                { title: 'Laptop Gaming & Live Stream', category: 'Laptop & Komputer', url: '/lapcom' },
                { title: 'Laptop Ringan Slim', category: 'Laptop & Komputer', url: '/lapcom' },
                { title: 'PC Gaming Custom', category: 'Laptop & Komputer', url: '/lapcom' },
                { title: 'Perbaikan Hardware', category: 'Service & Maintenance', url: '/servmaintenance' },
                { title: 'Perbaikan Software', category: 'Service & Maintenance', url: '/servmaintenance' },
                { title: 'Upgrade Komponen', category: 'Service & Maintenance', url: '/servmaintenance' },
                { title: 'Perawatan Berkala', category: 'Service & Maintenance', url: '/servmaintenance' },
                { title: 'Backup & Recovery Data', category: 'Service & Maintenance', url: '/servmaintenance' },
                { title: 'Konsultasi Teknis', category: 'Service & Maintenance', url: '/servmaintenance' },
                { title: 'Service di Rumah', category: 'Service & Maintenance', url: '/servmaintenance' },
                { title: 'Maintenance Kantor', category: 'Service & Maintenance', url: '/servmaintenance' },
                { title: 'Cek Status Servis', category: 'Layanan Servis', url: '/servicestatus' },
                { title: 'Komponen PC & Laptop', category: 'Part PC & Peripheral', url: '/pcperipheral' },
                { title: 'Peripheral & Aksesoris', category: 'Part PC & Peripheral', url: '/pcperipheral' },
                { title: 'Tentang Perusahaan', category: 'Informasi', url: '/about' },
                { title: 'FAQ - Pertanyaan Umum', category: 'Bantuan', url: '/help' },
                { title: 'Kontak & Alamat Toko', category: 'Kontak', url: '/contact' }
            ],
            get filteredSuggestions() {
                if (!this.searchQuery) return [];
                const query = this.searchQuery.toLowerCase();
                return this.searchSuggestions.filter(item => 
                    item.title.toLowerCase().includes(query) || 
                    item.category.toLowerCase().includes(query)
                ).slice(0, 8);
            },
            handleSearch() {
                this.selectedIndex = -1;
                this.showSuggestions = this.searchQuery.length > 0;
            },
            navigateSuggestions(direction) {
                const suggestions = this.filteredSuggestions;
                if (suggestions.length === 0) return;
                if (direction === 'down') {
                    this.selectedIndex = this.selectedIndex < suggestions.length - 1 ? this.selectedIndex + 1 : 0;
                } else {
                    this.selectedIndex = this.selectedIndex > 0 ? this.selectedIndex - 1 : suggestions.length - 1;
                }
            },
            selectSuggestion() {
                if (this.selectedIndex >= 0 && this.filteredSuggestions[this.selectedIndex]) {
                    this.selectSearchResult(this.filteredSuggestions[this.selectedIndex]);
                } else {
                    this.performSearch();
                }
            },
            selectCategory(category) {
                this.searchQuery = category.name;
                this.showSuggestions = false;
                window.location.href = category.url;
            },
            selectSearchResult(suggestion) {
                this.searchQuery = suggestion.title;
                this.showSuggestions = false;
                if (suggestion.url) {
                    window.location.href = suggestion.url;
                } else {
                    this.contactUs(suggestion.title);
                }
            },
            performSearch() {
                if (!this.searchQuery.trim()) return;
                const results = this.filteredSuggestions;
                if (results.length > 0) {
                    this.selectSearchResult(results[0]);
                } else {
                    this.showSuggestions = true;
                }
            },
            contactUs(product = '') {
                const message = product 
                    ? `Halo, saya ingin menanyakan tentang: ${product}`
                    : `Halo, saya ingin konsultasi tentang kebutuhan komputer saya`;
                window.open(`https://wa.me/6285693801996?text=${encodeURIComponent(message)}`, '_blank');
            }
        };
    };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/home.css', 'resources/js/home.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <x-navbar></x-navbar>

    @php
        $heroSec = isset($page) ? $page->getSection('hero') : null;
        $heroContent = $heroSec?->content ?? [];
        $statsSec = isset($page) ? $page->getSection('stats') : null;
        $statsItems = $statsSec?->content['items'] ?? null;
    @endphp

    @if(!$heroSec || $heroSec->is_visible)
    <!-- Hero Section -->
    <div class="hero-section flex items-center relative pt-28 pb-20 md:pt-36 md:pb-28" style="background-image: url('{{ asset('img/bghome.jpg') }}'); background-size: cover; background-position: center; min-height: 600px;">
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/70 to-black/50 z-0"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="max-w-3xl">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-green-500/20 border border-green-400/40 text-green-300 text-xs md:text-sm font-medium mb-4 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>{{ $heroContent['badge'] ?? 'Toko Komputer & Pusat Servis Terpercaya di Plaza Jambu Dua Bogor' }}</span>
                </span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white leading-tight tracking-tight">
                    @if(isset($heroContent['title']))
                        {{ $heroContent['title'] }}
                    @else
                        Toko Komputer yang Memenuhi Seluruh Kebutuhan Anda dalam <span class="text-green-400">Satu Tempat</span>
                    @endif
                </h1>
                <p class="mt-4 text-base sm:text-lg text-gray-200 max-w-2xl leading-relaxed">
                    {{ $heroContent['subtitle'] ?? 'Cepat • Tepat • Profesional. Penjualan laptop, custom PC rakitan, suku cadang original, serta layanan servis bergaransi.' }}
                </p>

                <!-- Interactive Search Bar Component -->
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
                                placeholder="Cari laptop, PC gaming, sparepart, servis..."
                                class="w-full px-5 py-3.5 pr-14 text-gray-900 bg-white rounded-xl border-2 border-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-400/20 text-sm sm:text-base shadow-lg">
                            <button @click="performSearch()" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-600 hover:bg-green-700 text-white p-2.5 rounded-lg transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Suggestions Dropdown -->
                        <div x-show="showSuggestions && (filteredSuggestions.length > 0 || searchQuery.length > 0)" 
                             x-transition
                             @click.outside="showSuggestions = false"
                             class="absolute z-30 w-full mt-2 bg-white rounded-xl shadow-2xl border border-gray-100 search-suggestions overflow-hidden">

                            <div x-show="searchQuery === ''" class="p-3.5 border-b border-gray-100 bg-gray-50">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Kategori Populer:</h4>
                                <div class="flex flex-wrap gap-1.5">
                                    <template x-for="category in quickCategories" :key="category.name">
                                        <button @click="selectCategory(category)" 
                                                class="px-2.5 py-1 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs hover:border-green-500 hover:text-green-600 transition">
                                            <span x-text="category.name"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>

                            <div x-show="searchQuery.length > 0" class="max-h-56 overflow-y-auto">
                                <template x-if="filteredSuggestions.length === 0 && searchQuery.length > 0">
                                    <div class="p-4 text-gray-500 text-center text-sm">
                                        Tidak ada hasil untuk "<span class="font-semibold text-gray-800" x-text="searchQuery"></span>"
                                        <br>
                                        <button @click="contactUs()" class="text-green-600 hover:text-green-700 font-semibold underline mt-2 text-xs">
                                            Chat WhatsApp kami untuk konsultasi langsung →
                                        </button>
                                    </div>
                                </template>
                                <template x-for="(suggestion, index) in filteredSuggestions" :key="index">
                                    <button @click="selectSearchResult(suggestion)" 
                                            :class="{'bg-green-50 text-green-700': selectedIndex === index}"
                                            class="w-full px-4 py-3 text-left hover:bg-gray-50 search-suggestion-item border-b border-gray-100 last:border-b-0">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 mr-3 text-green-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                            </div>
                                            <div class="flex-1">
                                                <div class="font-semibold text-gray-900 text-sm" x-text="suggestion.title"></div>
                                                <div class="text-xs text-gray-500" x-text="suggestion.category"></div>
                                            </div>
                                        </div>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero Action Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                    <a href="#services" class="inline-flex items-center justify-center px-7 py-3.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl shadow-lg shadow-green-600/30 transition duration-300">
                        <span>Jelajahi Layanan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </a>
                    <a href="{{ url('/servicestatus') }}" class="inline-flex items-center justify-center px-7 py-3.5 bg-white/10 hover:bg-white/20 text-white border border-white/30 backdrop-blur-md font-semibold rounded-xl transition duration-300">
                        <svg class="w-4 h-4 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span>Cek Status Servis</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(!$statsSec || $statsSec->is_visible)
    <!-- Quick Stats Trust Bar -->
    <div class="bg-white border-b border-gray-200 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 text-center">
                @if($statsItems && count($statsItems) > 0)
                    @foreach($statsItems as $st)
                        <div class="p-3">
                            <div class="text-2xl sm:text-3xl font-extrabold text-green-600">{{ $st['value'] ?? '' }}</div>
                            <div class="text-xs sm:text-sm text-gray-500 font-medium mt-0.5">{{ $st['label'] ?? '' }}</div>
                        </div>
                    @endforeach
                @else
                    <div class="p-3">
                        <div class="text-2xl sm:text-3xl font-extrabold text-green-600">10+ Tahun</div>
                        <div class="text-xs sm:text-sm text-gray-500 font-medium mt-0.5">Pengalaman di Bogor</div>
                    </div>
                    <div class="p-3">
                        <div class="text-2xl sm:text-3xl font-extrabold text-green-600">5.000+</div>
                        <div class="text-xs sm:text-sm text-gray-500 font-medium mt-0.5">Laptop & PC Tertangani</div>
                    </div>
                    <div class="p-3">
                        <div class="text-2xl sm:text-3xl font-extrabold text-green-600">100%</div>
                        <div class="text-xs sm:text-sm text-gray-500 font-medium mt-0.5">Garansi Toko & Distributor</div>
                    </div>
                    <div class="p-3">
                        <div class="text-2xl sm:text-3xl font-extrabold text-green-600">Gratis</div>
                        <div class="text-xs sm:text-sm text-gray-500 font-medium mt-0.5">Pengecekan Awal Unit</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif

    <!-- Kenapa Memilih Kami Component -->
    <div class="bg-gray-50 py-16">
        <x-kenapakami></x-kenapakami>
    </div>

    <!-- Layanan Tabbed Interactive Section -->
    <section id="services" class="py-16 bg-white border-y border-gray-200" x-data="{
        activeTab: 'laptop',
        tabs: {
            laptop: {
                title: 'Laptop & Komputer Pilihan',
                description: 'Pusat penjualan laptop baru & second bergaransi untuk berbagai kebutuhan: editing konten, desain grafis, 3D render, gaming monster, hingga ultrabook tipis untuk kerja dan kuliah harian. Layanan purna jual langsung di Plaza Jambu Dua.',
                url: '/lapcom',
                image: 'img/laptophome.jpg',
                whatsappUrl: 'https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20tanya%20pilihan%20laptop%20atau%20PC.',
                infoUrl: '/lapcom',
                buttonText: {
                    whatsapp: 'Chat WhatsApp Kami',
                    info: 'Lihat Katalog Laptop'
                }
            },
            service: {
                title: 'Servis Laptop & Maintenance IT',
                description: 'Perbaikan motherboard mati total, ganti LCD, engsel patah, pembersihan debu internal, ganti thermal paste, instal ulang OS, hingga kontrak maintenance rutin untuk lab sekolah, kantor, dan bisnis di Kota Bogor.',
                url: '/servmaintenance',
                image: 'img/servicehome.jpg',
                whatsappUrl: 'https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20konsultasi%20servis%20laptop.',
                infoUrl: '/servmaintenance',
                buttonText: {
                    whatsapp: 'Konsultasi Servis Gratis',
                    info: 'Detail Layanan Servis'
                }
            },
            parts: {
                title: 'Part PC, Peripheral & Aksesoris',
                description: 'Sedia sparepart upgrade PC dan laptop lengkap: SSD NVMe super cepat, RAM original, prosesor, kartu grafis, monitor, keyboard mekanikal, mouse gaming, hingga perangkat proteksi UPS dan stabilizer.',
                url: '/pcperipheral',
                image: 'img/partshome.jpg',
                whatsappUrl: 'https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20mau%20tanya%20stok%20sparepart/peripheral.',
                infoUrl: '/pcperipheral',
                buttonText: {
                    whatsapp: 'Tanyakan Stok Part',
                    info: 'Katalog Komponen PC'
                }
            }
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3.5 py-1.5 rounded-full">Layanan Komprehensif</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">
                    Pelayanan Unggulan <span class="text-green-600">BEST COMPUTER</span>
                </h2>
                <p class="text-gray-600 text-sm sm:text-base mt-2 italic">
                    &ldquo;Kami berkomitmen memberikan layanan cepat dan profesional dengan sistem cek status online sehingga Anda dapat memantau progres perbaikan kapan saja.&rdquo;
                </p>
            </div>
    
            <!-- Tab Buttons -->
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-10">
                <button 
                    @click="activeTab = 'laptop'" 
                    :class="activeTab === 'laptop' ? 'bg-green-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition duration-300 inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Laptop & Komputer</span>
                </button>
                <button 
                    @click="activeTab = 'service'" 
                    :class="activeTab === 'service' ? 'bg-green-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition duration-300 inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>Servis & Maintenance</span>
                </button>
                <button 
                    @click="activeTab = 'parts'" 
                    :class="activeTab === 'parts' ? 'bg-green-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition duration-300 inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Part PC & Peripheral</span>
                </button>
            </div>
    
            <!-- Tab Content -->
            <div class="bg-gray-50 rounded-3xl p-6 sm:p-10 border border-gray-200">
                <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
                    <div class="w-full lg:w-1/2">
                        <div class="relative h-64 sm:h-80 md:h-96 w-full rounded-2xl overflow-hidden shadow-lg border border-gray-200">
                            <template x-if="activeTab === 'laptop'">
                                <img src="{{ asset('img/laptophome.jpg') }}" alt="Laptop & Komputer" class="w-full h-full object-cover" />
                            </template>
                            <template x-if="activeTab === 'service'">
                                <img src="{{ asset('img/servicehome.jpg') }}" alt="Service & Maintenance" class="w-full h-full object-cover" />
                            </template>
                            <template x-if="activeTab === 'parts'">
                                <img src="{{ asset('img/partshome.jpg') }}" alt="Part PC & Peripheral" class="w-full h-full object-cover" />
                            </template>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2 flex flex-col justify-between">
                        <div>
                            <span class="text-xs uppercase tracking-widest font-bold text-green-600 mb-2 block">Solusi Terbaik Kami</span>
                            <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-4" x-text="tabs[activeTab].title"></h3>
                            <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-8" x-text="tabs[activeTab].description"></p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                            <a :href="tabs[activeTab].whatsappUrl" target="_blank" class="px-6 py-3 bg-green-600 text-white rounded-xl font-bold text-sm hover:bg-green-700 transition duration-300 flex items-center justify-center gap-2 shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                                </svg>
                                <span x-text="tabs[activeTab].buttonText.whatsapp"></span>
                            </a>
                            <a :href="tabs[activeTab].infoUrl" class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-xl font-bold text-sm hover:bg-gray-100 transition duration-300 text-center">
                                <span x-text="tabs[activeTab].buttonText.info"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cek Status Servis Banner -->
    <div class="py-14 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-emerald-600 to-green-700 rounded-3xl shadow-xl p-8 sm:p-12 text-center text-white max-w-4xl mx-auto">
                <span class="inline-block px-3 py-1 bg-white/20 text-white text-xs font-semibold rounded-full mb-3">Layanan Tracking Mandiri</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold mb-3">Cek Status Servis Laptop Anda</h2>
                <p class="text-green-100 text-sm sm:text-base max-w-2xl mx-auto mb-6">
                    Pantau progres perbaikan perangkat Anda dengan mudah melalui sistem tracking online kami tanpa perlu repot bolak-balik telepon.
                </p>
                <a href="{{ url('/servicestatus') }}" class="inline-flex items-center gap-2 bg-white text-green-700 font-bold px-8 py-3.5 rounded-xl shadow hover:bg-gray-100 transition duration-300">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Cek Status Sekarang</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Final Call to Action (Menggantikan bg-lime-500 yang clashing) -->
    <div class="bg-gray-900 text-white py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="text-center md:text-left">
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Solusi IT Terbaik untuk Segala Kebutuhan Anda
                </h2>
                <p class="text-gray-400 text-sm sm:text-base mt-1">
                    Kunjungi toko kami di Plaza Jambu Dua atau hubungi tim teknisi kami sekarang juga.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center px-7 py-3.5 font-bold rounded-xl text-white bg-green-600 hover:bg-green-700 shadow-lg shadow-green-600/30 transition">
                    Hubungi Kami Hari Ini →
                </a>
            </div>
        </div>
    </div>

    <x-floatingbutton></x-floatingbutton>
    <x-brandlogo></x-brandlogo>
    <x-review></x-review>
    <x-footer></x-footer>
</body>
</html>
