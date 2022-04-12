@extends('frontend.layouts.app')
@section('title', __('gallery') )

@section('content')
    <section id="body" class="header_padding">
        <div class="gallery-page py-60">
            <div class="container">
                <div class="content">
                    <div class="row">
                        @foreach ($files as $file)
                            <div class="col-lg-3 col-md-6 col-12">
                                <a href="{{ asset($file->path) }}" data-fancybox @if($file->file_title) data-caption="{{$file->file_title}} @endif">
                                    <img src="{{ asset($file->path) }}" alt="{{$file->alt}}" title="{{$file->file_title}}" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
