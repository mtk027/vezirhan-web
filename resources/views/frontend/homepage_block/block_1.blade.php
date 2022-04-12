<section id="slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <div class="image-wrapper position-relative">
                        <img class="d-block" src="{{ asset($slider->default_photo->path) }}"
                            alt="{{ $slider->default_photo->alt }}"
                            title="{{ $slider->default_photo->file_title }}">
                    </div>
                    <div class="text-wrapper text-left">
                        <h4 class="slide-sub_title animate__animated animate__fadeInLeftBig text-capitalize"
                            data-animation="animate__fadeInLeftBig">{{ $slider->description->sub_title }}</h4>
                        <h1 class="slide-title animate__animated animate__fadeInLeftBig text-capitalize arizonia_font"
                            data-animation="animate__fadeInLeftBig">{{ $slider->description->title }}</h1>
                        <h4 class="slide-sub_title animate__animated animate__fadeInLeftBig text-capitalize"
                            data-animation="animate__fadeInLeftBig">{{ $slider->description->short_description }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="swiper-pagination d-none d-xl-flex flex-column align-items-center"></div>
    <div class="social-media d-none d-xl-flex flex-column">
        @include('frontend.layouts.socialmedia')
    </div>
</section>
