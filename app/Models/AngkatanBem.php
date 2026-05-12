<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AngkatanBem extends Model
{
    use HasFactory;

    protected $table = 'angkatan_bems';

    protected $fillable = [
        'tahun',
        'deskripsi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Relationship: Angkatan has many Berita
     */
    public function berita(): HasMany
    {
        return $this->hasMany(Berita::class);
    }

    /**
     * Relationship: Angkatan has many Gallery
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * Relationship: Angkatan has many Division
     */
    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class);
    }

    /**
     * Relationship: Angkatan has many Member
     */
    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Relationship: Angkatan has many HeroCarousel
     */
    public function heroCarousels(): HasMany
    {
        return $this->hasMany(HeroCarousel::class);
    }

    /**
     * Relationship: Angkatan has many Agenda
     */
    public function agendas(): HasMany
    {
        return $this->hasMany(Agenda::class);
    }

    /**
     * Scope: Get active angkatan
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Order by year descending
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('tahun', 'desc');
    }
}
