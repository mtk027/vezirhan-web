<?php

namespace App\Traits;

use App\Events\OrderCreated;
use App\Helpers\General;
use App\Helpers\Translation;
use App\Http\Requests\Dashboard\Description\GeneralRequest;
use App\Models\File;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Exception;

trait StoreUpdateTrait
{
    protected $model_folder;
    protected $model;
    protected $inputs;

    function __construct()
    {
        $model = Str::before(Str::afterLast(self::class, "\\"), 'Controller');
        $this->model = app("App\Models\\{$model}");
        $this->inputs = request()->except(General::except_data());
    }

    public function store(GeneralRequest $request)
    {
        DB::beginTransaction();
        try {
            $lang_array  = $data_array  = [];
            if ($request->has_images == 1) {
                if ($request->image) {
                    $file = $request->image;
                } elseif ($request->video) {
                    $file = $request->video;
                }
                $file = File::where('slug', $file)->first();
            }
            foreach ($this->inputs as $key => $value) {
                if (!is_array($value)) {
                    $data_array = Arr::add($data_array, $key, $value);
                } else {
                    $lang_array = Arr::add($lang_array, $key, $value);
                }
            }
            $data = $this->model::create($data_array);
            if ($request->has_images == 1) {
                $data->files()->attach($file->id);
            }

            foreach (Language::all() as $lang) {
                $desc_array = [];
                foreach ($lang_array as $key => $lang_item) {
                    if (is_array($lang_item)) {
                        $desc_array = Arr::add($desc_array, $key, $lang_item[$lang->id]);
                    }
                }
                $desc_array = Arr::add($desc_array, "language_id", $lang->id);
                $desc_array = Arr::add($desc_array, "descriptionable_id", $data->id);
                $desc_array = Arr::add($desc_array, "descriptionable_type", $this->model);
                Translation::setLanguage($data, $desc_array);
            }
            DB::commit();
            session()->flash('success', "Ekleme işlemi başarıyla tamamlandı.");

           /*  if($this->model::class == "App\Models\Product"){
                event(new OrderCreated(__('order_create_successfully')));
            } */

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput($request->all());
        }
    }

    public function update(GeneralRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $item = $this->model::find($id);
            $lang_array  = $data_array  = [];
            if ($request->has_images == 1) {
                if ($request->image) {
                    $file = $request->image;
                } elseif ($request->video) {
                    $file = $request->video;
                }
                $file = File::where('slug', $file)->first();
            }
            foreach ($this->inputs as $key => $value) {
                if (!is_array($value)) {
                    $data_array = Arr::add($data_array, $key, $value);
                } else {
                    $lang_array = Arr::add($lang_array, $key, $value);
                }
            }
            $item->update($data_array);
            if ($request->has_images == 1) {
                $item->files()->sync($file->id);
            }
            foreach (Language::all() as $lang) {
                $desc_array = [];
                foreach ($lang_array as $key => $lang_item) {
                    if (is_array($lang_item)) {
                        $desc_array = Arr::add($desc_array, $key, $lang_item[$lang->id]);
                    }
                }
                $desc_array = Arr::add($desc_array, "language_id", $lang->id);
                $desc_array = Arr::add($desc_array, "descriptionable_id", $item->id);
                Translation::updateLanguage($item, $lang->id, $desc_array);
            }
            DB::commit();
            session()->flash('success', "Güncelleme işlemi başarıyla tamamlandı.");
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
            return redirect()->back()->withInput($request->all());
        }
    }
}
