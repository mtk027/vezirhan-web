<div class="properties">
    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($properties as $property)
                    <div class="swiper-slide text-center" style="background-color: {{ $property->color }};">
                        @if ($property->description->description != '<p>#</p>')
                            <img src="{{ asset($property->default_photo->path) }}"
                                alt="{{ $property->default_photo->alt }}"
                                title="{{ $property->default_photo->file_title }}">
                            <div class="text-wrapper">
                                <h3 class="title baloo_font">{{ $property->description->title }}</h3>
                                <div class="description">
                                    {!! $property->description->description !!}
                                </div>
                            </div>
                        @else
                            <img class="big-image" src="{{ asset($property->default_photo->path) }}"
                                alt="{{ $property->default_photo->alt }}"
                                title="{{ $property->default_photo->file_title }}">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
