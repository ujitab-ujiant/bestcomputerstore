<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ─── Role helpers ────────────────────────────────────────────────────────

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isTeknisi(): bool
    {
        return $this->role === 'teknisi';
    }

    public function isPelanggan(): bool
    {
        return $this->role === 'pelanggan';
    }

    // ─── Static helpers ──────────────────────────────────────────────────────

    /**
     * Find an existing pelanggan by normalised phone or create one.
     * Password = last 4 digits of normalised phone.
     * Email    = {phone}@bestcomputer.local (placeholder).
     */
    public static function findOrCreateByPhone(string $phone, string $name): self
    {
        $normalised = Customer::normalizePhone($phone);

        $user = static::where('phone', $normalised)->first();

        if (!$user) {
            $last4    = substr($normalised, -4);
            $user = static::create([
                'name'     => $name,
                'email'    => $normalised . '@bestcomputer.local',
                'phone'    => $normalised,
                'password' => Hash::make($last4),
                'role'     => 'pelanggan',
            ]);
        }

        return $user;
    }

    // ─── Relationships ───────────────────────────────────────────────────────

    /** Service orders assigned to this user as technician. */
    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class, 'technician_id');
    }

    /** Service orders owned by this pelanggan account. */
    public function ownedServiceOrders()
    {
        return $this->hasMany(ServiceOrder::class, 'user_id');
    }

    public function warrantyClaims()
    {
        return $this->hasMany(WarrantyClaim::class);
    }

    public function createdProducts()
    {
        return $this->hasMany(Product::class, 'created_by');
    }
}
