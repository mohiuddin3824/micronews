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
                            <li class="breadcrumb-item" aria-current="page">{{__('Trashed Tags')}}</li>
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
                                <div class="col-6 text-right">
                                    <a href="{{ route('create.tag') }}" class="btn btn-primary">{{__('Add New Tag')}}</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-success float-sm-left" href="{{route('all.tags')}}">{{__('Tag List')}}</a>
                                </div>
                            </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{__('Tag Id')}}</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Slug')}}</th>
                                        <th>{{__('Description')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($trashedTags->count())
                                        @foreach ($trashedTags as $tag)                                                              
                                            <tr>
                                                <td>{{ $tag->id }}</td>
                                                <td>{{ $tag->name }}</td>
                                                <td>{{ $tag->slug }}</td>
                                                <td>
                                                    @if ($tag->description == !NULL)
                                                        {{ Str::words($tag->description, 20, ' ...') }}
                                                    @else
                                                        <span class="badge badge-danger">{{__('No Description')}}</span>   
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('restore.tag', $tag->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-saved"></span></a>
                                                    
                                                    <a href="{{route('delete.tag', $tag->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
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