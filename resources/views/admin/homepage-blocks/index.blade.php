@extends('admin.layouts.master')
@section('menu', 'homepage-blocks')
@section('title', 'Anasayfa Bölümleri')

@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <form action="{{ route('dashboard.homepage-blocks.store') }}" id="form" method="POST">
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
                                            href="#lang_{{ $language->id }}">{{ $language->title }}</a>
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
                                            @foreach ($blocks as $block)
                                                @if ($block->language_id == $language->id)
                                                    <li class="nav-item">
                                                        <a class="nav-link text-capitalize @if ($block->key == 'block1') active @endif"
                                                            data-bs-toggle="tab"
                                                            href="#tab_{{ $block->key }}_{{ $language->id }}"
                                                            role="tab">{{ $block->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content pt-3">
                                            @foreach ($blocks as $block_key => $block)
                                                @if ($block->language_id == $language->id)
                                                    <div class="tab-pane fade @if ($block->key == 'block1') show active @endif"
                                                        id="tab_{{ $block->key }}_{{ $language->id }}" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <label
                                                                        class="required fs-6 fw-bold form-label mb-2">Durum</label>
                                                                    <select class="form-select form-select-solid fw-bolder"
                                                                        name="status[{{ $block->key }}][{{ $language->id }}]"
                                                                        data-control="select2" data-placeholder="Seçim Yap"
                                                                        data-hide-search="true">
                                                                        <option value="0" @if ($block->status == 0) selected @endif>Pasif
                                                                        </option>
                                                                        <option value="1" @if ($block->status == 1) selected @endif>Aktif
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                                    <label
                                                                        class="required fs-6 fw-bold form-label mb-2">Sıra</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-solid"
                                                                        name="row_number[{{ $block->key }}][{{ $language->id }}]"
                                                                        value="{{ $block->row_number }}">
                                                                </div>
                                                            </div>
                                                            @if ($block->json)
                                                                @foreach (json_decode($block->json, true) as $key => $block_json)
                                                                    @if ($key != 'data')
                                                                        @if ($key == 'description')
                                                                            <div class="col-lg-12">
                                                                                <div
                                                                                    class="fv-row mb-7 fv-plugins-icon-container">
                                                                                    <label
                                                                                        class="required fs-6 fw-bold form-label mb-2">{{ General::get_block_title($key) }}</label>
                                                                                    <textarea
                                                                                        name="{{ $key }}[{{ $block->key }}][{{ $language->id }}]"
                                                                                        class="tox-target tinymce">{{ $block_json }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        @elseif ($key == 'image')
                                                                            <div class="col-lg-6">
                                                                                <label
                                                                                    class="required fs-6 fw-bold form-label mb-2">{{ General::get_block_title($key) }}</label>
                                                                                <button
                                                                                    id="{{ $key }}[{{ $block_key }}][{{ $language->id }}]"
                                                                                    type="button"
                                                                                    class="btn btn-primary btn-sm modal_button d-flex align-items-center justify-content-center w-100 mb-3 text-center"
                                                                                    name="{{ $key }}[{{ $block_key }}][{{ $language->id }}]"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#file_modal">
                                                                                    <i
                                                                                        class="m-r-10 mdi mdi-folder-multiple-outline mr-3"></i>
                                                                                    <span>Sunucudan Seç</span>
                                                                                </button>
                                                                                <div
                                                                                    class="fv-row mb-7 fv-plugins-icon-container">
                                                                                    <input type="file"
                                                                                        name="{{ $key }}[{{ $block_key }}][{{ $language->id }}]"
                                                                                        id="{{ $key }}[{{ $block_key }}][{{ $language->id }}]"
                                                                                        data-filepond="true"
                                                                                        label-idle="Dosyalarınızı Sürükleyip Bırakın veya <span class='filepond--label-action'> Dosya Seçin </span>"
                                                                                        value="{{ $block_json }}"
                                                                                        accepted-file-types="image/*"
                                                                                        accept="image/*">
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <div class="col-lg-6">
                                                                                <div
                                                                                    class="fv-row mb-7 fv-plugins-icon-container">
                                                                                    <label
                                                                                        class="required fs-6 fw-bold form-label mb-2">{{ General::get_block_title($key) }}</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-solid"
                                                                                        name="{{ $key }}[{{ $block->key }}][{{ $language->id }}]"
                                                                                        value="{{ $block_json }}">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        @foreach ($block_json as $count_key => $block_json_data)
                                                                            <div class="row">
                                                                                @foreach ($block_json_data as $inner_key => $item)
                                                                                    <div class="col-lg-6">
                                                                                        <div
                                                                                            class="fv-row mb-7 fv-plugins-icon-container">
                                                                                            <label
                                                                                                class="fs-6 fw-bold form-label mb-2">{{ General::get_block_title($inner_key) }}</label>
                                                                                            <input type="text"
                                                                                                class="form-control form-control-solid"
                                                                                                name="data_{{ $inner_key }}[{{ $count_key }}][{{ $block->key }}][{{ $language->id }}]"
                                                                                                value="{{ $item }}">
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
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
