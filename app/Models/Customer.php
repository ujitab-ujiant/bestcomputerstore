<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
    ];

    // ─── Static helpers ──────────────────────────────────────────────────────

    /**
     * Normalise an Indonesian phone number to E.164-ish format with country
     * code 62 (no leading +).
     *
     * Rules:
     *  - Strip all non-digit characters.
     *  - Starts with 0  → replace leading 0 with 62
     *  - Starts with 8  → prepend 62
     *  - Starts with 62 → keep as-is
     */
    public static function normalizePhone(string $phone): string
    {
        // Strip everything that is not a digit
        $digits = preg_replace('/\D/', '', $phone);

        if (str_starts_with($digits, '62')) {
            return $digits;
        }

        if (str_starts_with($digits, '0')) {
            return '62' . substr($digits, 1);
        }

        if (str_starts_with($digits, '8')) {
            return '62' . $digits;
        }

        // Fallback: return digits as-is
        return $digits;
    }

    // ─── Relationships ───────────────────────────────────────────────────────

    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class);
    }
}
