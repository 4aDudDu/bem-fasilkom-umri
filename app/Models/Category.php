<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Relationship: Category has many Berita
     */
    public function berita(): HasMany
    {
        return $this->hasMany(Berita::class);
    }

    /**
     * Relationship: Category has many Gallery
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * Scope: Get active categories
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get URL friendly slug
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = \Illuminate\Support\Str::slug($model->name);
            }
        });
    }
}
