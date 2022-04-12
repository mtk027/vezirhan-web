<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Property;
use App\Traits\StoreUpdateTrait;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PropertyController extends Controller
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

            $data = Property::with('description');

            return DataTables::of($data)
                ->editColumn('description.title', function ($data) {
                    return $data->description->title;
                })
                ->editColumn('status', function ($data) {
                    return General::get_status_button($data->status, $data->id, 'status');
                })
                ->addColumn('action', function ($data) {
                    return General::get_action_buttons($data->id);
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin.properties.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        return view('admin.properties.create', $data);
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
        $data['data'] = Property::with('description')->find($id);
        $data['languages'] = Language::all();
        return view('admin.properties.edit', $data);
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
            $page = Property::findOrFail($id);
            $page->descriptions()->delete();
            $page->delete();
            return 1;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
