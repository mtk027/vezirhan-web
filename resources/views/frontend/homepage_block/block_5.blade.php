<div class="happy-customers" style="background-image: url('{{ General::get_image($data->image) }}');">
    <div class="container">
        <div class="header-wrapper text-center">
            <h3 class="title baloo_font">{{$data->title}}</h3>
            <p class="sub_title w-50 mx-auto">{{$data->sub_title}}</p>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($happy_customers as $customer)
                <div class="swiper-slide">
                    <span class="icon"><i class="fas fa-quote-left"></i></span>
                    <div class="text-wrapper">
                        <p>{{$customer->description->short_description}}</p>
                    </div>
                    <div class="image-wrapper">
                        <img src="{{asset($customer->default_photo->path)}}" alt="{{$customer->default_photo->alt}}" title="{{$customer->default_photo->file_title}}">
                        <h4 class="title baloo_font">{{$customer->description->title}}</h4>
                        <span class="country baloo_font">{{$customer->location}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
