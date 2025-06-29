<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceOrder;
use App\Models\Customer;

class MigrateCustomerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua service order yang belum memiliki customer_id
        $serviceOrders = ServiceOrder::whereNull('customer_id')->get();
        
        foreach ($serviceOrders as $order) {
            // Cari pelanggan berdasarkan nama
            $customer = Customer::where('name', $order->customer_name)->first();
            
            // Jika tidak ditemukan, buat baru
            if (!$customer) {
                $customer = Customer::create([
                    'name' => $order->customer_name,
                ]);
            }
            
            // Update service order dengan customer_id
            $order->update([
                'customer_id' => $customer->id
            ]);
        }
        
        $this->command->info('Migrasi data pelanggan selesai!');
    }
}