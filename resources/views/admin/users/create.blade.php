@php
    $seos = DB::table('s_e_o_s')->first();
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
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Add New User') }}</li>
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
                            <div class="box-header with-border">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('all.users') }}"
                                            class="btn btn-success">{{ __('User list') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <form class="forms-sample" action="{{route('store.user')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="role_id">{{ __('Select Role') }}</label>
                                        <select class="js-example-basic-single" name="role_id"
                                            style="width:100%; padding: 8px 2px; background:#2a3038; color:#fff">
                                            <option disabled selected>{{ __('Select User') }}</option>
                                            @foreach ($roles as $role)

                                                <option value="{{ $role->id }}">{{ $role->role }}</option>

                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="name">{{ __('User Name') }}</label>
                                        <input type="text" class="form-control" name="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('User Email') }}</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('User Description') }}</label>
                                        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('User Password') }}</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="profile_photo">{{ __('Profile Photo') }}</label>
                                        <input type="file" name="profile_photo" id="profile_photo">
                                    </div>
                                    <div class="form-group" style="width: 200px; height:200px;">
                                        <img src="" class="img-thumbnail" id="profileThmb" alt="user">
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">{{ __('Add New User') }}</button>
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
