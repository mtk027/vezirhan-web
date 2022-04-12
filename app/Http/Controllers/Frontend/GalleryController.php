<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function show()
    {
        $data['files'] = File::where('type','gallery')->get();
        return view('frontend.gallery', $data);
    }
}
