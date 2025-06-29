document.addEventListener('DOMContentLoaded', function() {
    console.log('Initializing Swiper carousels...'); 
    setTimeout(() => {
        const commonConfig = {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: false, 
            watchOverflow: true,
            observer: true,
            observeParents: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                480: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 24,
                }
            },
        };

        const swiperConfigs = [
            {
                element: '.featured-products-swiper',
                delay: 3000,
                color: '#3B82F6', // blue
                name: 'Featured Products'
            },
            {
                element: '.pc-components-swiper',
                delay: 3500,
                color: '#3B82F6', // blue
                name: 'PC Components'
            },
            {
                element: '.peripherals-swiper',
                delay: 4000,
                color: '#9333EA', // purple
                name: 'Peripherals'
            },
            {
                element: '.security-products-swiper',
                delay: 4500,
                color: '#22C55E', // green
                name: 'Security Products'
            }
        ];

        swiperConfigs.forEach((config, index) => {
            const swiperContainer = document.querySelector(config.element);
            
            if (swiperContainer) {
                console.log(`Initializing ${config.name} swiper...`);

                const paginationEl = swiperContainer.querySelector('.swiper-pagination');
                const nextEl = swiperContainer.querySelector('.swiper-button-next');
                const prevEl = swiperContainer.querySelector('.swiper-button-prev');

                const swiperConfig = {
                    ...commonConfig,
                    autoplay: {
                        ...commonConfig.autoplay,
                        delay: config.delay,
                    },
                    pagination: paginationEl ? {
                        el: paginationEl,
                        clickable: true,
                        dynamicBullets: true,
                    } : false,
                    navigation: (nextEl && prevEl) ? {
                        nextEl: nextEl,
                        prevEl: prevEl,
                    } : false,
                };

                try {
                    const swiper = new Swiper(swiperContainer, swiperConfig);

                    swiperContainer.addEventListener('mouseenter', () => {
                        if (swiper.autoplay) {
                            swiper.autoplay.stop();
                        }
                    });
                    
                    swiperContainer.addEventListener('mouseleave', () => {
                        if (swiper.autoplay) {
                            swiper.autoplay.start();
                        }
                    });

                    if (nextEl && prevEl) {
                        nextEl.style.setProperty('--swiper-theme-color', config.color);
                        prevEl.style.setProperty('--swiper-theme-color', config.color);
                        nextEl.style.color = config.color;
                        prevEl.style.color = config.color;

                        const customHoverStyle = `
                            .swiper-button-next:hover,
                            .swiper-button-prev:hover {
                                background-color: rgba(0, 0, 0, 0.1) !important;
                                color: ${config.color} !important;
                                opacity: 0.8 !important;
                            }
                            .swiper-button-next:hover:after,
                            .swiper-button-prev:hover:after {
                                color: white !important;
                            }
                        `;

                        if (!document.getElementById('swiper-custom-styles')) {
                            const styleSheet = document.createElement('style');
                            styleSheet.id = 'swiper-custom-styles';
                            styleSheet.textContent = `
                                /* Custom Swiper Navigation Button Styles */
                                .swiper-button-next,
                                .swiper-button-prev {
                                    width: 44px !important;
                                    height: 44px !important;
                                    margin-top: -22px !important;
                                    background-color: rgba(255, 255, 255, 0.9) !important;
                                    border-radius: 50% !important;
                                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
                                    transition: all 0.3s ease !important;
                                }
                                
                                .swiper-button-next:hover,
                                .swiper-button-prev:hover {
                                    background-color: rgba(0, 0, 0, 0.8) !important;
                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25) !important;
                                    transform: scale(1.05) !important;
                                }
                                
                                .swiper-button-next:hover:after,
                                .swiper-button-prev:hover:after {
                                    color: white !important;
                                }
                                
                                .swiper-button-next:after,
                                .swiper-button-prev:after {
                                    font-size: 18px !important;
                                    font-weight: bold !important;
                                }
                                
                                /* Disabled state */
                                .swiper-button-disabled {
                                    opacity: 0.3 !important;
                                    cursor: not-allowed !important;
                                }
                                
                                .swiper-button-disabled:hover {
                                    background-color: rgba(255, 255, 255, 0.9) !important;
                                    transform: none !important;
                                }
                                
                                .swiper-button-disabled:hover:after {
                                    color: var(--swiper-theme-color) !important;
                                }
                            `;
                            document.head.appendChild(styleSheet);
                        }
                    }

                    if (paginationEl) {
                        paginationEl.style.setProperty('--swiper-theme-color', config.color);
                    }

                    console.log(`${config.name} swiper initialized successfully`);
                    
                } catch (error) {
                    console.error(`Error initializing ${config.name} swiper:`, error);
                }
            } else {
                console.warn(`Swiper container not found: ${config.element}`);
            }
        });

        const katalogButton = document.querySelector('a[href="#part-pc"]');
        if (katalogButton) {
            katalogButton.addEventListener('click', function(e) {
                e.preventDefault();
                const targetSection = document.getElementById('part-pc');
                if (targetSection) {
                    targetSection.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        }

        console.log('All Swipers and smooth scrolling initialized successfully');
        
    }, 100); 
});

window.addEventListener('load', function() {
    setTimeout(() => {
        const swiperElements = document.querySelectorAll('.swiper');
        swiperElements.forEach(element => {
            if (element.swiper) {
                element.swiper.update();
            }
        });
    }, 200);
});