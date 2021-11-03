@php
    $seos = DB::table('s_e_o_s')->first();
    $role = Auth::User()->role_id;
    
@endphp
@extends('admin.admin-master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Edit User') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            @if ( $role == 1 || $role == 2) 
                            <div class="box-header with-border">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('all.users') }}"
                                            class="btn btn-success">{{ __('User list') }}</a>
                                    </div>
                                </div>
                            </div>
                            @else

                            @endif
                            <!-- /.box-header -->
                            <div class="box-body">

                                <form class="forms-sample" action="{{route('update.user')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$editUser->id}}">
 
                                    <div class="form-group">
                                        <label for="role_id">{{ __('Select Role') }}</label>
                                        <select class="js-example-basic-single" name="role_id"
                                            style="width:100%; padding: 8px 2px; background:#2a3038; color:#fff">
                                            <option disabled selected>{{ __('Select User') }}</option>
                                            @foreach ($roles as $role)

                                                <option value="{{ $role->id }}" {{$role->id == $editUser->role_id ? 'selected': ''}}>{{ $role->role }}</option>

                                            @endforeach
                                            
                                        </select>

                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="name">{{ __('User Name') }}</label>
                                        <input type="text" class="form-control" name="name" value="{{$editUser->name}}">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('User Email') }}</label>
                                        <input type="email" class="form-control" name="email" value="{{$editUser->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">{{ __('Mobile') }}</label>
                                        <input type="text" class="form-control" name="phone" value="{{$editUser->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{ __('Address') }}</label>
                                        <input type="text" class="form-control" name="address" value="{{$editUser->address}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('User Description') }}</label>
                                        <textarea name="description" class="form-control" cols="30" rows="10">{{$editUser->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">{{ __('Facebook Link') }}</label>
                                        <input type="text" class="form-control" name="facebook" value="{{$editUser->facebook}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">{{ __('Twitter Link') }}</label>
                                        <input type="text" class="form-control" name="twitter" value="{{$editUser->twitter}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram">{{ __('Instagram Link') }}</label>
                                        <input type="text" class="form-control" name="instagram" value="{{$editUser->instagram}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">{{ __('Youtube Link') }}</label>
                                        <input type="text" class="form-control" name="youtube" value="{{$editUser->youtube}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="profile_photo">{{ __('Profile Photo') }}</label>
                                        <input type="file" name="profile_photo" id="profile_photo">
                                    </div>
                                    <div>
                                        @if ($editUser->profile_photo)
                                            <img src="{{ asset($editUser->profile_photo) }}" class="img-thumbnail" id="profileThmb" alt="user" style="width: 200px; height: 200px;">
                                        @else
                                            <img src="{{asset('backend/images/avatar/avatar-6.png')}}" class="img-thumbnail" id="profileThmb" alt="{{Auth::User()->name}}" style="width: 200px; height: 200px;">
                                        @endif    
                                        <input type="hidden" name="oldimage" value="{{ $editUser->profile_photo }}">
                                    </div>


                                    <button type="submit" class="btn btn-primary mr-2">{{ __('Update Profile') }}</button>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#profile_photo').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#profileThmb').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
@endsection
