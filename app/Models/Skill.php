<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'percentage', 'category', 'icon', 'color', 'is_active', 'sort_order'];
    protected $casts = ['is_active' => 'boolean', 'percentage' => 'integer'];

    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('sort_order'); }
}
