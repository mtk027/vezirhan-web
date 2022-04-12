@extends('admin.layouts.master')
@section('menu', 'translations')
@section('title', 'Statik Çeviriler')
@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <form id="form" action="{{ route('dashboard.translations.update', 1) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-stretch justify-content-between">
                        <div class="left align-self-center">
                            <button form="form" type="submit" class="btn btn-light-success btn-sm">
                                <i class="far fa-save"></i>
                                <span class="indicator-label">Kaydet</span>
                            </button>
                        </div>
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                @foreach ($languages as $key => $language)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($key != 0) dbl_click_delete_item @endif @if ($key == 0) active @endif" data-bs-toggle="tab" @if ($key != 0) data-bs-custom-class="tooltip-dark"
                                            rel="tooltip" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Silmek için çift tıklayın."
                                            data-url="{{ route('dashboard.translations.destroy', $language->id) }}"
                                @endif
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
                                    @foreach ($data as $item)
                                        @if ($item->language_id == $language->id && Str::startsWith($item->key, '/'))
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <label class="form-label mb-0">{{ $item->key }}</label>
                                                    <input type="hide" class="d-none"
                                                        name="key[{{ $language->code }}][]" value="{{ $item->key }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="text[{{ $language->code }}][]" value="{{ $item->text }}">
                                                </div>
                                                <hr class="mt-5">
                                            </div>
                                        @endif
                                    @endforeach
                                    @foreach ($data as $item)
                                        @if ($item->language_id == $language->id && !Str::startsWith($item->key, '/'))
                                            <div class="row align-items-center">
                                                <div class="col-lg-6">
                                                    <label class="form-label mb-0">{{ $item->key }}</label>
                                                    <input type="hide" class="d-none"
                                                        name="key[{{ $language->code }}][]" value="{{ $item->key }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="text[{{ $language->code }}][]"
                                                        value="{{ $item->text }}">
                                                </div>
                                                <hr class="mt-5">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <button form="form" type="submit" class="btn btn-light-success w-100">
                            <i class="far fa-save"></i>
                            <span class="indicator-label">Kaydet</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
