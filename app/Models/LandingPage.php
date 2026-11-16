<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'order'];

    public function sections()
    {
        return $this->hasMany(LandingPageSection::class)->orderBy('order');
    }

    public function getSection(string $key): ?LandingPageSection
    {
        return $this->sections->firstWhere('section_key', $key);
    }
}
