<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Method lainnya tetap sama...

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'category' => 'required|string|max:100',
            'subcategory' => 'nullable|string|max:100',
            'brand' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'marketplace_shopee' => 'nullable|url',
            'marketplace_tokopedia' => 'nullable|url',
            'sku' => 'nullable|string|max:50',
            'code' => 'nullable|string|max:50',
            'weight' => 'nullable|numeric',
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();

            // Untuk cPanel: simpan langsung ke public_html/img/products
            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/img/products/';
            
            // Buat folder jika belum ada
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $image->move($destinationPath, $imageName);
            $validated['image'] = $imageName;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'category' => 'required|string|max:100',
            'subcategory' => 'nullable|string|max:100',
            'brand' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'marketplace_shopee' => 'nullable|url',
            'marketplace_tokopedia' => 'nullable|url',
            'sku' => 'nullable|string|max:50',
            'code' => 'nullable|string|max:50',
            'weight' => 'nullable|numeric',
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($product->image) {
                $oldImagePath = $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $product->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $image = $request->file('image');
            $imageName = time() . '-' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            
            // Untuk cPanel: simpan langsung ke public_html/img/products
            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/img/products/';
            
            // Buat folder jika belum ada
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $image->move($destinationPath, $imageName);
            $validated['image'] = $imageName;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    //jangan lupa command Cron Jobs ln -s /home/user_cpanel/public_html/public/img/products /home/user_cpanel/public_html/img/products
}