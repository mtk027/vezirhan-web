<?php

namespace App\Models;

use App\Helpers\General;
use App\Helpers\LanguageHelper;
use App\Traits\DescriptionTrait;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class HappyCustomer extends Model
{
    use HasFactory, SoftDeletes, DescriptionTrait, FileTrait;

    protected $fillable = ['status', 'location', 'name'];
    protected $appends = ['default_photo'];
}
