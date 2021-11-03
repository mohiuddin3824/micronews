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
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>
                        <div class="p-30 rounded30 box-shadowed" style="background: #000000b5;">
                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif
                            <div class="items-center justify-between">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                    
                                    <div class="form-group">
                                            
                                        <button type="submit" class="btn btn-primary btn-rounded">
                                            {{ __('Resend Verification Email') }}
                                        </button>
                                    </div>
                                </form>
                    
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                    
                                    <button type="submit" class="btn btn-info btn-rounded">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>


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
