<div class="question py-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12 image-wrapper text-center">
                <img src="{{ General::get_image($data->image) }}">
            </div>
            <div class="col-lg-7 col-12 form-wrapper">
                <span class="colored baloo_font mb-5">{{ __('what_you_wonder') }}</span>
                <form id="faq_form" action="{{ route('send_faq_form') }}" autocomplete="off">
                    <div class="form-group position-relative">
                        <textarea name="question" rows="8" class="form-control"
                            placeholder="{{ __('write_question') }}" maxlength="150"></textarea>
                        <span class="counter">0 / 150</span>
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('send') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@section('js')
    <script>
        $('#faq_form').submit(function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            let url = $(this).attr('action')
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: data,
                method: 'POST',
                success: function(data) {
                    console.log(data);
                    if (data == true) {
                        Swal.fire({
                            title: "{{ __('success') }}",
                            text: "{{ __('success_contact_form') }}",
                            icon: "success",
                            confirmButtonText: "{{ __('close') }}",
                        }).then((result) => {
                            $("#faq_form").trigger('reset')
                        });
                    } else {
                        Swal.fire({
                            title: "{{ __('error') }}",
                            text: "{{ __('error_contact_form') }}",
                            icon: "error",
                            confirmButtonText: "{{ __('close') }}",
                        });
                    }
                }
            });
        })
    </script>
@endsection
