<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="#">
            <img alt="Logo" src="{{ config('settings.theme.logo') }}" class="h-50px logo" style="filter: brightness(0) invert(1);" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.5"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('admin_homepage'))) active @endif" href="{{ route('dashboard.index') }}">
                        <span class="menu-icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="menu-title">Yönetim Paneli</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">İçerik Yönetimi</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link" target="_blank" href="https://limonistcustomer.com/VEZIRHAN/panel/admin/login">
                            <span class="menu-icon"><i class="fas fa-utensils"></i></span>
                            <span class="menu-title">Menü Yönetimi</span>
                        </a>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('sliders'))) active @endif" href="{{ route('dashboard.sliders.index') }}">
                            <span class="menu-icon"><i class="fas fa-photo-video"></i></span>
                            <span class="menu-title">Slider</span>
                        </a>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('properties'))) active @endif" href="{{ route('dashboard.properties.index') }}">
                            <span class="menu-icon"><i class="fab fa-servicestack"></i></span>
                            <span class="menu-title">Özellikler</span>
                        </a>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('branches'))) active @endif" href="{{ route('dashboard.branches.index') }}">
                            <span class="menu-icon"><i class="fas fa-code-branch"></i></span>
                            <span class="menu-title">Şubeler</span>
                        </a>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('happy-customers'))) active @endif" href="{{ route('dashboard.happy-customers.index') }}">
                            <span class="menu-icon"><i class="fas fa-users"></i></span>
                            <span class="menu-title">Müşteri Yorumları</span>
                        </a>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('galleries'))) active @endif" href="{{ route('dashboard.galleries.index') }}">
                            <span class="menu-icon"><i class="fas fa-camera"></i></span>
                            <span class="menu-title">Galeri Görselleri</span>
                        </a>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('libraries'))) active @endif" href="{{ route('dashboard.libraries.index') }}">
                            <span class="menu-icon"><i class="far fa-folder-open"></i></span>
                            <span class="menu-title">Ortam Yöneticisi</span>
                        </a>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Formlar</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('faqs'))) active @endif" href="{{ route('dashboard.faqs.index') }}">
                            <span class="menu-icon"><i class="far fa-question-circle"></i></span>
                            <span class="menu-title">Sıkça Sorulan Sorular</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('contact-requests'))) active @endif" href="{{ route('dashboard.contact-requests.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-envelope-open"></i>
                            </span>
                        </span>
                        <span class="menu-title">İletişim Formu</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Genel Ayarlar</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('menus'))) active @endif" href="{{ route('dashboard.menus.index') }}">
                        <span class="menu-icon"><i class="fas fa-compass"></i></span>
                        <span class="menu-title">Menü Yönetimi</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('translations'))) active @endif" href="{{ route('dashboard.translations.index') }}">
                        <span class="menu-icon"><i class="fas fa-globe-europe"></i></span>
                        <span class="menu-title">Çeviri Yönetimi</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('homepage-blocks'))) active @endif" href="{{ route('dashboard.homepage-blocks.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fas fa-th-large"></i>
                            </span>
                        </span>
                        <span class="menu-title">Anasayfa Blok Yönetimi</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if(in_array(trim($__env->yieldContent('menu')),array('settings'))) active @endif" href="{{ route('dashboard.settings.index') }}">
                        <span class="menu-icon"><i class="fas fa-cog"></i></span>
                        <span class="menu-title">Ayarlar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
