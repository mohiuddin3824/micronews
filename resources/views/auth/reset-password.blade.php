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
                        
                        <div class="p-30 rounded30 box-shadowed" style="background: #000000b5;">
                            
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                    
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    
                                <div class="form-group">
                                    <label for="email" class="form-controll">{{ __('Email') }}</label>
                                    <input id="email" class="form-control pl-15 bg-transparent text-white plc-white" type="email" name="email" :value="old('email', $request->email)" required autofocus>
                                </div>
                    
                                <div class="mt-4">
                                    <label for="password">{{ __('New Password') }}</label>
                                    <input id="password" class="form-control pl-15 bg-transparent text-white plc-white" type="password" name="password" required autocomplete="new-password">
                                </div>
                    
                                <div class="mt-4">
                                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirmation" class="form-control pl-15 bg-transparent text-white plc-white" type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                    
                                <div class="flex items-center justify-end mt-4">
                                    
                                    <button type="submit" class="btn btn-info btn-rounded mt-10">{{ __('Reset Password') }}</button>
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
