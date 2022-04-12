<ol class="dd-list">
    @foreach ($sub_menu->sortBy('order') as $sub)
        <li class="dd-item dd3-item" data-id="{{ $sub->id }}" data-title="{{ $sub->title }}"
            data-type="{{ $sub->type }}" data-value="{{ $sub->value }}"
            data-image="{{ $sub->default_photo->slug ?? null }}" data-language="{{ $language->id }}">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content d-flex align-items-center justify-content-between">
                <span>{{ $sub->title }}</span>
                <div class="buttons d-flex">
                    <div class="item-edit me-2">Düzenle</div>
                    <div class="item-delete">Sil</div>
                </div>
            </div>
            @if (isset($sub->sub_menu))
                @include('admin.menus.sub_menu', ['sub_menu' => $sub->sub_menu])
            @endif
        </li>
    @endforeach
</ol>
