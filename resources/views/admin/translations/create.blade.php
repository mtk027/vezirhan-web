@extends('admin.layouts.master')
@section('menu', 'translations')
@section('title', 'Dil Ekle')
@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.error')

    <form id="form" action="{{ route('dashboard.translations.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-stretch justify-content-end">
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="row mb-7 align-items-center">
                                <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Başlık</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control form-control-solid" name="title"
                                        placeholder="Başlık giriniz." value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="row mb-7 align-items-center">
                                <label class="required fs-6 fw-bold form-label mb-2 col-lg-2 text-end">Ülke Kodu</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control form-control-solid" name="code"
                                        placeholder="Kod giriniz. Örn.: tr,en,ar" value="{{ old('code') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-block text-center">
                            <a href="{{ route('dashboard.translations.index') }}" class="btn btn-light me-3"><i
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
