@extends('admin.layouts.master')
@section('menu', 'happy-customers')
@section('title', 'Müşteri Yorumunu Düzenle')
@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <form id="form" action="{{ route('dashboard.happy-customers.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header card-header-stretch justify-content-end">
                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                @foreach ($languages as $key => $language)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($key == 0) active @endif" data-bs-toggle="tab"
                                            href="#lang_{{ $language->id }}">{{ $language->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            @foreach ($data->descriptions as $key => $description)
                                <div class="tab-pane fade @if ($description->language_id == 1) show active @endif"
                                    id="lang_{{ $description->language_id }}" role="tabpanel">
                                    @include('admin.form_input_area.language_inputs', ['description' => $description,
                                    'language_id' => $description->language_id, 'short_desc' => true, 'desc' => false,
                                    'sub_title' => false, 'button_title' => false, 'seo' => false])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        @include('admin.form_input_area.right_side_inputs', ['status' => true,'color' => false, 'image' => true, 'row_number'
                        => false])
                        <div class="col-lg-12">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold form-label mb-2">Lokasyon</label>
                                <input type="text" class="form-control form-control-solid title" name="location" placeholder="Lokasyon giriniz." value="{{ $data->location }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body p-4">
                        <div class="d-block text-center">
                            <a href="{{ route('dashboard.happy-customers.index') }}" class="btn btn-light me-3"><i
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
