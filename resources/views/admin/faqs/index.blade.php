@extends('admin.layouts.master')
@section('menu', 'faqs')
@section('title', 'Sıkça Sorulan Sorular')
@section('content')
    <div class="card">
        <div class="card-body pt-0">
            <table id="donate_cart" class="datatable table table-row-bordered gy-5 loading"
                data-url="{{ route('dashboard.faqs.index') }}" data-filters=''>
                <thead>
                    <tr class="fw-bold fs-6 text-muted">
                        <th data-column="id">#</th>
                        <th data-column="created_at">Tarih</th>
                        <th data-column="action">İşlem</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!--end::Card body-->
    </div>
    <div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                </div>
                <div class="modal-body">
                    <textarea rows="4" class="form-control form-control-solid" readonly></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#detail_modal').modal('hide')">Kapat</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        let created_at,message
        $(document).delegate(".detail_modal", "click", function() {
            message = $(this).data('message')
            created_at = $(this).data('created_at')
            $('#detail_modal').modal('show')
        })
        $('#detail_modal').on('show.bs.modal', function(event) {
            var modal = $(this)
            modal.find('.modal-title').text(`${created_at} tarihinde gelen soru.`)
            modal.find('.modal-body textarea').val(message)
        })
    </script>
@endsection
