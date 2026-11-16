<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_code',
        'customer_id',
        'customer_name',
        'customer_phone',
        'laptop_name',
        'laptop_type',
        'problem_description',
        'status',
        'price',
        'service_note',
        'technician_id',
        'user_id',
        'warranty_duration_days',
        'warranty_note',
        'warranty_start_date',
    ];

    protected function casts(): array
    {
        return [
            'warranty_start_date' => 'date',
            'price'               => 'decimal:2',
        ];
    }

    // ─── Accessors ───────────────────────────────────────────────────────────

    /**
     * Returns true when the service order is currently under warranty.
     */
    public function getIsUnderWarrantyAttribute(): bool
    {
        if (
            $this->status !== 'completed' ||
            !$this->warranty_start_date ||
            !$this->warranty_duration_days ||
            $this->warranty_duration_days <= 0
        ) {
            return false;
        }

        return Carbon::today()->lte(
            $this->warranty_start_date->copy()->addDays($this->warranty_duration_days)
        );
    }

    /**
     * Returns the Carbon date when the warranty expires, or null.
     */
    public function getWarrantyExpiresAtAttribute(): ?Carbon
    {
        if (!$this->warranty_start_date || !$this->warranty_duration_days) {
            return null;
        }

        return $this->warranty_start_date->copy()->addDays($this->warranty_duration_days);
    }

    /**
     * WhatsApp URL to customer using normalized phone
     */
    public function getWaLinkAttribute(): ?string
    {
        if (!$this->customer_phone) {
            return null;
        }
        $phone = Customer::normalizePhone($this->customer_phone);
        $text = rawurlencode("Halo {$this->customer_name}, update mengenai servis perangkat Anda ({$this->laptop_name} - No. Tiket: {$this->service_code}) di Best Computer Bogor.");
        return "https://wa.me/{$phone}?text={$text}";
    }

    // ─── Relationships ───────────────────────────────────────────────────────

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /** The pelanggan user account linked to this order. */
    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function warrantyClaims()
    {
        return $this->hasMany(WarrantyClaim::class);
    }
}
