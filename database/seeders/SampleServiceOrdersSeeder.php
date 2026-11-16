<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\ServiceOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SampleServiceOrdersSeeder extends Seeder
{
    public function run(): void
    {
        $technician = User::where('role', 'teknisi')->first();
        $techId = $technician?->id;

        $samples = [
            [
                'service_code' => 'SVC-202611-001',
                'customer_name' => 'Budi Santoso',
                'customer_phone' => '081234567890',
                'laptop_name' => 'Asus ROG Strix G513',
                'laptop_type' => 'Laptop Gaming',
                'problem_description' => 'Layar sering flicker dan kipas pendingin bersuara keras serta suhu panas mencapai 95C saat main game.',
                'service_note' => 'Deep cleaning debu fan, ganti liquid metal thermal paste, dan perbaikan konektor display eDP.',
                'price' => 750000,
                'status' => 'completed',
                'technician_id' => $techId,
                'warranty_duration_days' => 30,
                'warranty_start_date' => Carbon::now()->subDays(2),
                'warranty_note' => 'Garansi fan, thermal repaste, dan fleksibel display 30 hari toko.',
                'created_at' => Carbon::now()->subDays(5),
            ],
            [
                'service_code' => 'SVC-202611-002',
                'customer_name' => 'Siti Rahmawati',
                'customer_phone' => '085712345678',
                'laptop_name' => 'Lenovo ThinkPad T480',
                'laptop_type' => 'Laptop Bisnis',
                'problem_description' => 'Baterai drop drastis dari 100% langsung mati dalam 10 menit, tombol Spasi dan Enter macet tidak merespons.',
                'service_note' => 'Menunggu pesanan sparepart keyboard original ThinkPad T480 dan baterai internal OEM tiba dari distributor.',
                'price' => 650000,
                'status' => 'process',
                'technician_id' => $techId,
                'warranty_duration_days' => 30,
                'warranty_start_date' => null,
                'warranty_note' => 'Garansi penggantian keyboard dan baterai 1 bulan.',
                'created_at' => Carbon::now()->subDays(3),
            ],
            [
                'service_code' => 'SVC-202611-003',
                'customer_name' => 'Ahmad Fauzi',
                'customer_phone' => '081398765432',
                'laptop_name' => 'MacBook Air M1 2020',
                'laptop_type' => 'Ultrabook Apple',
                'problem_description' => 'Tidak bisa masuk ke sistem macOS, stuck pada logo Apple berputar lalu restart terus menerus (boot loop).',
                'service_note' => null,
                'price' => 1200000,
                'status' => 'pending',
                'technician_id' => null,
                'warranty_duration_days' => 60,
                'warranty_start_date' => null,
                'warranty_note' => 'Garansi pengerjaan logic board dan restore firmware 60 hari.',
                'created_at' => Carbon::now()->subHours(8),
            ],
            [
                'service_code' => 'SVC-202611-004',
                'customer_name' => 'Dewi Lestari',
                'customer_phone' => '082187654321',
                'laptop_name' => 'Acer Swift 3 Infinity 4',
                'laptop_type' => 'Laptop Slim',
                'problem_description' => 'Layar LCD pecah retak bagian pojok kiri atas akibat tertindih beban buku di ransel kuliah.',
                'service_note' => 'Selesai penggantian panel LCD IPS Full HD Slim 30 pin original bergaransi.',
                'price' => 1100000,
                'status' => 'completed',
                'technician_id' => $techId,
                'warranty_duration_days' => 14,
                'warranty_start_date' => Carbon::now()->subDays(25), // EXPIRED warranty
                'warranty_note' => 'Garansi pengetesan layar LCD 14 hari toko (sudah habis).',
                'created_at' => Carbon::now()->subDays(30),
            ],
            [
                'service_code' => 'SVC-202611-005',
                'customer_name' => 'Rian Hidayat',
                'customer_phone' => '087811223344',
                'laptop_name' => 'PC Rakitan Core i7 12700 + RTX 3060',
                'laptop_type' => 'Desktop PC Gaming',
                'problem_description' => 'Mati total saat ada petir kencang, lampu indikator motherboard tidak menyala sama sekali.',
                'service_note' => 'Diagnosa awal: PSU korslet. Sedang dites penggantian PSU 650W 80+ Bronze dan pengecekan jalur VRM motherboard.',
                'price' => 950000,
                'status' => 'process',
                'technician_id' => $techId,
                'warranty_duration_days' => 90,
                'warranty_start_date' => null,
                'warranty_note' => 'Garansi unit power supply baru 90 hari.',
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'service_code' => 'SVC-202611-006',
                'customer_name' => 'Mega Permata',
                'customer_phone' => '089655443322',
                'laptop_name' => 'HP Pavilion 14',
                'laptop_type' => 'Laptop Mahasiswa / Kantor',
                'problem_description' => 'Laptop sangat lemot karena masih pakai harddisk lama. Ingin upgrade SSD NVMe 512GB dan tambah RAM 8GB serta install ulang Windows 11.',
                'service_note' => 'SSD NVMe Kingston 512GB & RAM DDR4 8GB terpasang, instalasi Windows 11 Pro original dan aplikasi standar selesai diuji benchmark lancar.',
                'price' => 850000,
                'status' => 'completed',
                'technician_id' => $techId,
                'warranty_duration_days' => 30,
                'warranty_start_date' => Carbon::now()->subDays(1), // ACTIVE warranty
                'warranty_note' => 'Garansi hardware SSD & RAM 1 tahun distributor resmi, garansi instalasi OS 30 hari.',
                'created_at' => Carbon::now()->subDays(3),
            ],
            [
                'service_code' => 'SVC-202611-007',
                'customer_name' => 'Hendro Wijaya',
                'customer_phone' => '081299887766',
                'laptop_name' => 'Dell XPS 13 9310',
                'laptop_type' => 'Premium Ultrabook',
                'problem_description' => 'Terkena tumpahan air kopi di atas keyboard saat rapat kantor, laptop langsung mati seketika.',
                'service_note' => 'Korosi parah pada jalur power IC 19V dan chipset CPU onboard korsleting. Biaya perbaikan melampaui persetujuan pelanggan, servis dibatalkan dan unit dirakit kembali.',
                'price' => 0,
                'status' => 'cancelled',
                'technician_id' => $techId,
                'warranty_duration_days' => 0,
                'warranty_start_date' => null,
                'warranty_note' => 'Dibatalkan oleh pelanggan (biaya di luar budget).',
                'created_at' => Carbon::now()->subDays(4),
            ],
            [
                'service_code' => 'SVC-202611-008',
                'customer_name' => 'Citra Kirana',
                'customer_phone' => '085244332211',
                'laptop_name' => 'Asus Vivobook 14 A416',
                'laptop_type' => 'Laptop Pelajar',
                'problem_description' => 'Engsel laptop sebelah kiri patah dan baut dudukan casing jebol sehingga layar tidak bisa dibuka-tutup dengan aman.',
                'service_note' => null,
                'price' => 350000,
                'status' => 'pending',
                'technician_id' => null,
                'warranty_duration_days' => 15,
                'warranty_start_date' => null,
                'warranty_note' => 'Garansi perbaikan dudukan engsel resin 15 hari.',
                'created_at' => Carbon::now()->subHours(3),
            ],
        ];

        foreach ($samples as $data) {
            // Find or create customer
            $phoneNorm = Customer::normalizePhone($data['customer_phone']);
            $customerUser = User::findOrCreateByPhone(
                $data['customer_phone'],
                $data['customer_name']
            );

            // Also create or update customer record in customers table
            $customer = Customer::updateOrCreate(
                ['phone' => $phoneNorm],
                [
                    'name' => $data['customer_name'],
                    'phone' => $phoneNorm,
                    'email' => $customerUser->email,
                    'address' => 'Kota Bogor, Jawa Barat',
                ]
            );

            ServiceOrder::updateOrCreate(
                ['service_code' => $data['service_code']],
                [
                    'service_code' => $data['service_code'],
                    'customer_id' => $customer->id,
                    'user_id' => $customerUser->id,
                    'customer_name' => $data['customer_name'],
                    'customer_phone' => $phoneNorm,
                    'laptop_name' => $data['laptop_name'],
                    'laptop_type' => $data['laptop_type'],
                    'problem_description' => $data['problem_description'],
                    'service_note' => $data['service_note'],
                    'price' => $data['price'],
                    'status' => $data['status'],
                    'technician_id' => $data['technician_id'],
                    'warranty_duration_days' => $data['warranty_duration_days'],
                    'warranty_start_date' => $data['warranty_start_date'],
                    'warranty_note' => $data['warranty_note'],
                    'created_at' => $data['created_at'],
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
