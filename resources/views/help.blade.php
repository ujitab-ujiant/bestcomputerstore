<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Bantuan & FAQ - Best Computer Bogor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/help.css', 'resources/js/help.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <x-navbar></x-navbar>

    @php
        $heroSec = isset($page) ? $page->getSection('hero') : null;
        $heroContent = $heroSec?->content ?? [];
        $faqSec = isset($page) ? $page->getSection('faqs') : null;
        $faqItems = $faqSec?->content['items'] ?? null;
    @endphp

    @if(!$heroSec || $heroSec->is_visible)
    <!-- Hero Header -->
    <header class="relative pt-28 pb-16 md:pt-36 md:pb-24 bg-gray-900 text-white overflow-hidden" style="background-image: url('{{ asset('img/bghelp.jpg') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/65 to-black/85 z-0"></div>
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-green-500/20 border border-green-400/40 text-green-300 text-xs sm:text-sm font-medium mb-4 backdrop-blur-sm">
                <svg class="w-4 h-4 text-green-600 inline me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg> 
                {{ $heroContent['badge'] ?? 'Pusat Informasi & Solusi Cepat' }}
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight mb-3">
                {{ $heroContent['title'] ?? 'Pusat Bantuan & FAQ' }}
            </h1>
            <p class="text-gray-300 text-sm sm:text-base max-w-2xl mx-auto mb-6">
                {{ $heroContent['subtitle'] ?? 'Temukan jawaban seputar layanan servis, garansi, pembelian produk, pelacakan resi, hingga kerjasama maintenance.' }}
            </p>
            <nav class="flex justify-center items-center gap-2 text-xs sm:text-sm text-gray-400">
                <a href="{{ url('/') }}" class="hover:text-green-400 transition">Beranda</a>
                <span>/</span>
                <span class="text-white font-medium">Bantuan</span>
            </nav>
        </div>
    </header>
    @endif

    <main class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs uppercase tracking-widest font-bold text-green-600 bg-green-50 px-3.5 py-1.5 rounded-full">Pertanyaan Populer</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-3">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-gray-600 text-sm mt-2">
                    Klik pada pertanyaan untuk melihat detail penjelasan dari tim kami.
                </p>
            </div>

            <!-- FAQ List Accordion -->
            <div class="space-y-4 mb-16">
                @if($faqItems && count($faqItems) > 0)
                    @foreach($faqItems as $idx => $faq)
                        <div class="faq-item bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:border-green-300">
                            <button class="faq-question w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-gray-900 hover:text-green-600 transition">
                                <span class="faq-question-text">{{ $faq['question'] ?? '' }}</span>
                                <span class="faq-toggle-icon w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 transition-transform flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </span>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content px-5 pb-5 sm:px-6 sm:pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                                    {!! nl2br(e($faq['answer'] ?? '')) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <!-- FAQ 1 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:border-green-300">
                    <button class="faq-question w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-gray-900 hover:text-green-600 transition">
                        <span class="faq-question-text">Apa saja layanan utama di Best Computer?</span>
                        <span class="faq-toggle-icon w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 transition-transform flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content px-5 pb-5 sm:px-6 sm:pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                            Best Computer menyediakan empat pilar layanan:
                            <ul class="list-disc pl-5 mt-2 space-y-1.5 text-gray-700">
                                <li><strong>Servis Laptop & Komputer:</strong> Perbaikan motherboard, mati total, ganti LCD, engsel, baterai, keyboard, dan instal ulang OS.</li>
                                <li><strong>Penjualan Laptop & PC:</strong> Unit laptop baru bergaransi distributor resmi dan laptop second berkualitas teruji.</li>
                                <li><strong>Jasa Rakit PC Custom:</strong> Perakitan PC editing, gaming, maupun PC kantor sesuai budget.</li>
                                <li><strong>Maintenance Instansi:</strong> Kontrak pemeliharaan rutin untuk lab sekolah, kampus, dan kantor di wilayah Bogor.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:border-green-300">
                    <button class="faq-question w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-gray-900 hover:text-green-600 transition">
                        <span class="faq-question-text">Apakah ada biaya untuk pengecekan awal kerusakan?</span>
                        <span class="faq-toggle-icon w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 transition-transform flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content px-5 pb-5 sm:px-6 sm:pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                            <strong>Tidak ada biaya alias 100% GRATIS!</strong> Anda bisa membawa perangkat ke toko kami di Plaza Jambu Dua untuk diagnosa awal. Kami akan menjelaskan sumber masalah dan estimasi biaya. Biaya hanya dikenakan jika Anda menyetujui perbaikan tersebut.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:border-green-300">
                    <button class="faq-question w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-gray-900 hover:text-green-600 transition">
                        <span class="faq-question-text">Bagaimana cara cek status servis laptop saya secara online?</span>
                        <span class="faq-toggle-icon w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 transition-transform flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content px-5 pb-5 sm:px-6 sm:pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                            Setiap unit yang diservis di Best Computer akan mendapatkan <strong>Kode Servis unik</strong> pada nota penerimaan. Anda cukup membuka menu <a href="{{ url('/servicestatus') }}" class="text-green-600 font-bold underline">Cek Status Servis</a> di website kami dan memasukkan kode tersebut untuk melihat tahapan perbaikan secara real-time.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:border-green-300">
                    <button class="faq-question w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-gray-900 hover:text-green-600 transition">
                        <span class="faq-question-text">Berapa lama waktu pengerjaan servis laptop?</span>
                        <span class="faq-toggle-icon w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 transition-transform flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content px-5 pb-5 sm:px-6 sm:pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                            Layanan ringan seperti <em>instal ulang OS, ganti SSD/RAM, deep cleaning & ganti thermal paste</em> umumnya bisa <strong>ditunggu dalam waktu 30–90 menit</strong>. Untuk perbaikan tingkat komponen motherboard atau pergantian part khusus membutuhkan waktu antara <strong>1–3 hari kerja</strong>.
                        </div>
                    </div>
                </div>
                @endif

                <!-- FAQ 5 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:border-green-300">
                    <button class="faq-question w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-gray-900 hover:text-green-600 transition">
                        <span class="faq-question-text">Apakah ada garansi untuk servis dan suku cadang?</span>
                        <span class="faq-toggle-icon w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 transition-transform flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content px-5 pb-5 sm:px-6 sm:pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                            <strong>Pasti Bergaransi!</strong> Setiap pengerjaan servis hardware mendapatkan garansi toko. Untuk sparepart baru (SSD, RAM, keyboard, baterai, LCD), garansi berlaku sesuai ketentuan distributor resmi mulai dari 1 bulan hingga 3 tahun (untuk SSD/RAM).
                        </div>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:border-green-300">
                    <button class="faq-question w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-gray-900 hover:text-green-600 transition">
                        <span class="faq-question-text">Di mana alamat toko Best Computer dan kapan jam bukanya?</span>
                        <span class="faq-toggle-icon w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 transition-transform flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content px-5 pb-5 sm:px-6 sm:pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                            Toko kami beralamat di <strong>Plaza Jambu Dua Lantai Semi Dasar, Jl. A. Yani No.10, Kota Bogor</strong>. Toko buka <strong>setiap hari dari pukul 10.00 hingga 21.00 WIB</strong> (termasuk hari Sabtu dan Minggu).
                        </div>
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:border-green-300">
                    <button class="faq-question w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-gray-900 hover:text-green-600 transition">
                        <span class="faq-question-text">Apakah Best Computer menerima servis panggilan ke rumah atau kantor?</span>
                        <span class="faq-toggle-icon w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 transition-transform flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content px-5 pb-5 sm:px-6 sm:pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                            Ya, kami melayani <strong>Servis Panggilan (On-Site Service)</strong> untuk wilayah Kota dan Kabupaten Bogor. Hubungi WhatsApp kami untuk mengatur jadwal kunjungan teknisi ke lokasi Anda.
                        </div>
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="faq-item bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:border-green-300">
                    <button class="faq-question w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-gray-900 hover:text-green-600 transition">
                        <span class="faq-question-text">Bagaimana jika saya kehilangan nomor nota / kode servis?</span>
                        <span class="faq-toggle-icon w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 transition-transform flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content px-5 pb-5 sm:px-6 sm:pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                            Jangan khawatir, hubungi admin WhatsApp kami dengan menyebutkan <em>Nama Pemilik, Nomor HP yang terdaftar saat servis, dan Tipe Unit Laptop</em>. Tim kami akan memvalidasi data dan mengirimkan kode servis Anda kembali.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Still Need Help Box -->
            <div class="bg-gradient-to-r from-emerald-600 to-green-700 text-white rounded-3xl p-8 sm:p-10 shadow-xl text-center">
                <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center mx-auto mb-4 border border-white/20">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
                <h3 class="text-2xl font-extrabold mb-2">Pertanyaan Anda Belum Terjawab?</h3>
                <p class="text-green-100 text-sm sm:text-base max-w-xl mx-auto mb-6">
                    Customer service dan teknisi kami siap menjawab pertanyaan seputar masalah laptop, konsultasi part, atau penawaran harga via WhatsApp.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="https://wa.me/6285693801996" target="_blank" class="w-full sm:w-auto px-7 py-3.5 bg-white text-green-700 hover:bg-green-50 font-bold rounded-xl shadow transition text-sm flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        <span>Chat WhatsApp Kami</span>
                    </a>
                    <a href="{{ url('/contact') }}" class="w-full sm:w-auto px-6 py-3.5 bg-green-800/60 hover:bg-green-800 text-white font-semibold rounded-xl border border-white/20 transition text-sm">
                        <span>Lihat Lokasi & Info Kontak</span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <x-floatingbutton></x-floatingbutton>
    <x-footer></x-footer>
</body>
</html>
