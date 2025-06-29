<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use App\Models\Product;

Artisan::command('images:check', function () {
    $this->info('Checking product image paths...');

    $publicImgPath = public_path('img/products');
    if (!File::exists($publicImgPath)) {
        $this->error("Folder tidak ditemukan: {$publicImgPath}");
        $this->info("Membuat folder...");
        File::makeDirectory($publicImgPath, 0755, true);
    } else {
        $this->info("Folder ditemukan: {$publicImgPath}");

        if (is_link($publicImgPath)) {
            $this->info("Folder adalah symlink yang mengarah ke: " . readlink($publicImgPath));
        } else {
            $this->info("Folder adalah direktori biasa (bukan symlink)");
        }
    }

    $storageImgPath = storage_path('app/public/img/products');
    if (!File::exists($storageImgPath)) {
        $this->error("Folder tidak ditemukan: {$storageImgPath}");
    } else {
        $this->info("Folder ditemukan: {$storageImgPath}");
    }

    $storageLink = public_path('storage');
    if (!File::exists($storageLink)) {
        $this->error("Symlink storage tidak ditemukan: {$storageLink}");
    } else {
        $this->info("Symlink storage ditemukan: {$storageLink}");
        if (is_link($storageLink)) {
            $this->info("Symlink mengarah ke: " . readlink($storageLink));
        } else {
            $this->error("Path storage bukan symlink!");
        }
    }

    $products = Product::all();
    $this->info("Memeriksa {$products->count()} produk...");
    
    $missingImages = 0;
    
    foreach ($products as $product) {
        if (!$product->image) {
            $this->warn("Produk ID {$product->id} ({$product->name}) tidak memiliki gambar");
            continue;
        }
        
        $publicPath = public_path('img/products/' . $product->image);
        $storagePath = storage_path('app/public/img/products/' . $product->image);
        
        $publicExists = File::exists($publicPath);
        $storageExists = File::exists($storagePath);
        
        if (!$publicExists && !$storageExists) {
            $this->error("Gambar tidak ditemukan untuk produk ID {$product->id} ({$product->name}): {$product->image}");
            $missingImages++;
        } elseif ($publicExists && !$storageExists) {
            $this->info("Gambar hanya ada di public untuk produk ID {$product->id}: {$product->image}");
        } elseif (!$publicExists && $storageExists) {
            $this->info("Gambar hanya ada di storage untuk produk ID {$product->id}: {$product->image}");
        } else {
            $this->info("Gambar ditemukan di kedua lokasi untuk produk ID {$product->id}: {$product->image}");
        }
    }
    
    if ($missingImages > 0) {
        $this->warn("{$missingImages} gambar tidak ditemukan");
    } else {
        $this->info("Semua gambar produk ditemukan!");
    }
})->purpose('Check if product images exist in the correct paths');

Artisan::command('images:fix', function () {
    $this->info('Memperbaiki gambar produk...');

    $publicImgPath = public_path('img/products');
    $storageImgPath = storage_path('app/public/img/products');
    
    if (!File::exists($publicImgPath)) {
        $this->info("Membuat folder {$publicImgPath}");
        File::makeDirectory($publicImgPath, 0755, true);
    }
    
    if (!File::exists($storageImgPath)) {
        $this->info("Membuat folder {$storageImgPath}");
        File::makeDirectory($storageImgPath, 0755, true);
    }

    $isSymlink = is_link($publicImgPath);
    if ($isSymlink) {
        $this->info("public/img/products adalah symlink yang mengarah ke: " . readlink($publicImgPath));
        $this->info("Tidak perlu menyalin file karena symlink sudah ada");
        return;
    }

    $products = Product::all();
    $this->info("Memeriksa {$products->count()} produk...");
    
    $fixed = 0;
    
    foreach ($products as $product) {
        if (!$product->image) {
            $this->warn("Produk ID {$product->id} ({$product->name}) tidak memiliki gambar");
            continue;
        }
        
        $publicPath = public_path('img/products/' . $product->image);
        $storagePath = storage_path('app/public/img/products/' . $product->image);
        
        $publicExists = File::exists($publicPath);
        $storageExists = File::exists($storagePath);
        
        if (!$publicExists && $storageExists) {
            $this->info("Menyalin gambar dari storage ke public untuk produk ID {$product->id}: {$product->image}");
            File::copy($storagePath, $publicPath);
            $fixed++;
        } elseif ($publicExists && !$storageExists) {
            $this->info("Menyalin gambar dari public ke storage untuk produk ID {$product->id}: {$product->image}");
            File::copy($publicPath, $storagePath);
            $fixed++;
        } elseif (!$publicExists && !$storageExists) {
            $this->error("Gambar tidak ditemukan untuk produk ID {$product->id}: {$product->image}");
        } else {
            $this->info("Gambar sudah ada di kedua lokasi untuk produk ID {$product->id}: {$product->image}");
        }
    }
    
    $this->info("Selesai! {$fixed} gambar diperbaiki.");
})->purpose('Fix product images by copying from storage to public or vice versa');