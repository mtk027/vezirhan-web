<?php

namespace App\Traits;

use App\Helpers\LanguageHelper;
use App\Models\Description;

trait DescriptionTrait
{

    public function description()
    {
        return $this->morphOne(Description::class, 'descriptionable')->where('language_id', LanguageHelper::getLanguageId());
    }

    public function descriptions()
    {
        return $this->morphMany(Description::class, 'descriptionable');
    }
}
