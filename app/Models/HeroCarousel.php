<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroCarousel extends Model
{
    use HasFactory;

    protected $table = 'hero_carousels';

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'button_text',
        'button_link',
        'order',
        'is_active',
        'angkatan_bem_id',
        'overlay_opacity',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'overlay_opacity' => 'float',
    ];

    /**
     * Relationship: HeroCarousel belongs to AngkatanBem
     */
    public function angkatanBem(): BelongsTo
    {
        return $this->belongsTo(AngkatanBem::class);
    }

    /**
     * Scope: Get active carousels
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Order by order column
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
