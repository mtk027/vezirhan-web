@extends('admin.layouts.master')
@section('menu', 'galleries')
@section('title', 'Galeri Görselleri')
@section('content')
    <div class="row">
        @include('admin.layouts.success')
        @include('admin.layouts.error')
        <div class="col-lg-12">
            <div class="card card-custom example example-compact gutter-b">
                <div class="card-body">
                    <div class="d-flex flex-wrap">
                        <div class="col-lg-12 library gallery">
                            <div class="gallery_wrapper d-none">
                                <form id="form" action="{{ route('dashboard.galleries.store') }}" method="POST">
                                    @csrf
                                    <button form="form" type="submit" class="btn btn-light-success w-100 mb-3">
                                        <i class="far fa-save"></i>
                                        <span class="indicator-label">Kaydet</span>
                                    </button>
                                    <div class="fv-row fv-plugins-icon-container">
                                        <input type="file" name="gallery[]" id="gallery" data-filepond="true"
                                            value="{{ $slugs }}" data-allow-reorder="true"
                                            label-idle="Dosyalarınızı Sürükleyip Bırakın veya <span class='filepond--label-action'> Dosya Seçin </span>"
                                            allow-multiple="true" accepted-file-types="image/*" accept="image/*">
                                    </div>
                                </form>
                            </div>
                            <div class="loader">
                                <span>Yükleniyor...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.copy').click(function() {
            let id = $(this).data('id')
            var copyText = document.getElementById('coppied_' + id);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            $(this).tooltip('show')
        })
        $(document).delegate(".filepond--action-remove-item", "click", function() {
            console.log("first")
        })
    </script>
@endsection
