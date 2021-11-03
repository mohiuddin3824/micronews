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
                                <li class="breadcrumb-item" aria-current="page">{{ __('Contact Page Information') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form class="forms-sample" action="{{route('contact.update', $cinfos->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $cinfos->id }}">
                        <div class="box">
                            <div class="box-body">
                                
                                
                                <div class="form-group">
                                    <label for="location">{{ __('Location') }}</label>
                                    <textarea name="location" class="form-control" id="location" cols="30" rows="10">{{$cinfos->location}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="location">{{ __('Contact Mail') }}</label>
                                    <textarea name="email" class="form-control" id="email" cols="30" rows="10">{{$cinfos->email}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="location">{{ __('Contact Phone') }}</label>
                                    <textarea name="phone" class="form-control" id="phone" cols="30" rows="10">{{$cinfos->phone}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gmap">{{ __('Google Map') }}</label>
                                    <textarea name="gmap" class="form-control" id="gmap" cols="30" rows="10">{{$cinfos->gmap}}</textarea>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">{{ __('Save Changes') }}</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection
