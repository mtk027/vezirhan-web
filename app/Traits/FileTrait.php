<?php

namespace App\Traits;

use App\Models\File;

trait FileTrait
{


    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    public function video()
    {
        return $this->morphToMany(File::class, 'fileable')->where('files.type', 'video');
    }

    public function cover_photo()
    {
        return $this->morphToMany(File::class, 'fileable')->where('files.type', 'cover');
    }

    public function banner_photo()
    {
        return $this->morphToMany(File::class, 'fileable')->where('files.type', 'banner');
    }

    public function default_photo()
    {
        return $this->morphToMany(File::class, 'fileable')->where('files.type', 'default');
    }
    

    
    public function getDefaultPhotoAttribute()
    {
        return $this->default_photo()->first();
    }
    
    public function getBannerPhotoAttribute()
    {
        return $this->banner_photo()->first();
    }
    
    public function getCoverPhotoAttribute()
    {
        return $this->cover_photo()->first();
    }
    
    public function getVideoAttribute()
    {
        return $this->video()->first();
    }

}
