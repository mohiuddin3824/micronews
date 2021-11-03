<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
    $headers = App\Models\Header::first();
    $seos = DB::table('s_e_o_s')->first();
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset($headers->favicon)}}" type="image/x-icon">
    <meta name="keywords" content="{{$seos->meta_keywords}}">
    <meta name="description" content="{{$seos->meta_description}}">
    <meta name="google-site-verification" content="{{$seos->google_verification}}" />
    <meta name="yandex-verification" content="{{$seos->yandex_verification}}" />
    @yield('opengp')
    <title>{{$seos->meta_author}}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0" nonce="2qoHohmU"></script>
    
    @include('frontend.body.header')
    

    @yield('content')
    
    @include('frontend.body.footer')

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/js/all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/js/switcher.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/js/custom.js')}}"></script>
    <script type="text/javascript">
         $(function () {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
</body>

</html>