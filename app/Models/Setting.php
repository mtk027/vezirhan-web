<?php

namespace App\Models;

use App\Helpers\General;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Setting extends Model
{
    use HasFactory,FileTrait;
   
    protected $guarded = [];
    protected static $logName = 'Ayarlar';

    public function getDescriptionForEvent(string $eventName): string
    {
        $ip = request()->ip();
        $log_name = self::$logName;
        $event = General::log_event($eventName);
        $user = Auth::user()->name ?? "??";

        return "<strong>{$ip}</strong> ip adresinden {$user} tarafından, <strong>{$log_name}</strong> modeline <strong>{$event}</strong> işlemi yapıldı.";
    }

    protected static $logOnlyDirty = true;

}
