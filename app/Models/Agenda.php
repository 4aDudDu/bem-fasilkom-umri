<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'poster',
        'lokasi',
        'waktu_mulai',
        'waktu_selesai',
        'registrasi_link',
        'angkatan_bem_id',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];

    /**
     * Relationship: Agenda belongs to AngkatanBem
     */
    public function angkatanBem(): BelongsTo
    {
        return $this->belongsTo(AngkatanBem::class);
    }

    /**
     * Check if agenda is upcoming
     */
    public function isUpcoming(): bool
    {
        return $this->waktu_mulai > now();
    }

    /**
     * Check if agenda is ongoing
     */
    public function isOngoing(): bool
    {
        return $this->waktu_mulai <= now() && $this->waktu_selesai >= now();
    }

    /**
     * Check if agenda has passed
     */
    public function hasPassed(): bool
    {
        return $this->waktu_selesai < now();
    }

    /**
     * Get countdown days remaining
     */
    public function getCountdownDaysAttribute(): int
    {
        return max(0, $this->waktu_mulai->diffInDays(now(), false));
    }

    /**
     * Get countdown format (e.g., "2 days, 3 hours")
     */
    public function getCountdownFormatAttribute(): string
    {
        if ($this->hasPassed()) {
            return 'Event Telah Berakhir';
        }

        return $this->waktu_mulai->diffForHumans(now());
    }

    /**
     * Scope: Get published agenda
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope: Get upcoming agenda
     */
    public function scopeUpcoming($query)
    {
        return $query->where('waktu_mulai', '>', now())->orderBy('waktu_mulai', 'asc');
    }

    /**
     * Scope: Get past agenda
     */
    public function scopePast($query)
    {
        return $query->where('waktu_selesai', '<', now())->orderBy('waktu_mulai', 'desc');
    }

    /**
     * Auto generate slug when saving
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = \Illuminate\Support\Str::slug($model->title);
            }
        });
    }
}
