<?php

namespace App\Helpers;



class Translation
{
    public static function setLanguage($obj,$data){
        return $obj->description()->create($data);
    }

    public static function updateLanguage($obj,$language_id,$data){
        return $obj->descriptions()->where('language_id',$language_id)->update($data);
    }
}