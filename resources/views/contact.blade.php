<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Best Computer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    @vite(['resources/css/contact.css'])
</head>
<body class="font-sans">
    
    <x-navbar></x-navbar>
    
    <header class="header-contact">
        <img src="img/bgcontact.jpg" alt="Header background" class="header-background" />
        <div class="header-overlay">
            <h1 class="header-title">Kontak Kami</h1>
            <nav class="header-breadcrumb">
                <a href="{{ url('/') }}" class="breadcrumb-link">Beranda</a>
                <i class="fas fa-chevron-right breadcrumb-separator"></i>
                <span>Kontak</span>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <section>
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-description">
                Silakan hubungi kami menggunakan detail kontak di bawah ini.
            </p>
        </section>
        
        <section class="maps-container">
            <iframe
                class="maps-iframe"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen=""
                src="https://maps.google.com/maps?q=-6.56923,106.80796&z=18&output=embed"
                title="Lokasi Best Computer di Plaza Jambu Dua, Bogor">
            </iframe>
        </section>

        <section class="contact-cards">
            <div class="contact-card">
                <i class="fas fa-phone-alt contact-icon"></i>
                <div>
                    <p class="contact-label">Telepon / WhatsApp</p>
                    <a href="https://wa.me/6285693801996" target="_blank" class="contact-value hover:underline">+62 856-9380-1996</a>
                </div>
            </div>
            <div class="contact-card">
                <i class="fas fa-envelope contact-icon"></i>
                <div>
                    <p class="contact-label">Email</p>
                    <a href="mailto:bestcomputerpjd@gmail.com" class="contact-value hover:underline">bestcomputerpjd@gmail.com</a>
                </div>
            </div>
            <div class="contact-card">
                <i class="fas fa-map-marker-alt contact-icon"></i>
                <div>
                    <p class="contact-label">Alamat</p>
                    <p class="contact-value">Plaza Jambu Dua, Kota Bogor</p>
                    <a href="https://maps.app.goo.gl/gSRHZz7t5LJeXPHQ9" target="_blank" class="gmaps-link hover:no-underline">Lihat di Google Maps</a>
                </div>
            </div>
        </section>
    </main>
    
    <x-floatingbutton></x-floatingbutton>
    <x-footer></x-footer>
</body>
</html>