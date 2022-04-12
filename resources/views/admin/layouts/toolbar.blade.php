<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-place="true" data-kt-place-mode="prepend"
            data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@yield('title')
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Yönetim Paneli</small>
            </h1>
        </div>
        <div class="d-flex align-items-center py-1">
            @if ($slug != 'create' && $slug != 'edit' && $slug != 'dashboard' && $slug != 'menus' && $slug != 'libraries' && $slug != 'settings' && $slug != 'translations' && $slug != 'contact-requests' && $slug != 'faqs' && $slug != 'franchise-requests')
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <a href="/dashboard/{{ $slug }}/create"
                            class="btn btn-light-primary font-weight-bolder btn-sm">Yeni Ekle</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
