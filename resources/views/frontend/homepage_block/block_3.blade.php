<div id="about_us" class="corporate py-60">
    <div class="container">
        <div class="row">
            <div class="text-wrapper col-lg-5 col-md-8 col-12">
                <span class="arizonia_font">{{ $data->title }}</span>
                <p>{!! $data->description !!}</p>
            </div>
            <div class="image-wrapper col-lg-7 col-md-4 col-12">
                <img src="{{ General::get_image($data->image) }}">
            </div>
        </div>
        <div class="row progress-bars">
            <div class="col-lg-6 col-12">
                @foreach (array_slice($data->data, 0, 3) as $item)
                    @if ($item->title != '')
                        <div class="item">
                            <span class="title">{{ $item->title }}</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $item->percentage }}%;" aria-valuenow="{{ $item->percentage }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span>{{ $item->percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-lg-6 col-12">
                @foreach (array_slice($data->data, 3, 3) as $item)
                    @if ($item->title != '')
                        <div class="item">
                            <span class="title">{{ $item->title }}</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $item->percentage }}%;" aria-valuenow="{{ $item->percentage }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span>{{ $item->percentage }}%</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
