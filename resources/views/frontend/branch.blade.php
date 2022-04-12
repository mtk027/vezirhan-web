@extends('frontend.layouts.app')
@section('title', $data->description->seo_title)

@section('content')
    <section id="body" class="header_padding">
        <div class="branch-detail-page py-60">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="image-wrapper">
                                <img src="{{ asset($data->default_photo->path) }}" alt="{{ $data->default_photo->alt }}"
                                    title="{{ $data->default_photo->file_title }}">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12 text-wrapper">
                            <div class="top d-flex align-items-center">
                                <h2 class="branch_title baloo_font">{!! $data->description->title !!}</h2>
                            </div>
                            <div class="detail row">
                                <div class="item content">
                                    <div class="description">
                                        <p class="description">{{ $data->address }}</p>
                                        @foreach (General::line_by_line($data->phone) as $phone)
                                            <a href="tel:{{ $phone }}" class="d-block"><i
                                                    class="fas fa-phone-alt me-1"></i> {{ $phone }}</a>
                                        @endforeach
                                        <div class="map mt-5">
                                            {!! $data->description->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
