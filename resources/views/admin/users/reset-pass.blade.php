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
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Update Password') }}</li>
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

                                <form action="{{route('update.pass')}}" method="POST">
                                    @csrf
                                      <div class="form-group">
                                        <label for="old_password">{{__('Old Password')}}</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="old_password" autocomplete="old-password" minlength="6">
                                            <div class="input-group-append new-password">
                                                 <span class="input-group-text mdi mdi-eye-outline"></span>
                                            </div>
                                         </div>
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
        
                                      <div class="form-group">
                                        <label for="new_password">{{__('New Password')}}</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="new_password" autocomplete="new-password" minlength="6">
                                            <div class="input-group-append new-password">
                                                 <span class="input-group-text mdi mdi-eye-outline"></span>
                                            </div>
                                         </div>
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
        
                                      <div class="form-group">
                                        <label for="password_confirmation">{{__('Confirm Password')}}</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password" minlength="6">
                                            <div class="input-group-append confirm-password">
                                                 <span class="input-group-text mdi mdi-eye-outline"></span>
                                            </div>
                                         </div>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                  
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">{{__('Change Password')}}</button>
                                    </div>
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
            
            $('.old-password').click(function(){
                $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
                let input = $(this).prev();
                input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            });

            $('.new-password').click(function(){
                $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
                let input = $(this).prev();
                input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            });
            
            $('.confirm-password').click(function(){
                $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
                let input = $(this).prev();
                input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            });

            
        });
    </script>

@endsection
