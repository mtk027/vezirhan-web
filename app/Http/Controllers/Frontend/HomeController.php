<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\HappyCustomer;
use App\Models\HomepageBlock;
use App\Models\Property;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $data['blocks'] = HomepageBlock::where(['language_id' => LanguageHelper::getLanguageId(), 'status' => 1])->orderBy('row_number')->get();
        $data['sliders'] = Slider::where('status', 1)->whereDate('release_date', '<=', now())->with(['description'])->get();
        $data['properties'] = Property::with(['description'])->where('status', 1)->orderBy('row_number')->get();
        $data['happy_customers'] = HappyCustomer::with(['description'])->where('status', 1)->get();
        return view('frontend.homepage', $data);
    }

    public function send_faq_form(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'question' => 'required|string',
            ]);

            if ($validator->fails()) {
                return false;
            }

            Faq::create([
                'question' => $request->question,
            ]);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
