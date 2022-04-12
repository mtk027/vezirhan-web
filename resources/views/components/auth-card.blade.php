<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-dark-100" style="background: url({{asset('admin/assets/progress-hd.png')}}); background-attachment: fixed;
background-size: 100%;
background-attachment: fixed;
background-repeat: no-repeat;
background-position: bottom;
background-color: #ddd">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
