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
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    <span class="text-danger">{{ session('error') }}</span>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent text-white"><i
                                                    class="ti-user"></i></span>
                                        </div>
                                        <input class="form-control pl-15 bg-transparent text-white plc-white" id="email"
                                            type="email" name="email" :value="old('email')" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text  bg-transparent text-white"><i
                                                    class="ti-lock"></i></span>
                                        </div>
                                        <input class="form-control pl-15 bg-transparent text-white plc-white"
                                            id="password" type="password" name="password" required
                                            autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkbox text-white">
                                            <input type="checkbox" id="basic_checkbox_1" name="remember">
                                            <label for="basic_checkbox_1">Remember Me</label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <div class="fog-pwd text-right">
                                            @if (Route::has('password.request'))
                                                <a href="{{route('password.request')}}" class="text-white hover-info"><i
                                                        class="ion ion-locked"></i> Forgot
                                                    pwd?</a><br>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN
                                            IN</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                            
                            <div class="text-center text-white">
                                <p class="mt-20">{{__('Don\'t have an account?')}}</p>
                                <p class="gap-items-2 mb-20">
                                    <a class="btn btn-success btn-rounded" href="{{route('register')}}">{{__('Register')}}</a>
                                </p>
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
