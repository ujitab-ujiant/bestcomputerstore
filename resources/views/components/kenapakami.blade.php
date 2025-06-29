<div id="whyUs" class="w-[86%] max-w-7xl mx-auto bg-white rounded-lg shadow-lg py-12 px-6 transition-all duration-500">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Mengapa <span class="text-green-600">BEST COMPUTER</span> ?</h2>
        <p class="mt-2 text-lg text-gray-600">
            <span class="font-semibold text-green-600">BEST COMPUTER</span> selalu menyediakan Layanan & Solusi Terbaik untuk Laptop & PC Anda!
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        <div class="bg-white rounded-lg p-6 text-center border border-gray-100 shadow-sm transform transition-transform duration-300 hover:-translate-y-1">
            <div class="flex justify-center mb-4">
                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
            </div>
            <h3 class="font-bold text-lg text-green-600">Transparansi</h3>
            <p class="mt-2 text-gray-600 text-sm">
                Harga dan proses servis dijelaskan secara jelas, tanpa biaya tersembunyi
            </p>
        </div>

        <div class="bg-white rounded-lg p-6 text-center border border-gray-100 shadow-sm transform transition-transform duration-300 hover:-translate-y-1">
            <div class="flex justify-center mb-4">
                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>
            <h3 class="font-bold text-lg text-green-600">Berbagai Part yang Lengkap</h3>
            <p class="mt-2 text-gray-600 text-sm">
                Tersedia berbagai komponen original untuk upgrade dan perbaikan
            </p>
        </div>

        <div class="bg-white rounded-lg p-6 text-center border border-gray-100 shadow-sm transform transition-transform duration-300 hover:-translate-y-1">
            <div class="flex justify-center mb-4">
                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
            <h3 class="font-bold text-lg text-green-600">Pelayanan yang Terbaik</h3>
            <p class="mt-2 text-gray-600 text-sm">
                Layanan cepat dan profesional dengan sistem cek status repair untuk servis
            </p>
        </div>

        <div class="bg-white rounded-lg p-6 text-center border border-gray-100 shadow-sm transform transition-transform duration-300 hover:-translate-y-1">
            <div class="flex justify-center mb-4">
                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <h3 class="font-bold text-lg text-green-600">Harga yang Terjangkau</h3>
            <p class="mt-2 text-gray-600 text-sm">
                Produk dan layanan berkualitas dengan harga bersaing
            </p>
        </div>
    </div>
</div>

<style>
    .why-us-container {
        width: 86%;
        max-width: 1400px;
        margin: 0 auto;
        transition: all 0.5s ease;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const whyUsContainer = document.getElementById('whyUs');

        window.addEventListener('scroll', function() {
            if (whyUsContainer) {
                if (window.scrollY > (whyUsContainer.offsetTop - 100)) {
                    whyUsContainer.classList.remove('why-us-container');
                    whyUsContainer.classList.add('max-w-7xl', 'mx-auto');
                } else {
                    whyUsContainer.classList.add('why-us-container');
                    whyUsContainer.classList.remove('max-w-7xl', 'mx-auto');
                }
            }
        });
    });
</script>