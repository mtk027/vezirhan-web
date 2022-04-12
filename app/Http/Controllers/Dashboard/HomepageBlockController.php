<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HomepageBlock;
use App\Models\Language;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['languages'] = Language::all();
        $data['blocks'] = HomepageBlock::get();
        return view('admin.homepage-blocks.index', $data);
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
        try {
            DB::beginTransaction();
            foreach (Language::all() as $lang) {
                $block = HomepageBlock::where('language_id', $lang->id)->get();
                foreach ($block as $item) {
                    $block_el = HomepageBlock::where('key', $item->key)->where('language_id', $lang->id)->first();
                    $item_json = json_decode($block_el->json);
                    $json = [];
                    if($item_json){
                        foreach ($item_json as $key => $json_item) {
                            if($key != "data"){
                                $json[$key] = $request[$key][$item->key][$lang->id];
                            }else{
                                foreach ($json_item as $json_key => $json_item_data) {
                                    foreach ($json_item_data as $inner_key => $inner) {
                                        $json['data'][$json_key][$inner_key] = $request['data_'.$inner_key][$json_key][$item->key][$lang->id];
                                    }
                                }
                            }
                        }
                    }else{
                        $json = null;
                    }
                    $block_el->update([
                        'row_number' => $request->row_number[$item->key][$lang->id],
                        'json' => $json
                    ]);
                    DB::commit();
                }
            }
            session()->flash('success', "Anasayfa Blokları Başarıyla Güncellendi.");
            return redirect()->route('dashboard.homepage-blocks.index');
        } catch (Exception $e) {
            DB::rollback();
            return $e;
            session()->flash('error', "Anasayfa Blokları Güncellenirken bir Hata oluştu. Hata mesajı: " . $e->getMessage());
            return redirect()->route('dashboard.homepage-blocks.index');
        }
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
