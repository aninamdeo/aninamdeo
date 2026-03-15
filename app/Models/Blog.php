<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image', 'category',
        'tags', 'meta_title', 'meta_description', 'is_published', 'published_at', 'views',
    ];

    protected $casts = ['is_published' => 'boolean', 'published_at' => 'datetime'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) { $model->slug = Str::slug($model->title); }
        });
    }

    public function scopePublished($query) { return $query->where('is_published', true)->orderBy('published_at', 'desc'); }

    public function getReadingTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->content));
        return ceil($words / 200) . ' min read';
    }
}
