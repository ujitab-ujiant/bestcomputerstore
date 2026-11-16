<style>
.btn-green {
    background-color: #287f3b;
    color: white;
    transition: 0.3s ease;
}

.btn-green:hover {
    background-color: #1f6a31; /* versi gelap */
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    position: absolute;
    background-color: #f9f9f9;
    min-width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1000;
    border-radius: 0.375rem;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    /* Menambahkan padding untuk area hover yang lebih besar */
    padding-top: 8px;
    margin-top: -8px;
    pointer-events: none;
}

/* State ketika dropdown aktif */
.dropdown-content.show,
.dropdown:hover .dropdown-content {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    pointer-events: auto;
}

/* Untuk hover yang lebih smooth */
.dropdown-content:hover {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    pointer-events: auto;
}

/* Menambahkan area "jembatan" invisible antara trigger dan dropdown */
.dropdown::before {
    content: '';
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    height: 8px;
    z-index: 999;
}

.dropdown-item {
    color: #4B5563;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s, color 0.3s;
}

.dropdown-item:hover {
    background-color: #f0fdf4;
    color: #16a34a; /* green-600 */
}

/* Regular nav items */
.nav-item {
    transition: color 0.3s, background-color 0.3s;
    padding: 0.5rem 1rem;
    border-radius: 9999px; 
}

.nav-item:hover {
    color: #16a34a; /* green-600 */
    background-color: white;
}

.dropdown > .nav-item:hover {
    color: #16a34a; /* green-600 */
    background-color: white;
}

.nav-btn {
    transition: all 0.3s ease;
}

/* State saat Navbar Transparan (Hero Beranda) */
#navbar:not(.sticky-nav) .nav-btn {
    color: #ffffff;
}

#navbar:not(.sticky-nav) .nav-btn:hover {
    background-color: rgba(255, 255, 255, 0.2);
    color: #ffffff !important;
}

#navbar:not(.sticky-nav) .active-nav-btn {
    background-color: #ffffff;
    color: #16a34a !important; 
    font-weight: 700;
}

#navbar:not(.sticky-nav) .mobile-menu-button svg {
    stroke: #ffffff;
}

/* State saat Navbar Sticky / Solid (Semua Halaman Lain & Saat Beranda di-scroll) */
#navbar.sticky-nav {
    background-color: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(12px);
    box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.08);
    border-bottom: 1px solid rgba(229, 231, 235, 0.8);
}

#navbar.sticky-nav .nav-btn {
    color: #374151; /* gray-700 */
}

#navbar.sticky-nav .nav-btn:hover {
    color: #16a34a !important; 
    background-color: #f0fdf4; 
}

#navbar.sticky-nav .active-nav-btn {
    background-color: #16a34a; 
    color: #ffffff !important;
    font-weight: 700;
}

#navbar.sticky-nav .mobile-menu-button svg {
    stroke: #1f2937; 
}

.dropdown .dropdown-content {
    top: 100%;
    margin-top: 0.5rem;
}

#navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 50;
    transition: all 0.3s ease;
    background-color: transparent; 
}

#navbar .dropdown-content {
    top: 100%;
}

.mobile-menu {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(15, 23, 42, 0.95);
    backdrop-filter: blur(12px);
    z-index: 100;
    overflow-y: auto;
    padding: 2rem 1rem;
}

.mobile-menu.active {
    display: block;
}

.mobile-dropdown-content {
    display: none;
    flex-direction: column;
    align-items: center !important;
    justify-content: center !important;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
    text-align: center !important;
    width: 100%;
}

.mobile-dropdown-content.show {
    display: flex !important;
    max-height: 300px;
    transition: max-height 0.3s ease-in;
}

.mobile-dropdown-content a {
    text-align: center !important;
    width: 100% !important;
    display: block !important;
    margin-left: auto !important;
    margin-right: auto !important;
}

.mobile-menu-button svg {
    stroke: white;
    transition: stroke 0.3s ease;
}

#navbar.sticky-nav .mobile-menu-button svg {
    stroke: #1f2937; 
}

.mobile-menu-button:hover svg {
    stroke: #16a34a; 
}

@media (max-width: 768px) {
    .hidden-mobile {
        display: none;
    }
    
    .block-mobile {
        display: block;
    }
    
    .mobile-menu-button {
        display: block;
    }
}

@media (min-width: 769px) {
    .mobile-menu-button {
        display: none;
    }
}
</style>
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
                <button class="mobile-dropdown-toggle text-white px-3 py-2 text-lg font-medium w-full text-center flex justify-center items-center {{ request()->is('lapcom') || request()->is('servmaintenance') || request()->is('pcperipheral') || request()->is('servicestatus*') ? 'bg-green-600' : '' }}">
                    Layanan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="mobile-dropdown-content hidden py-2 px-4 space-y-2 text-center" style="text-align: center !important;">
                    <a href="{{ url('/lapcom') }}" class="text-gray-300 hover:text-white py-1 block text-center w-full {{ request()->is('lapcom') ? 'text-white font-bold' : '' }}" style="text-align: center !important;">Laptop & Komputer</a>
                    <a href="{{ url('/servmaintenance') }}" class="text-gray-300 hover:text-white py-1 block text-center w-full {{ request()->is('servmaintenance') ? 'text-white font-bold' : '' }}" style="text-align: center !important;">Servis & Maintenance</a>
                    <a href="{{ url('/pcperipheral') }}" class="text-gray-300 hover:text-white py-1 block text-center w-full {{ request()->is('pcperipheral') ? 'text-white font-bold' : '' }}" style="text-align: center !important;">Part PC & Peripheral</a>
                    <a href="{{ url('/servicestatus') }}" class="text-gray-300 hover:text-white py-1 block text-center w-full {{ request()->is('servicestatus*') ? 'text-white font-bold' : '' }}" style="text-align: center !important;">Lacak Status Servis</a>
                </div>
            </div>
        </div>
        <a href="{{ url('/about') }}" class="text-white px-3 py-2 text-lg font-medium {{ request()->is('about') ? 'bg-green-600' : '' }}">Tentang Kami</a>             
        <a href="{{ url('/help') }}" class="text-white px-3 py-2 text-lg font-medium {{ request()->is('help') ? 'bg-green-600' : '' }}">Bantuan</a>
        <a href="{{ url('/contact') }}" class="text-white px-3 py-2 text-lg font-medium {{ request()->is('contact') ? 'bg-green-600' : '' }}">Kontak</a>
        <div class="mt-6">
            <a href="/login"
                class="btn-green font-medium py-2 px-6 rounded-full {{ request()->is('login') ? 'ring-2 ring-white' : '' }}">
                    Login
                </a>
        </div>
    </div>
