@extends('frontend.layouts.app')
@section('title', 'Anasayfa')

@section('content')
    @foreach ($blocks as $block)
        @php
            $data_json = json_decode($block->json);
        @endphp
        @include("frontend.homepage_block.block_{$loop->iteration}",['data'=>$data_json])
    @endforeach
@endsection
