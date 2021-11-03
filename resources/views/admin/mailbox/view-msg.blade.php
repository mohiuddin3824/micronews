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
                        <h3 class="page-title">{{ $seos->meta_author }}</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">{{__('Message')}}</li>
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



                            <div class="box-body">
                                {{-- <div class="mailbox-controls with-border clearfix mt-15">
                                    <div class="float-left">
                                        <button type="button" class="btn btn-outline btn-sm" data-toggle="tooltip" title=""
                                            data-original-title="Print">
                                            <i class="fa fa-print"></i></button>
                                    </div>
                                    <div class="float-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline btn-sm" data-toggle="tooltip"
                                                data-container="body" title="" data-original-title="Delete">
                                                <i class="fa fa-trash-o"></i></button>
                                            <button type="button" class="btn btn-outline btn-sm" data-toggle="tooltip"
                                                data-container="body" title="" data-original-title="Reply">
                                                <i class="fa fa-reply"></i></button>
                                            <button type="button" class="btn btn-outline btn-sm" data-toggle="tooltip"
                                                data-container="body" title="" data-original-title="Forward">
                                                <i class="fa fa-share"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.btn-group -->

                                </div> --}}
                                <!-- /.mailbox-controls -->
                                <div class="mailbox-read-info">
                                    <h3>{{$viewMessage->subject}}</h3>
                                </div>
                                <div class="mailbox-read-info bb-0 clearfix">
                                    
                                    <h5 class="no-margin">{{$viewMessage->name}}<br>
                                        <small>From: {{$viewMessage->email}}</small>
                                        <span class="mailbox-read-time pull-right">{{$viewMessage->created_at->diffForHumans()}}</span>
                                    </h5>
                                </div>
                                <!-- /.mailbox-read-info -->
                                <div class="mailbox-read-message">
                                    {!! $viewMessage->message !!}
                                </div>
                                <!-- /.mailbox-read-message -->
                            </div>
                           
                            <div class="box-footer">
                                
                                <button type="button" class="btn btn-rounded btn-danger"><a href="{{route('delete.message', $viewMessage->id)}}" class="text-light"><i class="fa fa-trash-o"></i>
                                    Delete</a></button>
                                    <button type="button" class="btn btn-rounded btn-primary"><a href="{{route('admin.message')}}" class="text-light"><i class="fa Example of fa-arrow-left"></i>
                                        {{__('Back to Inbox')}}</a></button>
                                
                            </div>
                            <!-- /.box-footer -->

                            <!-- /. box -->


                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
