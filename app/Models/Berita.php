<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'content',
        'category_id',
        'author_id',
        'angkatan_bem_id',
        'published_at',
        'views',
        'is_published',
        'images',
        'tags',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'tags' => 'json',
        'images' => 'json',
        'views' => 'integer',
    ];

    /**
     * Relationship: Berita belongs to Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship: Berita belongs to User (author)
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Relationship: Berita belongs to AngkatanBem
     */
    public function angkatanBem(): BelongsTo
    {
        return $this->belongsTo(AngkatanBem::class);
    }

    /**
     * Get read time estimate (in minutes)
     */
    public function getReadTimeAttribute(): int
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return max(1, ceil($wordCount / 200)); // Average 200 words per minute
    }

    /**
     * Increment view count
     */
    public function incrementViews(): void
    {
        $this->increment('views');
        cache()->forget("berita.{$this->id}.views");
    }

    /**
     * Scope: Get published berita
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)->whereNotNull('published_at');
    }

    /**
     * Scope: Get by category
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope: Get by angkatan
     */
    public function scopeByAngkatan($query, $angkatanId)
    {
        return $query->where('angkatan_bem_id', $angkatanId);
    }

    /**
     * Scope: Search by title or content
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'like', "%{$keyword}%")
                     ->orWhere('description', 'like', "%{$keyword}%")
                     ->orWhere('content', 'like', "%{$keyword}%");
    }

    /**
     * Scope: Get trending (most viewed)
     */
    public function scopeTrending($query, $days = 30)
    {
        return $query->where('published_at', '>=', now()->subDays($days))
                     ->orderBy('views', 'desc');
    }

    /**
     * Get related berita (same category, different id)
     */
    public function getRelatedBerita($limit = 3)
    {
        return Berita::published()
            ->where('category_id', $this->category_id)
            ->where('id', '!=', $this->id)
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
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

        static::updating(function ($model) {
            $model->slug = \Illuminate\Support\Str::slug($model->title);
        });
    }
}
