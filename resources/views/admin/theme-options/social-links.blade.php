@php
    $seos = DB::table('s_e_o_s')->first();
    @endphp
@extends('admin.admin-master')

@section('content')
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
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Social Media') }}
                                    </li>
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
                            <div class="box-header">
                                <h2>{{ __('Put your Social Media Links') }}</h2>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box">
                            <div class="box-body">
                                <form class="forms-sample" action="{{ route('social.update', $socials->id) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="facebook">{{ __('Facebook') }}</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ $socials->facebook }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">{{ __('Twitter') }}</label>
                                        <input type="text" class="form-control" name="twitter"
                                            value="{{ $socials->twitter }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram">{{ __('Instagram') }}</label>
                                        <input type="text" class="form-control" name="instagram"
                                            value="{{ $socials->instagram }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">{{ __('Youtube') }}</label>
                                        <input type="text" class="form-control" name="youtube"
                                            value="{{ $socials->youtube }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin">{{ __('linkedin') }}</label>
                                        <input type="text" class="form-control" name="linkedin"
                                            value="{{ $socials->linkedin }}">
                                    </div>


                                    <button type="submit" class="btn btn-primary mr-2">{{ __('Update') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
