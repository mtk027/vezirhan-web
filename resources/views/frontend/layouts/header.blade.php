<section id="header" @if (Route::current()->getName())
    class="inner_page fixed"
    @endif>
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ config('settings.theme.logo') }}" alt="{{ config('settings.general.site_url') }}"
                    title="{{ config('settings.general.title') }}">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="mx-auto d-flex align-items-center">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        @foreach (General::get_menu(null, 1) as $item)
                            <li class="nav-item">
                                <a class="nav-link @if ($item->active && Str::contains(Route::current()->getName(), $item->active) == $item->active) active @endif" target="{{ $item->target }}" href="{{ $item->url }}" @if (count($item->sub_menu) > 0) id="menuDropdown{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="true" @endif>{{ $item->title }}</a>
                                @if (count($item->sub_menu) > 0)
                                    @foreach (General::get_menu($item->id, 1) as $sub_item)
                                        <ul class="dropdown-menu" aria-labelledby="menuDropdown{{ $item->id }}">
                                            <li><a class="dropdown-item" href="{{ $sub_item->url }}"
                                                    href="{{ $sub_item->target }}">{{ $sub_item->title }}</a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="right d-flex align-items-center">
                    <div class="language-selector dropdown me-5">
                        <button class="btn" type="button" id="languageDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ General::get_languages(LanguageHelper::getLanguageId())->title }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            @foreach (General::get_languages() as $language)
                                @if ($language->id != LanguageHelper::getLanguageId())
                                    <li><a class="dropdown-item"
                                            href="{{ route('change_language', $language->code) }}">{{ $language->title }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="menu-button d-flex flex-column">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</section>
<section id="sidebar" class="d-flex flex-column justify-content-center">
    <div class="close-sidebar"><i class="fas fa-times"></i></div>
    <div class="menu-items">
        @foreach (General::get_menu(null, 2) as $item)
            <span class="list-item"><a href="{{ $item->url }}"
                    target="{{ $item->target }}">{{ $item->title }}</a></span>
        @endforeach
    </div>
    <div class="footer">
        <div class="social-media bg-not-colored d-none d-xl-flex">
            @include('frontend.layouts.socialmedia')
        </div>
        <img src="{{ config('settings.theme.logo') }}" alt="{{ config('settings.general.site_url') }}"
            title="{{ config('settings.general.title') }}">
    </div>
</section>
<div class="fixed_phone d-none d-lg-flex">
    <div class="icon-wrapper">
        <a href="tel:+{{General::line_by_line(config('settings.contact.phone'))[0]}}"><i class="fas fa-phone-alt"></i></a>
    </div>
</div>
<div class="fixed_whatsapp d-none d-lg-flex">
    <div class="icon-wrapper">
        <a href="https://api.whatsapp.com/send?phone={{General::line_by_line(config('settings.contact.phone'))[0]}}"><i class="fab fa-whatsapp"></i></a>
    </div>
</div>

