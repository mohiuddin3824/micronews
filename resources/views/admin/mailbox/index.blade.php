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
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('User Messages')}}</li>
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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{__('Message Id')}}</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('E-mail')}}</th>
                                        <th>{{__('Subject')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($message->count())
                                        @foreach ($message as $msg)                                                              
                                            <tr>
                                                <td>{{ $msg->id }}</td>
                                                <td>{{ $msg->name }}</td>
                                                <td>{{ $msg->email }}</td>
                                                <td>{{ $msg->subject }}</td>
                                                
                                                <td>
                                                    <a href="{{route('view.message', $msg->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                    <a href="{{route('delete.message', $msg->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->      
            </div> 
        </div>
    </section>
</div>
</div>

@endsection