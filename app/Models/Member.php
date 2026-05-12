<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nim',
        'photo',
        'jabatan',
        'division_id',
        'angkatan_bem_id',
        'instagram',
        'email',
        'bio',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Relationship: Member belongs to Division
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    /**
     * Relationship: Member belongs to AngkatanBem
     */
    public function angkatanBem(): BelongsTo
    {
        return $this->belongsTo(AngkatanBem::class);
    }

    /**
     * Check if member is KSB (Ketua, Sekretaris, Bendahara)
     */
    public function isKsb(): bool
    {
        return in_array($this->jabatan, ['Ketua', 'Sekretaris', 'Bendahara']);
    }

    /**
     * Scope: Get KSB members
     */
    public function scopeKsb($query)
    {
        return $query->whereIn('jabatan', ['Ketua', 'Sekretaris', 'Bendahara']);
    }

    /**
     * Scope: Order by order column
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Scope: Get by division
     */
    public function scopeByDivision($query, $divisionId)
    {
        return $query->where('division_id', $divisionId);
    }

    /**
     * Get instagram URL
     */
    public function getInstagramUrlAttribute(): ?string
    {
        if (!$this->instagram) {
            return null;
        }

        // If already contains URL
        if (str_contains($this->instagram, 'instagram.com')) {
            return $this->instagram;
        }

        // Just username
        return "https://instagram.com/{$this->instagram}";
    }
}
