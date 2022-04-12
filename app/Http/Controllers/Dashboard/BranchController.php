<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Language;
use App\Traits\StoreUpdateTrait;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
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

            $data = Branch::with('description');

            return DataTables::of($data)
                ->editColumn('description.title', function ($data) {
                    return strip_tags($data->description->title);
                })
                ->addColumn('action', function ($data) {
                    return General::get_action_buttons($data->id);
                })
                ->addColumn('created_at', function ($data) {
                    return General::date_format($data->created_at);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.branches.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::all();
        return view('admin.branches.create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Branch::with('description')->find($id);
        foreach ($data['data']->files as $key => $item) {
            $data['gallery'][$key] = $item->slug;
        }
        $data['gallery'] = json_encode($data['gallery']);
        $data['languages'] = Language::all();
        return view('admin.branches.edit', $data);
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
            $page = Branch::findOrFail($id);
            $page->descriptions()->delete();
            $page->delete();
            return 1;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