</div>

<nav id="navbar" class="w-full z-50 {{ !request()->is('/') ? 'sticky-nav' : '' }}">
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
                    <a href="{{ url('/') }}" class="px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('/') ? 'active-nav-btn' : '' }}">Beranda</a>

                    <div class="dropdown">
                        <button type="button" class="px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('lapcom') || request()->is('servmaintenance') || request()->is('pcperipheral') || request()->is('servicestatus*') ? 'active-nav-btn' : '' }}">
                            Layanan 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        
                        <div class="dropdown-content">
                            <a href="{{ url('/lapcom') }}" class="dropdown-item {{ request()->is('lapcom') ? 'bg-green-50 text-green-600 font-semibold' : '' }}">Laptop & Komputer</a>
                            <a href="{{ url('/servmaintenance') }}" class="dropdown-item {{ request()->is('servmaintenance') ? 'bg-green-50 text-green-600 font-semibold' : '' }}">Servis & Maintenance</a>
                            <a href="{{ url('/pcperipheral') }}" class="dropdown-item {{ request()->is('pcperipheral') ? 'bg-green-50 text-green-600 font-semibold' : '' }}">Part PC & Peripheral</a>
                            <a href="{{ url('/servicestatus') }}" class="dropdown-item {{ request()->is('servicestatus*') ? 'bg-green-50 text-green-600 font-semibold' : '' }}">Lacak Status Servis</a>
                        </div>
                    </div>
                    
                    <a href="{{ url('/about') }}" class="px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('about') ? 'active-nav-btn' : '' }}">Tentang Kami</a>
                    <a href="{{ url('/help') }}" class="px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('help') ? 'active-nav-btn' : '' }}">Bantuan</a>
                    <a href="{{ url('/contact') }}" class="px-4 py-2 rounded-full text-sm font-medium nav-btn {{ request()->is('contact') ? 'active-nav-btn' : '' }}">Kontak</a>
                </div>
            </div>
            
            <div class="flex items-center">
                <a href="/login" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-full transition duration-300 hidden md:inline-block {{ request()->is('login') ? 'ring-2 ring-white' : '' }}">
                    Login
                </a>
                <button id="mobileMenuButton" class="md:hidden ml-4 mobile-menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const isHomePage = {{ request()->is('/') ? 'true' : 'false' }};
    const navbar = document.getElementById('navbar');

    if (isHomePage) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('sticky-nav');
            } else {
                navbar.classList.remove('sticky-nav');
            }
        });
    } else {
        navbar.classList.add('sticky-nav');
    }

    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const closeMobileMenu = document.getElementById('closeMobileMenu');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    closeMobileMenu.addEventListener('click', function() {
        mobileMenu.classList.remove('active');
        document.body.style.overflow = 'auto';
    });

    const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
    
    mobileDropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const dropdownContent = this.nextElementSibling;
            dropdownContent.classList.toggle('show');
        });
    });

    const dropdowns = document.querySelectorAll('.dropdown');
    
    dropdowns.forEach(dropdown => {
        const dropdownTrigger = dropdown.querySelector('a'); 
        const dropdownContent = dropdown.querySelector('.dropdown-content');
        let hoverTimeout;
        let isOpen = false;

        function showDropdown() {
            clearTimeout(hoverTimeout);
            dropdownContent.classList.add('show');
            isOpen = true;
        }

        function hideDropdown() {
            hoverTimeout = setTimeout(() => {
                dropdownContent.classList.remove('show');
                isOpen = false;
            }, 250); 
        }

        dropdown.addEventListener('mouseenter', () => {
            showDropdown();
        });

        dropdown.addEventListener('mouseleave', () => {
            hideDropdown();
        });

        if (dropdownTrigger) {
            dropdownTrigger.addEventListener('click', (e) => {
                if (isOpen && dropdownTrigger.getAttribute('href') !== '#') {
                    return true;
                }

                if (!isOpen) {
                    e.preventDefault();
                    showDropdown();
                }
            });
        }

        if (dropdownContent) {
            dropdownContent.addEventListener('mouseenter', () => {
                clearTimeout(hoverTimeout);
            });

            dropdownContent.addEventListener('mouseleave', () => {
                hideDropdown();
            });
        }
    });

    document.addEventListener('click', function(event) {
        dropdowns.forEach(dropdown => {
            const dropdownContent = dropdown.querySelector('.dropdown-content');
            if (!dropdown.contains(event.target)) {
                if (dropdownContent) {
                    dropdownContent.classList.remove('show');
                }
            }
        });
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            dropdowns.forEach(dropdown => {
                const dropdownContent = dropdown.querySelector('.dropdown-content');
                if (dropdownContent) {
                    dropdownContent.classList.remove('show');
                }
            });
        }
    });
});
</script>