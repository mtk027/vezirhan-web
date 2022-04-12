@extends('admin.layouts.master')
@section('menu', 'settings')
@section('title', 'Genel Ayarlar')
@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.error')

    <form action="{{ route('dashboard.settings.store') }}" id="form" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-stretch">
                        <h3 class="card-title">Düzenle</h3>
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
                            @foreach ($languages as $key => $language)
                                <div class="tab-pane fade @if ($key == 0) show active @endif" id="lang_{{ $language->id }}"
                                    role="tabpanel">
                                    <div class="card-header card-header-stretch overflow-auto">
                                        <ul class="nav nav-stretch nav-line-tabs fw-bold border-transparent flex-nowrap"
                                            role="tablist" id="kt_layout_builder_tabs">
                                            @foreach ($groups as $group_key => $group)
                                                <li class="nav-item">
                                                    <a class="nav-link text-capitalize @if ($group_key == 0) active @endif"
                                                        data-bs-toggle="tab"
                                                        href="#tab_{{ $group->group }}_{{ $group_key }}_{{ $language->id }}"
                                                        role="tab">{{ $group->group_title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content pt-3">
                                            @foreach ($groups as $group_key => $group)
                                                <div class="tab-pane @if ($group_key == 0) active @endif"
                                                    id="tab_{{ $group->group }}_{{ $group_key }}_{{ $language->id }}">
                                                    <div class="row">
                                                        @include('admin.settings.form', ['settings' => $settings])
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="d-block float-right">
                                    <button form="form" type="submit" class="btn btn-light-success">
                                        <i class="far fa-save"></i>
                                        <span class="indicator-label">Kaydet</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
