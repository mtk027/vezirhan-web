<?php

namespace App\Models;

use App\Helpers\General;
use App\Traits\DescriptionTrait;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class Property extends Model
{
    use HasFactory, SoftDeletes, DescriptionTrait, FileTrait, LogsActivity;

    protected $fillable = ['status', 'row_number', 'color'];
    protected $appends = ['default_photo'];


    protected static $logName = 'Özellikler';

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
