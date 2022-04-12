<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesPageController extends Controller
{
    public function show()
    {
        $data['data'] = Branch::where('status', 1)->get();
        return view('frontend.branches', $data);
    }
}
