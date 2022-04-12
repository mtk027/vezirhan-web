@extends('admin.layouts.master')
@section('title', 'Menü İçeriği')
@section('menu', 'menus')
@section('content')

    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <style>

    </style>

    <div class="card">
        <div class="card-header card-header-stretch">
            <h3 class="card-title">{{ $data_menu->title }} İçeriği</h3>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                    @foreach ($languages as $key => $language)
                        <li class="nav-item">
                            <a class="nav-link @if ($key == 0) active @endif tab_nav" data-bs-toggle="tab"
                                data-lang="{{ $language->id }}"
                                href="#lang_{{ $language->code }}">{{ $language->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="tab-content" id="myTabContent">
                        @foreach ($languages as $key => $language)
                            <div class="tab-pane fade @if ($key == 0) show active @endif" id="lang_{{ $language->code }}"
                                role="tabpanel">
                                <div class="dd dd_{{ $language->id }}" id="nestables_{{ $language->code }}">
                                    <ol class="dd-list">
                                        @foreach ($data->sortBy('row_order') as $menu)
                                            @if ($menu->language_id == $language->id)
                                                <li class="dd-item dd3-item" data-id="{{ $menu->id }}"
                                                    data-title="{{ $menu->title }}" data-type="{{ $menu->type }}"
                                                    data-value="{{ $menu->value }}" data-image="{{ $menu->default_photo->slug ?? null }}"
                                                    data-language="{{ $language->id }}">
                                                    <div class="dd-handle dd3-handle"></div>
                                                    <div
                                                        class="dd3-content d-flex align-items-center justify-content-between">
                                                        <span>{{ $menu->title }}</span>
                                                        <div class="buttons d-flex">
                                                            <div class="item-edit me-2">Düzenle</div>
                                                            <div class="item-delete">Sil</div>
                                                        </div>
                                                    </div>
                                                    @if (isset($menu->sub_menu))
                                                        @include('admin.menus.sub_menu', ['sub_menu' => $menu->sub_menu])
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-7">
                    <form id="page_form" data-parsley-validate class="form-horizontal row"
                        action="{{ route('dashboard.menus.update', $data_menu) }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-lg-12 d-none">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <input type="hidden" class="form-control form-control-solid" name="id">
                            </div>
                        </div>
                        <div class="col-lg-12 d-none">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <input type="hidden" class="form-control form-control-solid language_id" name="language_id"
                                    value="1">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold form-label mb-2">Menü Başlığı</label>
                                <input type="text" class="form-control form-control-solid" name="title"
                                    placeholder="Menü başlığı giriniz.">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold form-label mb-2">Menü Tipi</label>
                                <select class="form-select form-select-solid fw-bolder menu_type" name="type"
                                    data-control="select2" data-placeholder="Seçim Yap" data-hide-search="false">
                                    @foreach (General::get_menu_types() as $key => $menu_type)
                                        <option value="{{ $key }}">{{ $menu_type['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold form-label mb-2">Menü Url</label>
                                @foreach (General::get_menu_types() as $key => $menu_type)
                                    @if ($menu_type['type'] == 'text')
                                        <div class="inputs_{{ $key }} all">
                                            <input type="text" class="form-control form-control-solid custom_value"
                                                name="value[{{ $key }}]" placeholder="Url giriniz.">
                                        </div>
                                    @elseif($menu_type['type'] == 'select')
                                        <div class="inputs_{{ $key }} all d-none">
                                            <select
                                                class="form-control form-select form-select-solid fw-bolder {{ $key }}_value"
                                                name="value[{{ $key }}]" data-control="select2"
                                                data-placeholder="Seçim Yap" data-hide-search="false">
                                                <option value=""></option>
                                                @foreach (General::get_all_data($menu_type['model']) as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->description ? $data->description->title : $data->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-end border-top pt-7">
                            <button type="button" class="btn btn-primary me-4 clear">Temizle <i class="fas fa-broom"></i>
                            </button>
                            <button type="submit" class="btn btn-success ml-auto">Değişiklikleri Kaydet <i
                                    class="fa fa-check"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $('.dd').nestable({
            maxDepth: 10
        });
        $('.dd').on('change', function() {
            $.ajax({
                url: '{{ route('dashboard.menus.dynamic_nestable') }}',
                type: "POST",
                data: {
                    data: $(`.dd_${$('.language_id').val()}`).nestable('serialize'),
                },
                success: function(data) {
                    console.log(data)
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
        });
        $("body").delegate(".item-delete", "click", function(e) {
            let item_id = $(this).closest(".dd-item").data('id')
            deleteItem(`${main_path}/admin/menus/${item_id}`, false)
        });
        $("body").delegate(".item-edit", "click", function(e) {
            $('#page_form').find("input[name='id']").val($(e.target).parents('.dd-item').data('id'))
            $('#page_form').find("input[name='title']").val($(e.target).parents('.dd-item').data('title'))

            let menu_type = $(e.target).parents('.dd-item').data('type')
            $(".menu_type").val(menu_type).trigger('change');
            $('.all').addClass('d-none')
            $(`.inputs_${$(e.target).parents('.dd-item').data('type')}`).removeClass('d-none')
            $(`.${menu_type}_value`).val($(e.target).parents('.dd-item').data('value')).trigger('change')
            $('#page_form').find("input[name='value[" + menu_type + "]']").val($(e.target).parents('.dd-item').data('value'))
        });

        $('.menu_type').on('select2:select', function(e) {
            $('.all').addClass('d-none')
            $(`.inputs_${e.params.data.id}`).removeClass('d-none')
        });
        $('.tab_nav').on('click', function() {
            $('.language_id').val($(this).data('lang'))
        })
        $('.clear').on('click', function() {
            $('#page_form')[0].reset();
            $('.all').addClass('d-none')
            $(`.inputs_0`).removeClass('d-none')
            $("input[name='id']").val('');
            $(".menu_type").val(0).trigger('change');
        })
    </script>
@endsection
