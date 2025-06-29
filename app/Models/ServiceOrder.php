<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_code',
        'customer_id',
        'customer_name', 
        'laptop_name',
        'laptop_type',
        'problem_description',
        'status',
        'price', 
        'service_note',
        'technician_id'
    ];

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}