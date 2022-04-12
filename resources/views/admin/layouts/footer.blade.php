<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="text-dark order-2 order-md-1">
            <a target="_blank" href="https://www.limonist.com" class="text-muted fw-bold me-1 d-flex align-items-center"><img src="{{asset('img/limonist.png')}}" alt="" style="height: 40px;width:100px; object-fit:contain"></a>
        </div>
    </div>
</div>
<div class="modal fade" id="file_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="file_search" placeholder="Görsel Arayın...">
            </div>
            <div class="modal-body row">
                @foreach (General::get_files() as $item)
                    <a class="item col-lg-2 col-3 searchable_item">
                        <img class="img-thumbnail" name="{{$item['name']}}" data-src="{{$item['file']}}" src="#">
                        <span class="image-name text-center">{{ $item['name'] }}<span>
                    </a>
                @endforeach
                <p class="not-found alert alert-warning mx-auto" style="display: none">
                    Aradığınız kelimeyi içeren görsel bulunamadı!
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary select_image">Seçimi Uygula</button>
            </div>
        </div>
    </div>
</div>