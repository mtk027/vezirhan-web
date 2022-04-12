@extends('admin.layouts.master')
@section('menu', 'contact-requests')
@section('title', 'İletişim Formu')
@section('content')
    <div class="card">
        <div class="card-body pt-0">
            <table id="donate_cart" class="datatable table table-row-bordered gy-5 loading"
                data-url="{{ route('dashboard.contact-requests.index') }}" data-filters='["subject","topic","fullname","mail","phone"]'>
                <thead>
                    <tr class="fw-bold fs-6 text-muted">
                        <th data-column="id">#</th>
                        <th data-column="subject">Form Konusu</th>
                        <th data-column="name">Gönderici İsim</th>
                        <th data-column="mail">Gönderici E-posta</th>
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
        let topic,user,subject
        $(document).delegate(".detail_modal", "click", function() {
            message = $(this).data('message')
            user = $(this).data('user')
            subject = $(this).data('subject')
            $('#detail_modal').modal('show')
        })
        $('#detail_modal').on('show.bs.modal', function(event) {
            var modal = $(this)
            modal.find('.modal-title').text(`${user}'dan gelen '${subject}' konulu mesaj.`)
            modal.find('.modal-body textarea').val(message)
        })
    </script>
@endsection
