<?php

namespace App\Models;

use App\Helpers\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class File extends Model
{
    use HasFactory, SoftDeletes;
    protected $appends = ['file_name','full_path'];

    protected $guarded = [];

    public function sliders()
    {
        return $this->morphedByMany(Slider::class, 'fileable');
    }

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'fileable');
    }

    public function getFullPathAttribute()
    {
        return config('settings.general.site_url') . '' . $this->attributes['path'];
    }

    public function getCreatedAtAttribute()
    {
        return General::date_format($this->attributes['created_at'], 'D MMMM Y');
    }

    public function getSizeAttribute()
    {
        return round($this->attributes['size'] / 1024);
    }

    public function getFileNameAttribute()
    {
        return Str::afterLast($this->attributes['path'], '/');
    }
}
