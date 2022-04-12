<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Description extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $guarded;
    protected $appends = ['url'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function descriptionable()
    {
        return $this->morphTo();
    }
    
    public function getUrlAttribute()
    {
        return $this->seo_url ?? $this->slug;
    }
}
