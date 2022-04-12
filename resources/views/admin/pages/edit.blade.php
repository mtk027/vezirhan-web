@extends('admin.layouts.master')
@section('menu', 'pages')
@section('title', 'Sayfa Düzenle')
@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <form id="form" action="{{ route('dashboard.pages.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header card-header-stretch">
                        <div class="left align-self-center">
                            <a href="#" class="btn btn-light-danger font-weight-bolder btn-sm">Sitede Görüntüle</a>
                        </div>
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                @foreach ($languages as $key => $language)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($key == 0) active @endif" data-bs-toggle="tab"
                                            href="#lang_{{ $language->id }}">{{ $language->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            @foreach ($data->descriptions as $key => $description)
                                <div class="tab-pane fade @if ($description->language_id == 1) show active @endif"
                                    id="lang_{{ $description->language_id }}" role="tabpanel">
                                    @include('admin.form_input_area.language_inputs', ['description' => $description,
                                    'language_id' => $description->language_id, 'short_desc' => true, 'desc' => true,
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
                        @include('admin.form_input_area.right_side_inputs', ['status' => true, 'image' => true, 'row_number'
                        => true])
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body p-4">
                        <div class="d-block text-center">
                            <a href="{{ route('dashboard.pages.index') }}" class="btn btn-light me-3"><i
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
