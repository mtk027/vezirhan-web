@extends('admin.layouts.master')
@section('menu', 'sliders')
@section('title', 'Slider Ekle')
@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.error')

    <form id="form" action="{{ route('dashboard.sliders.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header card-header-stretch justify-content-end">
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                @foreach ($languages as $key => $language)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($key == 0) active @endif" data-bs-toggle="tab"
                                            href="#lang_{{ $language->code }}">{{ $language->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            @foreach ($languages as $key => $language)
                                <div class="tab-pane fade @if ($key == 0) show active @endif" id="lang_{{ $language->code }}"
                                    role="tabpanel">
                                    @include('admin.form_input_area.language_inputs', ['language_id' => $language->id,
                                    'short_desc' => true, 'desc' => false,
                                    'sub_title' => true, 'button_title' => true, 'seo' => false])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        @include('admin.sliders.image_select', ['create' => true])
                        <div class="col-lg-12">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold form-label mb-2">Yay??nlanma Tarihi</label>
                                <div class="position-relative d-flex align-items-center mb-4">
                                    <span class="svg-icon position-absolute ms-4 mb-1 svg-icon-2">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    <input class="form-control form-control-solid ps-12 flatpickr-input date_picker" name="release_date"
                                        value="{{old('release_date')}}" placeholder="Tarih Se??in" id="kt_datepicker_1"
                                        type="text" readonly="readonly">
                                </div>
                            </div>
                        </div>
                        @include('admin.form_input_area.right_side_inputs', [ 'status' => true, 'image' => false,
                        'row_number'
                        => true])
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body p-4">
                        <div class="d-block text-center">
                            <a href="{{ route('dashboard.sliders.index') }}" class="btn btn-light me-3"><i
                                    class="fas fa-arrow-left"></i> Geri D??n</a>
                            <button form="form" type="submit" class="btn btn-light-success">
                                <i class="far fa-save"></i>
                                <span class="indicator-label">Kaydet</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
