<div class="row">
    @if ($image)
        <div class="col-lg-12">
            <label class="fs-6 fw-bold form-label mb-2">Görsel</label>
            <button id="image" type="button"
                class="btn btn-primary btn-sm modal_button d-flex align-items-center justify-content-center w-100 mb-3 text-center"
                name="image" data-bs-toggle="modal" data-bs-target="#file_modal">
                <i class="m-r-10 mdi mdi-folder-multiple-outline mr-3"></i>
                <span>Sunucudan Seç</span>
            </button>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <input type="file" name="image" id="image" data-filepond="true"
                    value="@if(isset($data)){{ $data->default_photo->slug }}@else{{ old('image') }}@endif"
                    label-idle="Dosyalarınızı Sürükleyip Bırakın veya <span class='filepond--label-action'> Dosya Seçin </span>"
                    accepted-file-types="image/*" accept="image/*">
            </div>
        </div>
    @endif
    @if (isset($color) && $color)
        <div class="col-lg-12">
            <label class="required fs-6 fw-bold form-label mb-2">Renk Kodu</label>
            <input type="color" id="head" name="color" class="form-control form-control-solid"
                value="@if (isset($data)){{ $data->color }}@else{{ old('color') }}@endif"
                placeholder="Renk kodunu seçiniz.">
        </div>
    @endif
    @if ($status)
        <div class="col-lg-12">
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold form-label mb-2">Durum</label>
                <select class="form-select form-select-solid fw-bolder" name="status" data-control="select2"
                    data-placeholder="Seçim Yap" data-hide-search="true">
                    @php $status_value = isset($data) ? $data->status : old('status') @endphp
                    <option value="0" @if ($status_value == 0) selected @endif>Pasif</option>
                    <option value="1" @if ($status_value == 1) selected @endif>Aktif</option>
                </select>
            </div>
        </div>
    @endif
    @if ($row_number)
        <div class="col-lg-12">
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold form-label mb-2">Sıra Numarası</label>
                <input type="number" class="form-control form-control-solid title" name="row_number"
                    value="@if (isset($data)){{ $data->row_number }}@else{{ old('row_number') }}@endif"
                    placeholder="Sıra numarası giriniz.">
            </div>
        </div>
    @endif
    <input type="hidden" class="d-none" name="has_row_number"
        value="@if ($row_number) 1 @else 0 @endif">
    <input type="hidden" class="d-none" name="has_status"
        value="@if ($status) 1 @else 0 @endif">
    <input type="hidden" class="d-none" name="has_images"
        value="@if ($image) 1 @else 0 @endif">
</div>
