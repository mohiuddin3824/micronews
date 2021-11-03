 @php
    $seos = DB::table('s_e_o_s')->first();
    $role = Auth::User()->role_id;
@endphp
@extends('admin.admin-master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">{{$seos->meta_author}}</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Profile')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12 col-lg-5 col-xl-4">

                        <div class="box box-inverse bg-img"  data-overlay="2">
                           
                            <div class="box-body text-center pb-50">
                                <a href="#">
                                    
                                    @if ($userProfile->profile_photo)
                                        <img src="{{ asset($userProfile->profile_photo) }}" class="img-thumbnail" id="profileThmb" alt="{{Auth::User()->name}}" >
                                    @else
                                        <img src="{{asset('backend/images/avatar/avatar-6.png')}}" class="img-thumbnail" id="profileThmb" alt="{{Auth::User()->name}}">

                                    @endif
                                </a>
                                <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{$userProfile->name}}</a>
                                </h4>
                                <span><i class="fa fa-map-marker w-20"></i> {{$userProfile->roles->role}}</span>
                            </div>

                            <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                                <li>                                
                                    <p class="joined-text">Posts: {{ App\Models\Post::where('user_id', $userProfile->id)->count() }}</p>
                                </li>
                                
                            </ul>
                        </div>

                        <!-- Profile Image -->
                        <div class="box">
                            <div class="box-body box-profile">
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <p>{{__('Email :')}}<span class="text-gray pl-10">{{$userProfile->email}}</span> </p>
                                            <p>{{__('Phone :')}}<span class="text-gray pl-10">{{$userProfile->phone}}</span></p>
                                            <p>{{__('Address :')}}<span class="text-gray pl-10">{{$userProfile->address}}</span>
                                            </p>
                                            
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="pb-15">
                                            <p class="mb-10">{{__('Social Profile')}}</p>
                                            <div class="user-social-acount">
                                                <button class="btn btn-circle btn-social-icon btn-facebook"><a target="__blank" href="{{$userProfile->facebook}}"><i
                                                        class="fa fa-facebook"></i></a></button>
                                                <button class="btn btn-circle btn-social-icon btn-twitter"><a target="__blank" href="{{$userProfile->twitter}}"><i
                                                        class="fa fa-twitter"></i></a></button>
                                                <button class="btn btn-circle btn-social-icon btn-instagram"><a target="__blank" href="{{$userProfile->instagram}}"><i
                                                        class="fa fa-instagram"></i></a></button>
                                                <button class="btn btn-circle btn-social-icon btn-youtube"><a target="__blank" href="{{$userProfile->youtube}}"><i
                                                            class="fa fa-youtube"></i></a></button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box">
                            <div class="box-body">
                                <div class="col-12">
                                    <div>
                                        @if ( $role == 1 || $role == 2) 
                                            <a href="{{route('edit.user', $userProfile->id)}}" class="btn btn-success">{{__('Edit Profile')}}</a>
                                        @else
                                            <a href="{{route('user.edit.profile', $userProfile->id)}}" class="btn btn-info">{{__('Edit Profile')}}</a>
                                        @endif
                                        <a href="{{route('reset.pass', $userProfile->id)}}" class="btn btn-primary">{{__('Chahnge Password')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                    </div>


                    <div class="col-12 col-lg-7 col-xl-8">

                       <div class="box">
                           <div class="box-hehader">
                               <h2 class="text-center">{{__('About Me')}}</h2>
                           </div>
                           <div class="box-body">
                               <p>{{$userProfile->description}}</p>
                           </div>
                       </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
