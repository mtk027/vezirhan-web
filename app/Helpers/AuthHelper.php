<?php

namespace App\Helpers;

use App\Models\Contract;
use App\Models\Role;
use Carbon\Carbon;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthHelper
{
    public static function check($role_id)
    {
        $user = Auth::user();

        $data =$user->whereHas('roles', function ($query) use ($role_id) {
            return $query->whereIn('id', $role_id);
        })->first();
        
        if ($data) {
            return true;
        }else{
            return false;
        }

    }
    public static function get_roles()
    {
        return Role::all();
    }
}
