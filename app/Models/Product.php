<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'short_description',
        'price',
        'discounted_price',
        'category',
        'subcategory',
        'brand',
        'image',
        'marketplace_shopee',
        'marketplace_tokopedia',
        'sku',
        'code',
        'weight',
        'status',
        'featured',
        'created_by',
        'updated_by',
    ];
    
    protected $appends = ['image_url'];
    
    public static function getByCategory($category)
    {
        return self::where('category', $category)
                   ->where('status', 'active')
                   ->get();
    }
    
    public static function getFeatured()
    {
        return self::where('featured', true)
                   ->where('status', 'active')
                   ->get();
    }
    
    public function getFormattedPriceAttribute()
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedDiscountedPriceAttribute()
    {
        return 'Rp' . number_format($this->discounted_price, 0, ',', '.');
    }
    
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/img/products/' . $this->image);
        }
        return asset('images/no-image.png'); 
    }
    
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}