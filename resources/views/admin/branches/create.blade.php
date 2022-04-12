@extends('admin.layouts.master')
@section('menu', 'branches')
@section('title', 'Şube Ekle')
@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.error')

    <form id="form" action="{{ route('dashboard.branches.store') }}" method="POST">
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
                                    'short_desc' => false, 'desc' => true,
                                    'sub_title' => false, 'button_title' => false, 'seo' => true])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        @include('admin.form_input_area.right_side_inputs', ['status' => true,'color' => false, 'image' =>
                        true, 'row_number' => false])
                        <div class="col-lg-12">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold form-label mb-2">Telefon Numarası (Her satıra 1 numara)</label>
                                <textarea name="phone" rows="3" class="form-control form-control-solid title"
                                    placeholder="Telefon Numarası giriniz.">{{ old('phone') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold form-label mb-2">Enlem</label>
                                <input type="text" name="lat" class="form-control form-control-solid title"
                                    placeholder="Enlem giriniz." value="{{ old('lat') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold form-label mb-2">Boylam</label>
                                <input type="text" name="lng" class="form-control form-control-solid title"
                                    placeholder="Boylam giriniz." value="{{ old('lng') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold form-label mb-2">Adres</label>
                                <textarea name="address" rows="3" class="form-control form-control-solid title"
                                    placeholder="Adres giriniz.">{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body p-4">
                        <div class="d-block text-center">
                            <a href="{{ route('dashboard.branches.index') }}" class="btn btn-light me-3"><i
                                    class="fas fa-arrow-left"></i> Geri Dön</a>
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
