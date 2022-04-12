@extends('frontend.layouts.app')
@section('title', __('contact') )

@section('content')
    <section id="body" class="header_padding">
        <div class="contact-page">
            {!! config('settings.contact.google_map') !!}
            <div class="contact-form py-60">
                <div class="container">
                    <h4 class="title baloo_font">{{ __('contact_us') }}</h4>
                    <p class="baloo_font">{{ __('opinion_suggestion') }}</p>
                    <form id="contact_form" action="{{ route('send_contact_form') }}" class="row"
                        autocomplete="off">
                        <div class="col-lg-6 col-12">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('name_surname') }}">
                        </div>
                        <div class="col-lg-6 col-12">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('email') }}">
                        </div>
                        <div class="col-12">
                            <input type="text" name="subject" class="form-control" placeholder="{{ __('subject') }}">
                        </div>
                        <div class="col-12">
                            <textarea name="message" rows="5" class="form-control"
                                placeholder="{{ __('message') }}"></textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn">{{ __('send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('#contact_form').submit(function(e) {
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
