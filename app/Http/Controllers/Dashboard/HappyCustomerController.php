<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\HappyCustomer;
use App\Models\Language;
use App\Traits\StoreUpdateTrait;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HappyCustomerController extends Controller
{
    use StoreUpdateTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = HappyCustomer::with('description');

            return DataTables::of($data)
                ->editColumn('description.title', function ($data) {
                    return $data->description->title;
                })
                ->addColumn('created_at', function ($data) {
                    return General::date_format($data->created_at);
                })
                ->addColumn('action', function ($data) {
                    return General::get_action_buttons($data->id);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.happy-customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        return view('admin.happy-customers.create', $data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = HappyCustomer::with('description')->find($id);
        $data['languages'] = Language::all();
        return view('admin.happy-customers.edit', $data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $page = HappyCustomer::findOrFail($id);
            $page->descriptions()->delete();
            $page->delete();
            return 1;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
