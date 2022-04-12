<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Faq::query();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="javascript:;" data-created_at="' . General::date_format($data->created_at) . '" data-message="' . $data->question . '" data-bs-custom-class="tooltip-dark" rel="tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Soruyu Gör" class="btn btn-sm btn-light-primary detail_modal"><i class="fas fa-search fs-4"></i></a>';

                    return $actionBtn;
                })

                ->addColumn('created_at', function ($data) {
                    return General::date_format($data->created_at);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.faqs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
