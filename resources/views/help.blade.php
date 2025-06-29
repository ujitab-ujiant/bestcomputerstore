<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan - Best Computer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    @vite(['resources/css/help.css', 'resources/js/help.js'])
</head>
<body class="font-sans">
    <x-navbar></x-navbar>
    <header class="header-help">
        <img src="img/bghelp.jpg" alt="Header background" class="header-background" />
        <div class="header-overlay">
            <h1 class="header-title">Bantuan</h1>
            <nav class="header-breadcrumb">
                <a href="{{ url('/') }}" class="breadcrumb-link">Beranda</a>
                <i class="fas fa-chevron-right breadcrumb-separator"></i>
                <span>Bantuan</span>
            </nav>
        </div>
    </header>
    <main>
        <div class="faq-container">
            <h2 class="faq-title">Pertanyaan yang sering ditanyakan</h2>
            <div class="faq-list">

                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Apa itu Best Computer?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Best Computer adalah toko layanan penjualan dan perbaikan komputer, laptop, serta aksesoris pendukungnya. Kami juga melayani servis dan maintenance baik di toko maupun kunjungan ke instansi seperti sekolah dan kantor.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Di mana lokasi toko Best Computer?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Toko kami berlokasi di Plaza Jambu Dua Lantai Semi Dasar, Jl. A. Yani No.10, RT.01/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat. Toko buka setiap hari dari pukul 10.00–21.00 WIB.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Layanan apa saja yang tersedia di Best Computer?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Kami menyediakan:<br>
                            • Penjualan komputer, laptop, dan aksesoris<br>
                            • Jasa servis/perbaikan komputer/laptop<br>
                            • Kunjungan teknisi untuk maintenance instansi<br>
                            • Penjualan part PC dan peripheral
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Berapa lama waktu pengerjaan servis laptop atau komputer?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Waktu pengerjaan tergantung pada jenis kerusakan dan ketersediaan sparepart. Umumnya memakan waktu antara 1–5 hari kerja. Estimasi waktu akan diinformasikan saat unit diterima.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Apakah saya bisa cek status servis laptop saya secara online?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Ya, Anda bisa mengecek status perbaikan laptop Anda menggunakan kode servis unik yang diberikan saat mendaftar servis. Cukup masukkan kode tersebut di halaman "Cek Status Servis" di website kami.
                        </div>
                    </div>
                </div>
  
                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Apakah tersedia garansi untuk servis?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Ya. Kami memberikan garansi servis sesuai jenis perbaikannya. Detail garansi akan dijelaskan saat penyerahan kembali unit yang telah diperbaiki.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Apakah ada biaya pengecekan kerusakan?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Untuk pengecekan awal, kami tidak mengenakan biaya. Biaya hanya akan dikenakan apabila Anda menyetujui perbaikan yang kami sarankan.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Apakah saya akan diberi tahu sebelum servis dilakukan?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Ya. Setelah pengecekan, kami akan menghubungi Anda untuk mengonfirmasi estimasi biaya dan waktu servis sebelum pekerjaan dilakukan.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Bagaimana jika saya lupa kode servis?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Silakan hubungi kami dengan data lengkap (nama, tanggal servis, dan jenis unit). Kami akan bantu mencarikan kode servis Anda.
                        </div>
                    </div>
                </div>      
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Apakah status servis saya akan dihapus jika tidak diambil dalam waktu lama?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Kami menyimpan unit maksimal selama 30 hari setelah perbaikan selesai. Lewat dari itu, kami tidak bertanggung jawab atas kehilangan atau kerusakan.
                        </div>
                    </div>
                </div>
       
                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Apakah Best Computer menerima kerjasama instansi untuk maintenance rutin?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Tentu. Kami menerima kerjasama rutin untuk layanan maintenance komputer di instansi seperti sekolah, kantor, atau lembaga lainnya. Hubungi kami untuk penawaran khusus.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span class="faq-question-text">Apakah saya bisa minta invoice/nota digital?</span>
                        <span class="faq-toggle-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Ya, kami menyediakan nota/invoice dalam bentuk digital maupun cetak sesuai permintaan pelanggan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
             
        <div class="max-w-5xl mx-auto px-4 mb-16">
            <div class="support-section">
                <h3 class="support-title">Masih membutuhkan bantuan?</h3>
                <p class="support-text">Tim customer service kami siap membantu Anda dengan pertanyaan khusus atau masalah yang Anda hadapi. Jangan ragu untuk menghubungi kami.</p>
                <a href="{{ url('/contact') }}" class="support-button">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </main>
    <x-floatingbutton></x-floatingbutton>
    <x-footer></x-footer>
</body>
</html>