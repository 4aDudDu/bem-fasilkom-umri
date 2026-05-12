<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'order',
        'angkatan_bem_id',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Relationship: Division belongs to AngkatanBem
     */
    public function angkatanBem(): BelongsTo
    {
        return $this->belongsTo(AngkatanBem::class);
    }

    /**
     * Relationship: Division has many Members
     */
    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Get head of division (member with head position)
     */
    public function getHead()
    {
        return $this->members()
            ->where('jabatan', 'Kepala Divisi')
            ->orWhere('jabatan', 'Wakil Kepala Divisi')
            ->first();
    }

    /**
     * Scope: Order by order column
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Auto generate slug when saving
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = \Illuminate\Support\Str::slug($model->name);
            }
        });
    }
}
