<div class="row mb-7 align-items-center">
    <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Başlık</label>
    <div class="col-lg-10">
        <input type="text" class="form-control form-control-solid title" name="title[{{ $language_id }}]"
            data-language="{{ $language_id }}" placeholder="Başlık giriniz." value="@isset($description){{ $description->title }}@else{{ old('title.' . $language_id) }}@endif">
    </div>
</div>
@if ($sub_title)
    <div class="row mb-7 align-items-center">
        <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Alt Başlık</label>
        <div class="col-lg-10">
            <input type="text" class="form-control form-control-solid" name="sub_title[{{ $language_id }}]"
                placeholder="Alt başlık giriniz." value="@isset($description){{ $description->sub_title }}@else{{ old('sub_title.' . $language_id) }}@endif">
        </div>
    </div>
@endif
@if ($button_title)
    <div class="row mb-7 align-items-center">
        <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Buton Yazısı</label>
        <div class="col-lg-10">
            <input type="text" class="form-control form-control-solid" name="button_title[{{ $language_id }}]"
                placeholder="Buton yazısı giriniz." value="@isset($description){{ $description->button_title }}@else{{ old('button_title.' . $language_id) }}@endif">
        </div>
    </div>
@endif
@if ($short_desc)
    <div class="row mb-7">
        <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Kısa
            Açıklama</label>
        <div class="col-lg-10">
            <textarea name="short_description[{{ $language_id }}]" data-language="{{ $language_id }}"
                class="form-control form-control-solid short_description" placeholder="Kısa açıklama giriniz."
                rows="3">@isset($description){{ $description->short_description }}@else{{ old('short_description.' . $language_id) }}@endif</textarea>
        </div>
    </div>
@endif
@if ($desc)
    <div class="row mb-7">
        <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Detay</label>
        <div class="col-lg-10">
            <textarea name="description[{{ $language_id }}]"
                class="tox-target tinymce">@isset($description){{ $description->description }}@else{{ old('description.' . $language_id) }}@endif</textarea>
        </div>
    </div>
@endif
@if ($seo)
<div class="accordion" id="seo_accordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="seo_accordion_header">
            <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse"
                data-bs-target="#seo_accordion_body" aria-expanded="true" aria-controls="seo_accordion_body">
                SEO Ayarları
            </button>
        </h2>
        <div id="seo_accordion_body" class="accordion-collapse collapse" aria-labelledby="seo_accordion_header"
            data-bs-parent="#seo_accordion">
            <div class="accordion-body">
                <div class="row mb-7 align-items-center">
                    <label class="fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Seo Url</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control form-control-solid" name="seo_url[{{ $language_id }}]"
                            id="seo_url" placeholder="SEO url giriniz." value="@isset($description){{ $description->seo_url }}@else{{ old('seo_url.' . $language_id) }}@endif">
                    </div>
                </div>
                <div class="row mb-7 align-items-center">
                    <label class="fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Seo Başlık</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control form-control-solid seo_title"
                            name="seo_title[{{ $language_id }}]" data-language="{{ $language_id }}"
                            value="@isset($description){{ $description->seo_title }}@else{{ old('seo_title.' . $language_id) }}@endif" placeholder="SEO başlığı giriniz.">
                    </div>
                </div>
                <div class="row mb-7">
                    <label class="fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Seo Açıklama</label>
                    <div class="col-lg-10">
                        <textarea name="seo_description[{{ $language_id }}]"
                            class="form-control form-control-solid seo_description" rows="3"
                            data-language="{{ $language_id }}"
                            placeholder="Seo açıklaması giriniz.">@isset($description){{ $description->seo_description }}@else{{ old('seo_description.' . $language_id) }}@endif</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<input type="hidden" class="d-none" name="has_sub_title" value="@if ($sub_title) 1 @else 0 @endif">
<input type="hidden" class="d-none" name="has_button" value="@if ($button_title) 1 @else 0 @endif">
<input type="hidden" class="d-none" name="has_short_description" value=" @if ($short_desc) 1 @else 0 @endif">
