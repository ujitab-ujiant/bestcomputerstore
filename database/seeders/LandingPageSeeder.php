<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use App\Models\LandingPageSection;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    public function run(): void
    {
        // 1. HOME PAGE
        $home = LandingPage::updateOrCreate(
            ['slug' => 'home'],
            ['title' => 'Beranda', 'order' => 1]
        );

        $homeSections = [
            [
                'section_key' => 'hero',
                'type' => 'text',
                'order' => 1,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Pusat Penjualan & Servis Komputer Terbaik di Plaza Jambu Dua Bogor',
                    'title' => 'Solusi Lengkap IT, Laptop & Komputer Terpercaya di Bogor',
                    'subtitle' => 'Penyedia laptop baru & second bergaransi, rakit PC gaming/kantor, sparepart original, serta jasa servis profesional dengan teknisi berpengalaman.',
                    'cta_primary_text' => 'Cek Status Servis',
                    'cta_primary_url' => '/servicestatus',
                    'cta_secondary_text' => 'Konsultasi WhatsApp',
                    'cta_secondary_url' => 'https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20ingin%20konsultasi%20perangkat%20saya',
                ],
            ],
            [
                'section_key' => 'stats',
                'type' => 'list',
                'order' => 2,
                'is_visible' => true,
                'content' => [
                    'items' => [
                        ['value' => '5,000+', 'label' => 'Pelanggan Puas'],
                        ['value' => '10+ Tahun', 'label' => 'Pengalaman IT'],
                        ['value' => '15 Menit', 'label' => 'Diagnosa Awal Cepat'],
                        ['value' => '100%', 'label' => 'Garansi Transparan'],
                    ],
                ],
            ],
            [
                'section_key' => 'features',
                'type' => 'list',
                'order' => 3,
                'is_visible' => true,
                'content' => [
                    'header' => [
                        'badge' => 'Mengapa Memilih Kami',
                        'title' => 'Standar Pelayanan Terbaik untuk Anda',
                        'subtitle' => 'Komitmen kami memberikan solusi terbaik tanpa biaya tersembunyi.',
                    ],
                    'items' => [
                        ['title' => 'Teknisi Berpengalaman', 'description' => 'Didukung teknisi handal dan bersertifikasi yang siap menangani beragam kerusakan hardware & software.'],
                        ['title' => 'Garansi Nyata & Jelas', 'description' => 'Setiap pengerjaan dan pergantian sparepart dilindungi garansi resmi toko yang mudah diklaim.'],
                        ['title' => 'Sparepart Berkualitas', 'description' => 'Menggunakan komponen original & berstandar tinggi demi performa dan ketahanan maksimal.'],
                        ['title' => 'Transparansi Biaya', 'description' => 'Estimasi dan diagnosa dikonfirmasikan sebelum pengerjaan dimulai, tanpa biaya siluman.'],
                    ],
                ],
            ],
            [
                'section_key' => 'cta',
                'type' => 'text',
                'order' => 4,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Butuh Bantuan Cepat?',
                    'title' => 'Konsultasikan Masalah Perangkat Anda Sekarang',
                    'subtitle' => 'Tim teknisi kami siap membantu diagnosa dan memberikan solusi terbaik sesuai kebutuhan dan budget Anda.',
                    'button_text' => 'Hubungi via WhatsApp',
                    'button_url' => 'https://wa.me/6285693801996?text=Halo%20Best%20Computer,%20saya%20butuh%20bantuan%20servis',
                ],
            ],
        ];

        foreach ($homeSections as $sec) {
            LandingPageSection::updateOrCreate(
                ['landing_page_id' => $home->id, 'section_key' => $sec['section_key']],
                $sec
            );
        }

        // 2. SERVICEMAINTENANCE PAGE
        $serv = LandingPage::updateOrCreate(
            ['slug' => 'servmaintenance'],
            ['title' => 'Layanan Servis & Maintenance', 'order' => 2]
        );

        $servSections = [
            [
                'section_key' => 'hero',
                'type' => 'text',
                'order' => 1,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Layanan Servis Profesional',
                    'title' => 'Servis Laptop & Perawatan IT Terbaik di Bogor',
                    'subtitle' => 'Solusi tepat dan transparan untuk laptop mati total, ganti LCD, upgrade SSD/RAM, maintenance PC kantor, hingga instalasi sistem operasi.',
                ],
            ],
            [
                'section_key' => 'services_list',
                'type' => 'list',
                'order' => 2,
                'is_visible' => true,
                'content' => [
                    'items' => [
                        ['title' => 'Perbaikan Hardware & Mesin', 'description' => 'Perbaikan motherboard mati total, reball chipset, no display, korsleting daya, dan masalah sirkuit.'],
                        ['title' => 'Ganti Layar LCD / LED', 'description' => 'Penggantian panel layar retak, bergaris, blank putih/hitam dengan suku cadang original bergaransi.'],
                        ['title' => 'Upgrade RAM & SSD High Speed', 'description' => 'Tingkatkan performa laptop & PC lama Anda hingga 10x lebih cepat dengan SSD NVMe & RAM original.'],
                        ['title' => 'Ganti Keyboard & Baterai', 'description' => 'Penggantian keyboard tombol macet, baterai drop, kembung, touchpad bermasalah dengan garansi resmi.'],
                        ['title' => 'Pembersihan Thermal & Fan', 'description' => 'Cleaning debu menyeluruh dan penggantian thermal paste premium untuk mengatasi laptop panas (overheat).'],
                        ['title' => 'Maintenance IT & Jaringan Kantor', 'description' => 'Kontrak perawatan berkala PC kantor, setup LAN/WiFi, sharing printer, dan backup data aman.'],
                    ],
                ],
            ],
            [
                'section_key' => 'workflow',
                'type' => 'list',
                'order' => 3,
                'is_visible' => true,
                'content' => [
                    'header' => [
                        'badge' => 'Alur Pengerjaan',
                        'title' => '4 Langkah Mudah Servis di Best Computer',
                    ],
                    'items' => [
                        ['step' => '01', 'title' => 'Bawa & Konsultasi', 'description' => 'Bawa perangkat Anda ke toko kami di Plaza Jambu Dua Bogor atau hubungi via WhatsApp.'],
                        ['step' => '02', 'title' => 'Diagnosa & Estimasi', 'description' => 'Teknisi melakukan pengecekan dan memberikan rincian biaya sebelum pekerjaan dimulai.'],
                        ['step' => '03', 'title' => 'Pengerjaan Cepat', 'description' => 'Perbaikan dilakukan dengan cermat menggunakan peralatan standar industri.'],
                        ['step' => '04', 'title' => 'Uji Fungsi & Garansi', 'description' => 'Perangkat dites menyeluruh sebelum diserahkan lengkap dengan nota dan masa garansi resmi.'],
                    ],
                ],
            ],
        ];

        foreach ($servSections as $sec) {
            LandingPageSection::updateOrCreate(
                ['landing_page_id' => $serv->id, 'section_key' => $sec['section_key']],
                $sec
            );
        }

        // 3. ABOUT PAGE
        $about = LandingPage::updateOrCreate(
            ['slug' => 'about'],
            ['title' => 'Tentang Kami', 'order' => 3]
        );

        $aboutSections = [
            [
                'section_key' => 'hero',
                'type' => 'text',
                'order' => 1,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Profil Perusahaan',
                    'title' => 'Mengenal Lebih Dekat Best Computer',
                    'subtitle' => 'Mitra terpercaya kebutuhan teknologi, hardware, dan perbaikan komputer di Kota Bogor sejak lebih dari satu dekade.',
                ],
            ],
            [
                'section_key' => 'story',
                'type' => 'text',
                'order' => 2,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Cerita Kami',
                    'title' => 'Berkomitmen Memberikan Solusi Teknologi Terbaik',
                    'paragraph1' => 'Berlokasi strategis di pusat IT Kota Bogor, Plaza Jambu Dua, Best Computer didirikan dengan tekad menyediakan layanan jual beli komputer dan jasa perbaikan yang jujur, transparan, dan dapat diandalkan.',
                    'paragraph2' => 'Kami percaya bahwa perangkat komputer dan laptop adalah instrumen vital bagi produktivitas, pendidikan, dan bisnis Anda. Oleh karena itu, kepuasan dan ketenangan pikiran pelanggan adalah prioritas utama kami.',
                ],
            ],
            [
                'section_key' => 'values',
                'type' => 'list',
                'order' => 3,
                'is_visible' => true,
                'content' => [
                    'header' => [
                        'badge' => 'Prinsip Kerja',
                        'title' => 'Nilai Pelayanan Kami',
                    ],
                    'items' => [
                        ['title' => 'Transparansi Penuh', 'description' => 'Konfirmasi biaya di awal tanpa biaya siluman.'],
                        ['title' => 'Keamanan Data', 'description' => 'Menjaga kerahasiaan file pribadi pelanggan 100% aman.'],
                        ['title' => 'Garansi Nyata', 'description' => 'Garansi purna jual yang mudah diklaim tanpa berbelit.'],
                        ['title' => 'Pelayanan Ramah', 'description' => 'Selalu siap memberikan solusi terbaik sesuai kebutuhan dan budget.'],
                    ],
                ],
            ],
        ];

        foreach ($aboutSections as $sec) {
            LandingPageSection::updateOrCreate(
                ['landing_page_id' => $about->id, 'section_key' => $sec['section_key']],
                $sec
            );
        }

        // 4. CONTACT PAGE
        $contact = LandingPage::updateOrCreate(
            ['slug' => 'contact'],
            ['title' => 'Kontak & Lokasi', 'order' => 4]
        );

        $contactSections = [
            [
                'section_key' => 'hero',
                'type' => 'text',
                'order' => 1,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Hubungi Kami',
                    'title' => 'Kami Siap Membantu Kebutuhan Anda',
                    'subtitle' => 'Kunjungi gerai kami di Plaza Jambu Dua atau hubungi tim customer support kami melalui kontak resmi di bawah ini.',
                ],
            ],
            [
                'section_key' => 'info',
                'type' => 'text',
                'order' => 2,
                'is_visible' => true,
                'content' => [
                    'store_name' => 'Best Computer Bogor',
                    'address' => 'Plaza Jambu Dua Lt. Semi Dasar Blok B No. 12-14, Jl. A. Yani No.1, Bantarjati, Kota Bogor, Jawa Barat 16153',
                    'store_hours' => 'Buka Setiap Hari: 10.00 - 21.00 WIB',
                    'phone' => '0856-9380-1996',
                    'whatsapp' => '085693801996',
                    'email' => 'support@bestcomputerstore.test',
                    'maps_link' => 'https://maps.google.com/?q=Plaza+Jambu+Dua+Bogor',
                ],
            ],
        ];

        foreach ($contactSections as $sec) {
            LandingPageSection::updateOrCreate(
                ['landing_page_id' => $contact->id, 'section_key' => $sec['section_key']],
                $sec
            );
        }

        // 5. HELP PAGE
        $help = LandingPage::updateOrCreate(
            ['slug' => 'help'],
            ['title' => 'Pusat Bantuan & FAQ', 'order' => 5]
        );

        $helpSections = [
            [
                'section_key' => 'hero',
                'type' => 'text',
                'order' => 1,
                'is_visible' => true,
                'content' => [
                    'badge' => 'Pusat Bantuan',
                    'title' => 'Pertanyaan yang Sering Diajukan',
                    'subtitle' => 'Temukan jawaban cepat seputar proses servis, garansi, pembelian suku cadang, dan klaim garansi.',
                ],
            ],
            [
                'section_key' => 'faqs',
                'type' => 'list',
                'order' => 2,
                'is_visible' => true,
                'content' => [
                    'items' => [
                        ['question' => 'Berapa lama proses diagnosa awal laptop yang rusak?', 'answer' => 'Diagnosa awal biasanya memakan waktu 15 - 30 menit saat Anda datang ke toko. Jika kerusakan memerlukan analisa komponen motherboard mendalam, kami akan memberikan estimasi 1-2 hari kerja.'],
                        ['question' => 'Bagaimana cara mengecek status pengerjaan servis saya?', 'answer' => 'Anda dapat memasukkan nomor kode servis (contoh: SVC-ABC123) pada menu Lacak Status Perbaikan di website, atau masuk ke dashboard akun Pelanggan Anda.'],
                        ['question' => 'Apakah ada garansi setelah perbaikan selesai?', 'answer' => 'Ya, setiap perbaikan dan penggantian sparepart dilindungi masa garansi toko (sesuai kesepakatan nota fisik). Garansi dapat diklaim langsung dari portal akun Anda.'],
                        ['question' => 'Apakah data di laptop saya aman saat diservis?', 'answer' => 'Kami menjamin keamanan dan kerahasiaan data pribadi pelanggan 100%. Teknisi kami tidak akan membuka file pribadi tanpa izin atau keperluan diagnosa khusus.'],
                    ],
                ],
            ],
        ];

        foreach ($helpSections as $sec) {
            LandingPageSection::updateOrCreate(
                ['landing_page_id' => $help->id, 'section_key' => $sec['section_key']],
                $sec
            );
        }
    }
}
