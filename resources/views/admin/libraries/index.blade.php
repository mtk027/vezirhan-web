@extends('admin.layouts.master')
@section('menu', 'libraries')
@section('title', 'Ortam Yöneticisi')
@section('content')
    <div class="row">
        @include('admin.layouts.success')
        @include('admin.layouts.error')
        <div class="col-lg-12">
            <div class="card card-custom example example-compact gutter-b">
                <div class="card-body">
                    <div class="d-flex flex-wrap">
                        <div class="col-lg-12 library">
                            <div class="fv-row fv-plugins-icon-container">
                                <input type="file" name="image" id="image" data-filepond="true"
                                    value="@if (isset($data)){{ $data->default_photo->slug }}@else{{ old('image') }}@endif"
                                    label-idle="Dosyalarınızı Sürükleyip Bırakın veya <span class='filepond--label-action'> Dosya Seçin </span>"
                                    allow-multiple="true" accepted-file-types="image/*" accept="image/*">
                            </div>
                        </div>
                        <input type="text" class="form-control form-control-solid mb-5 mt-5" id="file_search"
                            placeholder="Görsel Arayın...">
                        <p class="not-found alert alert-warning mx-auto" style="display: none">
                            Aradığınız kelimeyi içeren görsel bulunamadı!
                        </p>
                        @foreach ($items as $key => $item)
                            <div class="library-image col-lg-2 p-2 searchable_item">
                                <img class="img-thumbnail cursor-pointer" data-src="{{ $item->full_path }}"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_{{ $key }}">
                                <div class="modal bg-white fade" tabindex="-1" id="kt_modal_{{ $key }}">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content shadow-none">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ $item->slug }} Detayları</h5>
                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <span class="svg-icon">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-body d-flex p-0">
                                                <div class="col-lg-8 position-relative">
                                                    <img class="preview_image" src="{{ $item->full_path }}" alt="">
                                                </div>
                                                <div class="col-lg-4 bg-light border-start p-5">
                                                    <div class="properties">
                                                        <div class="item mb-1">
                                                            <span class="title fw-bold text-muted">Oluşturulma
                                                                Tarihi:</span>
                                                            <span class="property">{{ $item->created_at }}</span>
                                                        </div>
                                                        <div class="item mb-1">
                                                            <span class="title fw-bold text-muted">Dosya İsmi:</span>
                                                            <span class="property">{{ $item->file_name }}</span>
                                                        </div>
                                                        <div class="item mb-1">
                                                            <span class="title fw-bold text-muted">Dosya Türü:</span>
                                                            <span class="property">{{ $item->mime_type }}</span>
                                                        </div>
                                                        <div class="item mb-1">
                                                            <span class="title fw-bold text-muted">Dosya Boyutu:</span>
                                                            <span class="property">{{ $item->size }} KB</span>
                                                        </div>
                                                        <div class="item mb-1">
                                                            <span class="title fw-bold text-muted">Ölçüler:</span>
                                                            <span class="property">{{ $item->resolution }}
                                                                px.</span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-wrapper">
                                                        <form id="form_{{$item->id}}"
                                                            action="{{ route('dashboard.libraries.update', $item) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="col-lg-12">
                                                                <div class="row mb-7 align-items-center">
                                                                    <label
                                                                        class="fs-7 fw-bold form-label mb-0 col-lg-3 text-end">Başlık</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control"
                                                                            name="file_title[]" placeholder="Başlık giriniz."
                                                                            value="{{ $item->file_title }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-7 align-items-center">
                                                                    <label
                                                                        class="fs-7 fw-bold form-label mb-0 col-lg-3 text-end">Alternatif
                                                                        Metin</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control" name="alt[]"
                                                                            placeholder="Alternatif metin giriniz."
                                                                            value="{{ $item->alt }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-7 align-items-center">
                                                                    <label
                                                                        class="fs-7 fw-bold form-label mb-0 col-lg-3 text-end">Dosya
                                                                        Adresi</label>
                                                                    <div class="col-lg-9">
                                                                        <input id="coppied_{{ $item->id }}" type="text"
                                                                            class="form-control copy_text text-muted"
                                                                            value="{{ $item->full_path }}" readonly>
                                                                    </div>
                                                                    <div class="col-lg-9 ms-auto mt-3">
                                                                        <a href="javascript:;"
                                                                            data-id="{{ $item->id }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="right" title="Kopyalandı!"
                                                                            data-bs-delay-show="100000000"
                                                                            class="btn btn-light-success btn-sm copy">Kopyala</a>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 text-end">
                                                                    <button type="button"
                                                                        data-url="{{ route('dashboard.libraries.destroy', $item->id) }}"
                                                                        class="btn btn-light-danger btn-sm delete_item"
                                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                                        title="Çöp kutusuna at">
                                                                        <span class="indicator-label"><i
                                                                                class="fas fa-trash"></i></span>
                                                                    </button>
                                                                    <button form="form_{{$item->id}}" type="submit"
                                                                        class="btn btn-light-success btn-sm">
                                                                        <i class="far fa-save"></i>
                                                                        <span class="indicator-label">Değişiklikleri
                                                                            Kaydet</span>
                                                                    </button>
                                                                </div>
                                                                <div class="mb-7 text-end">
                                                                    <span class="text-muted">*Çöpe atılan görsellere
                                                                        <br> sistem yöneticinize başvurarak
                                                                        ulaşabilirsiniz.</span>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.copy').click(function() {
            let id = $(this).data('id')
            var copyText = document.getElementById('coppied_' + id);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            $(this).tooltip('show')
        })
    </script>
@endsection
