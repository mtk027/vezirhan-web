<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function show($slug)
    {
        $data['data'] = Branch::where('status', 1)->whereHas('description', function ($q) use ($slug) {
            $q->where('slug', $slug)->orWhere('seo_url', $slug);
        })->with('files')->first();
        return view('frontend.branch', $data);
    }
}
