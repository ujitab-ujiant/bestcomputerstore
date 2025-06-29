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
            { title: 'Laptop Editing & Desain Grafis', category: 'Laptop & Komputer', url: '/lapcom', icon: '💻' },
            { title: 'Laptop 3D Rendering', category: 'Laptop & Komputer', url: '/lapcom', icon: '💻' },
            { title: 'Laptop Gaming & Live Stream', category: 'Laptop & Komputer', url: '/lapcom', icon: '🎮' },
            { title: 'Laptop Ringan Slim', category: 'Laptop & Komputer', url: '/lapcom', icon: '💼' },
            { title: 'PC Gaming Custom', category: 'Laptop & Komputer', url: '/lapcom', icon: '🖥️' },

            { title: 'Perbaikan Hardware', category: 'Service & Maintenance', url: '/servmaintenance', icon: '🔧' },
            { title: 'Perbaikan Software', category: 'Service & Maintenance', url: '/servmaintenance', icon: '💾' },
            { title: 'Upgrade Komponen', category: 'Service & Maintenance', url: '/servmaintenance', icon: '⚡' },
            { title: 'Perawatan Berkala', category: 'Service & Maintenance', url: '/servmaintenance', icon: '🔄' },
            { title: 'Backup & Recovery Data', category: 'Service & Maintenance', url: '/servmaintenance', icon: '💿' },
            { title: 'Konsultasi Teknis', category: 'Service & Maintenance', url: '/servmaintenance', icon: '💬' },
            { title: 'Service di Rumah', category: 'Service & Maintenance', url: '/servmaintenance', icon: '🏠' },
            { title: 'Maintenance Kantor', category: 'Service & Maintenance', url: '/servmaintenance', icon: '🏢' },

            { title: 'Cek Status Servis', category: 'Layanan Servis', url: '/servicestatus', icon: '📊' },
            { title: 'Status Perbaikan', category: 'Layanan Servis', url: '/servicestatus', icon: '⏳' },
            { title: 'Progress Servis', category: 'Layanan Servis', url: '/servicestatus', icon: '📈' },
            { title: 'Tracking Repair', category: 'Layanan Servis', url: '/servicestatus', icon: '🔍' },

            { title: 'Komponen PC & Laptop', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '🎯' },
            { title: 'Peripheral & Aksesoris', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '⌨️' },
            { title: 'Perangkat Keamanan PC', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '🔒' },
            { title: 'Processor Intel/AMD', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '⚡' },
            { title: 'VGA Gaming RTX', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '🎮' },
            { title: 'RAM DDR4', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '💾' },
            { title: 'SSD NVMe', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '💾' },
            { title: 'UPS & Stabilizer', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '🔋' },
            { title: 'Keyboard Gaming Mechanical', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '⌨️' },
            { title: 'Mouse Gaming Professional', category: 'Part PC & Peripheral', url: '/pcperipheral', icon: '🖱️' },

            { title: 'Tentang Perusahaan', category: 'Informasi', url: '/about', icon: 'ℹ️' },
            { title: 'FAQ - Pertanyaan Umum', category: 'Bantuan', url: '/help', icon: '❓' },
            { title: 'Kontak & Alamat Toko', category: 'Kontak', url: '/contact', icon: '📞' }
        ],

        get filteredSuggestions() {
            if (!this.searchQuery) return [];
            
            const query = this.searchQuery.toLowerCase();
            return this.searchSuggestions.filter(item => 
                item.title.toLowerCase().includes(query) || 
                item.category.toLowerCase().includes(query)
            ).slice(0, 8);
        },

        init() {
            console.log('Search component initialized');
        },

        handleSearch() {
            this.selectedIndex = -1;
            this.showSuggestions = this.searchQuery.length > 0;
        },

        navigateSuggestions(direction) {
            const suggestions = this.filteredSuggestions;
            if (suggestions.length === 0) return;

            if (direction === 'down') {
                this.selectedIndex = this.selectedIndex < suggestions.length - 1 
                    ? this.selectedIndex + 1 
                    : 0;
            } else {
                this.selectedIndex = this.selectedIndex > 0 
                    ? this.selectedIndex - 1 
                    : suggestions.length - 1;
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
            const whatsappUrl = `https://wa.me/6285693801996?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        },

        hideSuggestions() {
            setTimeout(() => {
                this.showSuggestions = false;
                this.selectedIndex = -1;
            }, 200);
        },

        handleKeydown(event) {
            switch(event.key) {
                case 'ArrowDown':
                    event.preventDefault();
                    this.navigateSuggestions('down');
                    break;
                case 'ArrowUp':
                    event.preventDefault();
                    this.navigateSuggestions('up');
                    break;
                case 'Enter':
                    event.preventDefault();
                    this.selectSuggestion();
                    break;
                case 'Escape':
                    this.showSuggestions = false;
                    this.selectedIndex = -1;
                    break;
            }
        },

        clearSearch() {
            this.searchQuery = '';
            this.showSuggestions = false;
            this.selectedIndex = -1;
        }
    }
};

document.addEventListener('DOMContentLoaded', function() {
    if (typeof Alpine !== 'undefined') {
        console.log('AlpineJS is loaded');
    } else {
        console.warn('AlpineJS is not loaded yet');
    }

    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const headerOffset = 80; 
                const elementPosition = targetElement.offsetTop;
                const offsetPosition = elementPosition - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

                history.pushState(null, null, targetId);
            }
        });
    });

    if (window.location.hash) {
        setTimeout(() => {
            const targetElement = document.querySelector(window.location.hash);
            if (targetElement) {
                const headerOffset = 80;
                const elementPosition = targetElement.offsetTop;
                const offsetPosition = elementPosition - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        }, 100);
    }

    const scrollToTopBtn = document.getElementById('scrollToTop');
    if (scrollToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });

        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    const lazyImages = document.querySelectorAll('img[data-src]');
    if (lazyImages.length > 0) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));
    }

    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                    field.style.borderColor = '#ef4444';
                } else {
                    field.classList.remove('error');
                    field.style.borderColor = '';
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi.');
            }
        });

        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            field.addEventListener('blur', function() {
                if (!this.value.trim()) {
                    this.classList.add('error');
                    this.style.borderColor = '#ef4444';
                } else {
                    this.classList.remove('error');
                    this.style.borderColor = '';
                }
            });

            field.addEventListener('input', function() {
                if (this.classList.contains('error') && this.value.trim()) {
                    this.classList.remove('error');
                    this.style.borderColor = '';
                }
            });
        });
    });

    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            const icon = this.querySelector('svg');
            if (icon) {
                icon.classList.toggle('rotate-90');
            }
        });

        document.addEventListener('click', function(e) {
            if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    }

    window.showToast = function(message, type = 'info', duration = 3000) {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type} fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300`;
        
        const colors = {
            'success': 'bg-green-500 text-white',
            'error': 'bg-red-500 text-white',
            'warning': 'bg-yellow-500 text-black',
            'info': 'bg-blue-500 text-white'
        };
        
        toast.className += ` ${colors[type] || colors.info}`;
        toast.textContent = message;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 100);
        
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }, duration);
    };

    window.showLoading = function() {
        const loading = document.getElementById('loadingOverlay');
        if (loading) {
            loading.classList.remove('hidden');
        }
    };

    window.hideLoading = function() {
        const loading = document.getElementById('loadingOverlay');
        if (loading) {
            loading.classList.add('hidden');
        }
    };

    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/sw.js')
                .then(function(registration) {
                    console.log('ServiceWorker registration successful');
                })
                .catch(function(error) {
                    console.log('ServiceWorker registration failed');
                });
        });
    }
});

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

window.addEventListener('load', function() {
    if (window.performance && window.performance.timing) {
        const timing = window.performance.timing;
        const loadTime = timing.loadEventEnd - timing.navigationStart;
        console.log('Page load time:', loadTime + 'ms');
    }
});