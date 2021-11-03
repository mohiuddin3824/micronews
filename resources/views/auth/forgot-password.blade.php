<!DOCTYPE html>
<html lang="en">
 @php
    $seos = DB::table('s_e_o_s')->first();
    $headers = App\Models\Header::first();
    @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @if ($headers->favicon == !NULL)
        
    <link rel="shortcut icon" href="{{asset($headers->favicon)}}" type="image/x-icon">
    @endif
    
    @if ($seos->meta_author == !NULL)
        
    <title>{{$seos->meta_author}}</title
    @endif
    >

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>

<body class="hold-transition"
    style="background-image:url('{{ asset('backend/images/auth-bg/login-bg.jpg') }}'); background-repeat: no-repeat; background-size: cover;  background-position: center center; ">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">


            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="content-top-agile p-10">
                            <img class="img-fluid" src="{{asset($headers->header_logo)}}" alt="{{$seos->meta_author}}">
                        </div>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        <div class="p-30 rounded30 box-shadowed" style="background: #000000b5;">
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                    
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent text-white"><i
                                                    class="ti-email"></i></span>
                                        </div>
                                        <input class="form-control pl-15 bg-transparent text-white plc-white" id="email"
                                            type="email" name="email" :value="old('email')" required autofocus>
                                    </div>
                                </div>
                    
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info btn-rounded mt-10">{{ __('Email Me Password Reset Link') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>

</body>

</html>
