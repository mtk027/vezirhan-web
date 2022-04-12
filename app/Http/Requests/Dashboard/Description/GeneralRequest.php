<?php

namespace App\Http\Requests\Dashboard\Description;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title.*' => 'required|string|max:240',
            'sub_title.*' => 'required_if:has_sub_title,"1"|string|max:240',
            'short_description.*' => 'required_if:has_short_description,"1"|string',
            'description.*' => 'required|string',
            'button_title.*' => 'required_if:has_button,"1"|string|max:240',
            'seo_title.*' => 'required|string|max:240',
            'seo_description.*' => 'required_if:has_short_description,"1"',
            'row_number' => 'required_if:has_row_number,"1"|numeric|min:0|max:4294967295',
            'status' => 'required|numeric|boolean',
            'has_short_description' => 'required|boolean',
            'has_sub_title' => 'required|boolean',
            'has_button' => 'required|boolean',
            'has_row_number' => 'required|boolean',
        ];
        if (isset(request()->seo_url)) {
            foreach (request()->seo_url as $key => $seo_url) {
                $rules = array_merge($rules, ['seo_url.' . $key => 'nullable|string|max:191|unique:descriptions,seo_url,' . $key . ',language_id']);
            }
        }
        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'title.*' => 'Başlık',
            'sub_title.*' => 'Alt başlık',
            'short_description.*' => 'Kısa açıklama',
            'description.*' => 'Detay',
            'button_title' => 'Buton yazısı',
            'seo_title.*' => 'Seo başlık',
            'seo_description.*' => 'Seo detay',
            'row_number' => 'Sıra Numarası',
            'image' => 'Görsel',
            'status' => 'Durum',
        ];

        if (isset(request()->seo_url)) {
            foreach (request()->seo_url as $key => $seo_url) {
                $attributes = array_merge($attributes, ['seo_url.' . $key => 'Seo url']);
            }
        }
        return $attributes;
    }
}
