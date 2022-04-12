@extends('admin.layouts.master')
@section('title', 'Anasayfa')
@section('menu', 'admin_homepage')
@section('content')
    <div class="row gy-5 g-xl-8">
        <div class="col-xxl-4">
            <div class="card card-xxl-stretch">
                <div class="card-header border-0 bg-success py-5">
                    <h3 class="card-title fw-bolder text-white">Hızlı Menü</h3>
                </div>
                <div class="card-body ps-0 pe-0 pt-0">
                    <div class="mixed-widget-2-chart card-rounded-bottom bg-success" data-kt-color="success"
                        style="height: 100px"></div>
                    <div class="card-p mt-n20 position-relative">
                        <div class="row g-0">
                            <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <i class="fas fa-bezier-curve"></i>
                                </span>
                                <a href="{{ route('dashboard.branches.create') }}" class="text-warning fw-bold fs-6">Şube Ekle</a>
                            </div>
                            <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                    <i class="fa fa-cogs"></i>
                                </span>
                                <a href="{{ route('dashboard.settings.index') }}" class="text-primary fw-bold fs-6">Genel
                                    Ayarlar</a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row g-0">
                            <!--begin::Col-->
                            <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                                <!--begin::Svg Icon | path: icons/duotone/Design/Layers.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                    <i class="fab fa-servicestack"></i>
                                </span>
                                <!--end::Svg Icon-->
                                <a href="{{ route('dashboard.properties.index') }}" class="text-danger fw-bold fs-6 mt-2">Özellikler</a>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col bg-light-success px-6 py-8 rounded-2">
                                <!--begin::Svg Icon | path: icons/duotone/Communication/Urgent-mail.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                    <i class="fas fa-compass"></i>
                                </span>
                                <!--end::Svg Icon-->
                                <a href="{{ route('dashboard.menus.index') }}" class="text-success fw-bold fs-6 mt-2">Menüler</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <div class="col-xxl-8">
            <div class="card card-xxl-stretch">
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder mb-2 text-dark">Son İşlemler</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    @if (count($activities) > 0)
                        <div class="timeline-label">
                            @foreach ($activities as $activity)
                                <div class="timeline-item">
                                    <div class="timeline-label fw-bolder text-gray-800 fs-6">
                                        {{ General::date_format($activity->created_at, 'H:mm') }}
                                    </div>
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-primary fs-1"></i>
                                    </div>
                                    <div class="timeline-content fw-bold text-gray-800 ps-3">{!! $activity->description !!} <br>
                                        ({{ General::date_format($activity->created_at, 'D MMMM, Y') }})
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--end::Row-->
@endsection
