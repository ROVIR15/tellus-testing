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
}