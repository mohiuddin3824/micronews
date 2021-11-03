@php
$seos = DB::table('s_e_o_s')->first();
$role = Auth::User()->role_id;
$authuserNews = App\Models\Post::where('user_id', Auth::id())->orderBy('id', 'DESC')->take(6)->get();
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
                                <li class="breadcrumb-item" aria-current="page">{{ __('All Posts') }}</li>
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
                                    <a href="{{ route('create.post') }}"
                                        class="btn btn-success">{{ __('Add New Post') }}</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-danger float-sm-left"
                                        href="{{ route('trashed.posts') }}">{{ __('Trashed Posts') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example6" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __(' id') }}</th>
                                            <th>{{ __('date') }}</th>
                                            <th>{{ __('visitors') }}</th>
                                            <th>{{ __('post title') }}</th>
                                            <th>{{ __('post view') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                      @foreach ($analyticsData as $data)
                                      <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $data['date'] }}</td>
                                        <td>{{ $data['visitors'] }}</td>
                                        <td>{{ $data['pageTitle'] }}</td>
                                        <td>{{ $data['pageViews'] }}</td>
                                      </tr>
                                      @endforeach
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
