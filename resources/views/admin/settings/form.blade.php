@foreach ($settings as $item)
    @if ($item->group == $group->group && $item->language_id == $language->id)
        @if ($item->type == 'text')
            <div class="col-lg-{{$item->col}}">
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="fs-6 fw-bold form-label mb-2">{{ $item->name }}</label>
                    <input type="text" class="form-control form-control-solid"
                        name="{{ $item->key }}[{{ $language->id }}]" value="{{ $item->value }}">
                </div>
            </div>
        @elseif ($item->type == 'textarea')
            <div class="col-lg-{{$item->col}}">
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="fs-6 fw-bold form-label mb-2">{{ $item->name }}</label>
                    <textarea name="{{ $item->key }}[{{ $language->id }}]" id=""
                        class="form-control form-control-solid" rows="4">{{ $item->value }}</textarea>
                </div>
            </div>
        @elseif($item->type == "image")
            <div class="col-lg-{{$item->col}} row mb-5">
                <label class="fs-6 fw-bold form-label mb-2 col-lg-4">{{ $item->name }}</label>
                <div class="col-lg-8">
                    <button id="{{ $item->key }}[{{ $language->id }}]" type="button"
                        class="btn btn-primary btn-sm modal_button d-flex align-items-center justify-content-center w-100 mb-3 text-center"
                        name="{{ $item->key }}[{{ $language->id }}]" data-bs-toggle="modal"
                        data-bs-target="#file_modal">
                        <i class="m-r-10 mdi mdi-folder-multiple-outline mr-3"></i>
                        <span>Sunucudan Seç</span>
                    </button>
                    <input type="file" name="{{ $item->key }}[{{ $language->id }}]"
                        id="{{ $item->key }}_{{ $language->id }}" value="{{ $item->value }}"
                        data-filepond="true"
                        label-idle="Dosyalarınızı Sürükleyip Bırakın veya <span class='filepond--label-action'> Dosya Seçin </span>"
                        accepted-file-types="image/*" accept="image/*">
                </div>
            </div>
        @endif
    @endif
@endforeach
