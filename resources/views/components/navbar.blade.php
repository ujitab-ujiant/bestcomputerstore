@vite(['resources/css/components/navbar.css', 'resources/js/components/navbar.js'])

<div id="mobileMenu" class="mobile-menu">
    <div class="flex justify-end">
        <button id="closeMobileMenu" class="text-white p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div class="flex flex-col items-center mt-10 space-y-4">
        <a href="{{ url('/') }}" class="text-white px-3 py-2 text-lg font-medium {{ request()->is('/') ? 'bg-green-600' : '' }}">Beranda</a>
        <div class="w-full">
            <div class="mobile-dropdown py-2">
                <button class="mobile-dropdown-toggle text-white px-3 py-2 text-lg font-medium w-full text-center flex justify-center items-center {{ request()->is('lapcom') || request()->is('servmaintenance') || request()->is('pcperipheral') || request()->is('servicestatus') ? 'bg-green-600' : '' }}">
                    Layanan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="mobile-dropdown-content hidden py-2 px-4 space-y-2">
                    <a href="{{ url('/lapcom') }}" class="text-gray-300 hover:text-white py-1 block {{ request()->is('lapcom') ? 'text-white font-bold' : '' }}">Laptop & Komputer</a>
                    <a href="{{ url('/servmaintenance') }}" class="text-gray-300 hover:text-white py-1 block {{ request()->is('servmaintenance') ? 'text-white font-bold' : '' }}">Servis & Maintenance</a>
                    <a href="{{ url('/pcperipheral') }}" class="text-gray-300 hover:text-white py-1 block {{ request()->is('pcperipheral') ? 'text-white font-bold' : '' }}">Part PC & Peripheral</a>
                </div>
            </div>
        </div>
        <a href="{{ url('/about') }}" class="text-white px-3 py-2 text-lg font-medium {{ request()->is('about') ? 'bg-green-600' : '' }}">Tentang Kami</a>             
        <a href="{{ url('/help') }}" class="text-white px-3 py-2 text-lg font-medium {{ request()->is('help') ? 'bg-green-600' : '' }}">Bantuan</a>
        <a href="{{ url('/contact') }}" class="text-white px-3 py-2 text-lg font-medium {{ request()->is('contact') ? 'bg-green-600' : '' }}">Kontak</a>
        <div class="mt-6">
            <a href="/login" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-full transition duration-300 {{ request()->is('login') ? 'ring-2 ring-white' : '' }}">
                Login
            </a>
        </div>
    </div>
</div>

<nav id="navbar" class="w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="65">
                    </a>
                </div>
            </div>
            
            <div class="hidden md:block">
                <div class="ml-10 flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="text-white px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('/') ? 'active-nav-btn' : '' }}">Beranda</a>

                    <div class="dropdown">
                        <button type="button" class="text-white px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('lapcom') || request()->is('servmaintenance') || request()->is('pcperipheral') || request()->is('servicestatus') ? 'active-nav-btn' : '' }}">
                            Layanan 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        
                        <div class="dropdown-content">
                            <a href="{{ url('/lapcom') }}" class="dropdown-item {{ request()->is('lapcom') ? 'bg-green-50 text-green-600 font-semibold' : '' }}">Laptop & Komputer</a>
                            <a href="{{ url('/servmaintenance') }}" class="dropdown-item {{ request()->is('servmaintenance') ? 'bg-green-50 text-green-600 font-semibold' : '' }}">Servis & Maintenance</a>
                            <a href="{{ url('/pcperipheral') }}" class="dropdown-item {{ request()->is('pcperipheral') ? 'bg-green-50 text-green-600 font-semibold' : '' }}">Part PC & Peripheral</a>
                        </div>
                    </div>
                    
                    <a href="{{ url('/about') }}" class="text-white px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('about') ? 'active-nav-btn' : '' }}">Tentang Kami</a>
                    <a href="{{ url('/help') }}" class="text-white px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('help') ? 'active-nav-btn' : '' }}">Bantuan</a>
                    <a href="{{ url('/contact') }}" class="text-white px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('contact') ? 'active-nav-btn' : '' }}">Kontak</a>
                </div>
            </div>
            
            <div class="flex items-center">
                <a href="/login" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-full transition duration-300 hidden md:inline-block {{ request()->is('login') ? 'ring-2 ring-white' : '' }}">
                    Login
                </a>
                <button id="mobileMenuButton" class="md:hidden text-white ml-4 mobile-menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>