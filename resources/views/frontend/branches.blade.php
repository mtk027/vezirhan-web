@extends('frontend.layouts.app')
@section('title', __('branches') )

@section('content')
    <section id="body" class="header_padding">
        <div class="branches-page py-60">
            <div class="container">
                <div class="content">
                    <div class="row">
                        @foreach ($data as $item)
                            <div class="col-lg-4 col-md-6 col-12">
                                <a href="/{{ $item->description->url }}" class="image-wrapper">
                                    <img src="{{ asset($item->default_photo->path) }}"
                                        alt="{{ $item->default_photo->alt }}"
                                        title="{{ $item->default_photo->file_title }}">
                                </a>
                                <div class="text-wrapper text-center mt-3">
                                    <a href="/{{ $item->description->url }}" class="title baloo_font">{!! $item->description->title !!}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
