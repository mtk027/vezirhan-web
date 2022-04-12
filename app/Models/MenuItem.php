<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory, FileTrait;

    protected $guarded = [];
    protected $appends = ['default_photo'];

    public function sub_menu()
    {
        return $this->hasMany(MenuItem::class, 'parent_id', 'id');
    }
}
