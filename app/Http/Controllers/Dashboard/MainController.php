<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $data['activities'] = Activity::orderBy('id', 'desc')->limit('10')->get();
        return view('admin.dashboard', $data);
    }

    public function change_status($page, $id, $column_to_update)
    {
        $replaced_page = Str::replace('-', '_', $page);
        $data = DB::table($replaced_page)->find($id);
        DB::table($replaced_page)->where('id', $id)->update([$column_to_update => !$data->$column_to_update]);
    }

}
