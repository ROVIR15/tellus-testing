<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'category',
        'tags',
        'content',
        'image_path',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'image_path' => 'array',
    ];

    protected static function booted(): void
    {
        static::saving(function (News $news) {
            if (empty($news->slug) && ! empty($news->title)) {
                $news->slug = Str::slug($news->title);
            }
        });
    }

    /**
     * Helper to get tags as array from comma-separated string.
     */
    public function getTagsArrayAttribute(): array
    {
        $tags = is_string($this->tags) ? explode(',', $this->tags) : [];
        return array_values(array_filter(array_map(static fn ($t) => trim($t), $tags)));
    }

    /**
     * Helper to get the first image or default.
     */
    public function getThumbnailAttribute(): string
    {
        $images = $this->image_path; // Array due to cast, or null if invalid JSON

        if (is_array($images) && !empty($images)) {
            return asset('storage/' . $images[0]);
        }

        // Fallback for legacy data that isn't JSON
        $raw = $this->getRawOriginal('image_path');
        if ($raw && is_string($raw)) {
            // If cast returned null (invalid JSON), treat as single path
            if (is_null($images)) {
                return asset('storage/' . $raw);
            }
        }

        return asset('images/other-news/1.jpg');
    }

    /**
     * Helper to get all hero images as absolute URLs.
     */
    public function getHeroImagesListAttribute(): array
    {
        $images = $this->image_path;

        if (is_array($images) && !empty($images)) {
            return array_map(fn($p) => asset('storage/' . $p), $images);
        }

        // Legacy check
        $raw = $this->getRawOriginal('image_path');
        if ($raw && is_string($raw)) {
            if (is_null($images)) {
                return [asset('storage/' . $raw)];
            }
        }

        return [asset('images/other-news/1.jpg')];
    }
}