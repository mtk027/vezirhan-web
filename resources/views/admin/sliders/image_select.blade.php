<div class="col-lg-12">
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <label class="required fs-6 fw-bold form-label mb-2">Görsel Türü</label>
        <select class="form-select form-select-solid fw-bolder" id="file_type" name="file_type" data-control="select2"
            data-placeholder="Seçim Yap" data-hide-search="true">
            <option value="image" @if (isset($data) && isset($data->default_photo) == 'image') selected @endif>Resim</option>
            <option value="video" @if (isset($data) && isset($data->video) == 'video') selected @endif>Video</option>
        </select>
    </div>
    <div id="file_image" @if (isset($data) && isset($data->video)) class="d-none" @endif>
        <button id="image" type="button"
            class="btn btn-primary btn-sm modal_button d-flex align-items-center justify-content-center w-100 mb-3 text-center"
            name="image" data-bs-toggle="modal" data-bs-target="#file_modal">
            <i class="m-r-10 mdi mdi-folder-multiple-outline mr-3"></i>
            <span>Sunucudan Seç</span>
        </button>
        <div class="fv-row mb-7 fv-plugins-icon-container">
            <input type="file" name="image" id="image" data-filepond="true" value="@if (isset($data) && isset($data->default_photo)){{ $data->default_photo->slug }}@else{{ old('image') }}@endif"
                label-idle="Dosyalarınızı Sürükleyip Bırakın veya <span class='filepond--label-action'> Dosya Seçin </span>"
                accepted-file-types="image/*" accept="image/*">
        </div>
    </div>
    <div id="file_video" @if ((isset($data) && isset($data->default_photo)) || $create) class="d-none" @endif>
        <button id="video" type="button"
            class="btn btn-primary btn-sm modal_button d-flex align-items-center justify-content-center w-100 mb-3 text-center"
            name="video" data-bs-toggle="modal" data-bs-target="#file_modal">
            <i class="m-r-10 mdi mdi-folder-multiple-outline mr-3"></i>
            <span>Sunucudan Seç</span>
        </button>
        <div class="fv-row mb-7 fv-plugins-icon-container">
            <input type="file" name="video" id="video" data-filepond="true" value="@if (isset($data) && isset($data->video)){{ $data->video->slug }}@else{{ old('video') }}@endif"
                label-idle="Dosyalarınızı Sürükleyip Bırakın veya <span class='filepond--label-action'> Dosya Seçin </span>"
                accepted-file-types="video/*" accept="video/*">
        </div>
    </div>
</div>
@section('js')
    <script>
        $('#file_type').on('select2:select', function(e) {
            var data = e.params.data.id;
            switch (data) {
                case "video":
                    $('#file_video').removeClass('d-none')
                    $('#file_image').addClass('d-none')
                    break;
                case "image":
                    $('#file_video').addClass('d-none')
                    $('#file_image').removeClass('d-none')
                default:
                    break;
            }
        });
    </script>

@endsection
