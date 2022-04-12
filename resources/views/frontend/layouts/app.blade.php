<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ config('settings.general.description') }}" />
    <link rel="icon" href="{{ config('settings.general.favicon') }}" />
    <link rel="apple-touch-icon" href="{{ config('settings.general.favicon') }}" />
    <script src="https://kit.fontawesome.com/9f6f62aa5e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    @stack('style')
<title>@hasSection('title')@yield('title') - {{ config('settings.general.title') }} @else
    {{ config('settings.general.title') }} @endif
</title>
</head>

<body>
@include('frontend.layouts.header')
<section id="body">
    @yield('content')
</section>
@include('frontend.layouts.footer')
<script src="{{ asset('/js/bundle.min.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/franchise.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhpogR3ePL3nFimrwAyNdUn3qo8B26taU&libraries=places">
</script>
<script>
    var locations = "{{ General::get_branch_locations() }}";
    locations = JSON.parse(locations.replaceAll("&quot;", "\""));
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: new google.maps.LatLng(locations[0][1], locations[0][2]),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon: "{{ asset('/img/marker.png') }}",
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>
@yield('js')
</body>

</html>
