<!DOCTYPE html>
<html lang="en">
 @php
    $seos = DB::table('s_e_o_s')->first();
    $headers = App\Models\Header::first();
    $role1 = App\Models\Role::where('id', 6)->first();
    $role2 = App\Models\Role::where('id', 7)->first();
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="shortcut icon" href="{{asset($headers->favicon)}}" type="image/x-icon">
        
    <title>{{$seos->meta_author}}</title>

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
                        <div class="p-30 rounded30 box-shadowed" style="background: #fef9f6;">
                            
                            <form method="POST" action="{{ route('front.register') }}">
                                @csrf
                    
                                <div class="form-group">
                                    <label for="role_id">{{ __('Register As') }}</label>
                                    <select class="form-control block mt-1 w-full" name="role_id">
                                        <option disabled selected>{{ __('Select Role') }}</option>                                
                                        <option value="{{$role1->id}}">{{__('Content Contributor')}}</option>
                                        <option value="{{$role2->id}}">{{__('Subscriber')}}</option>                                        
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name"> {{ __('Name') }}</label>
                                    <input id="name" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                    
                                <div class="form-group">
                                    <label for="pass">{{ __('Password') }}</label>
                                    <input id="pass" class="form-control block mt-1 w-full" type="password" name="pass" required autocomplete="new-password" />
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                    
                                {{-- <div class="form-group">
                                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirmation" class="form-control block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div> --}}
                                
                    
                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <label for="terms">
                                            <div class="flex items-center">
                                                <input type="checkbox" name="terms" id="terms"/>
                    
                                                <div class="ml-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endif
                    
                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                    
                                    <button class="btn btn-primary">{{ __('Register') }}</button>
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
