<?php
// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Migrasi yang ingin ditandai sebagai sudah dijalankan
$migrations = [
    '2025_05_06_081851_create_products_table'
];

// Tentukan batch (biasanya menggunakan batch+1 dari yang sudah ada)
$batch = (DB::table('migrations')->max('batch') ?? 0) + 1;

// Tandai setiap migrasi
foreach ($migrations as $migration) {
    // Periksa apakah migrasi sudah tercatat
    $exists = DB::table('migrations')->where('migration', $migration)->exists();
    
    if (!$exists) {
        // Tambahkan ke tabel migrations
        DB::table('migrations')->insert([
            'migration' => $migration,
            'batch' => $batch
        ]);
        echo "Migrasi $migration ditandai sebagai sudah dijalankan pada batch $batch.\n";
    } else {
        echo "Migrasi $migration sudah tercatat sebelumnya.\n";
    }
}

echo "Selesai.\n";