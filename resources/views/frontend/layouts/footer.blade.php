<section id="footer">
    <div class="contact py-60" style="background-image: url('{{ config('settings.theme.footer_background') }}')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 col-12">
                    <div id="map" style="height: 350px"></div>
                </div>
                <div class="col-lg-7 col-md-6 col-12 text-wrapper">
                    <h5 class="title">{{ config('settings.general.title') }}</h5>
                    <div class="description">
                        @foreach (General::line_by_line(config('settings.contact.address')) as $address)
                            <span class="d-block"><i class="fas fa-map-marker-alt me-1"></i>
                                {{ $address }}</span>
                        @endforeach
                        @foreach (General::line_by_line(config('settings.contact.phone')) as $phone)
                        <a href="tel:{{$phone}}" class="d-block"><i class="fas fa-phone-alt me-1"></i> {{$phone}}</a>
                        @endforeach
                        <img class="logo" src="{{ config('settings.theme.logo') }}" alt="{{ config('settings.general.site_url') }}" title="{{ config('settings.general.title') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social-media">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="limonist d-flex align-items-center">
                    <a class="logo" target="_blank" href="https://www.limonist.com" class="me-3"><img src="{{asset('img/limonist.png')}}" alt="Limonist"></a><span>{{date('Y')}} {{__('all_rights_reserved')}}</span>
                </div>
                <div class="social d-flex align-items-center">
                    @include('frontend.layouts.socialmedia')
                </div>
            </div>
        </div>
    </div>
</section>
<div class="sidebar_overlay d-none"></div>
