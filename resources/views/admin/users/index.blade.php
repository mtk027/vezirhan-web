@extends('admin.layouts.master')
@section('menu', 'users')
@section('title', 'Kullanıcı Güncelle')
@section('content')

@include('admin.layouts.success')
@include('admin.layouts.error')
    <form id="content" data-page="edit" action="{{ route('dashboard.users.update', $item['id']) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom example example-compact gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Kullanıcı Güncelle</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="col-lg-12 mb-4">
                                <div class="form-group">
                                    <label for="name" class="form-label required">İsim</label>
                                    <input type="text" name="name" class="form-control form-control-solid"
                                        value="{{ $item['name'] }}" placeholder="İsim" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Parola</label>
                                    <input type="text" name="password" class="form-control form-control-solid"
                                        value="{{ old('password') }}" placeholder="Parola">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" form="content"
                                    class="btn btn-primary mr-2  float-right">Kaydet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
