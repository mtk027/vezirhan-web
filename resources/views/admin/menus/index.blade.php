@extends('admin.layouts.master')
@section('menu', 'menus')
@section('title', 'Menü Yönetimi')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom example example-compact gutter-b">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="datatable" class="datatable table table-row-bordered gy-5 loading"
                                data-url="{{ route('dashboard.menus.index') }}">
                                <thead class="thead-light">
                                    <tr class="fw-bold fs-6 text-muted">
                                        <th data-column="id">#</th>
                                        <th data-column="title">Başlık</th>
                                        <th data-column="status">Durum</th>
                                        <th data-column="created_at">Oluşturma Tarihi</th>
                                        <th style="width: 120px" data-column="action">İşlem</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
