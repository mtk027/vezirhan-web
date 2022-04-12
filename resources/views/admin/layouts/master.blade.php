<!DOCTYPE html>
<html lang="tr">

<head>
    @include('admin.layouts.header')
</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @include('admin.layouts.sidebar')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('admin.layouts.topbar')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @include('admin.layouts.toolbar', ['slug' => General::get_slug()])
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container">
                            @yield('content')
                        </div>
                    </div>
                </div>
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
    </div>
    <script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/loadingoverlay.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/flatpickr.tr.js') }}"></script>
    <script src="{{ asset('admin/assets/js/filepond/filepond.preview.js') }}"></script>
    <script src="{{ asset('admin/assets/js/filepond/filepond.validate.js') }}"></script>
    <script src="{{ asset('admin/assets/js/filepond/filepond.poster.js') }}"></script>
    <script src="{{ asset('admin/assets/js/filepond/filepond.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('admin/assets/js/nestable.js') }}"></script>
    <script src="{{ asset('admin/assets/js/variables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ajax.js') }}"></script>
    <script src="{{ asset('admin/assets/js/set_plugins.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    @yield('js')

</body>
<!--end::Body-->

</html>
