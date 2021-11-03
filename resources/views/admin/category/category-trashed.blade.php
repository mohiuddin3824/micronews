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
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Trashed Categories') }}</li>
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
                                        <a href="{{ route('create.category') }}"
                                            class="btn btn-success">{{ __('Add New Category') }}</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('all.categories') }}"
                                            class="btn btn-info">{{ __('Category List') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">

                                        <thead>
                                            <tr>
                                                <th> {{__('SL')}} </th>
                                                <th> {{__('Name')}} </th>
                                                <th> {{__('Description')}} </th>
                                                <th> {{__('Slug')}} </th>
                                                <th> {{__('Action')}} </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trashCats as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td class="py-1">
                                                        {{ $item->category_name }}
                                                    </td>
                                                    <td>
                                                        {{ $item->category_slug }}
                                                    </td>
                                                    <td>
                                                        @if ($item->category_desc == !null)
                                                            {{ Str::words($item->category_desc, 12, ' ...') }}
                                                        @else
                                                            <span
                                                                class="badge badge-danger">{{ __('No Description') }}</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <button class="btn btn-primary"><a class="text-white"
                                                                href="{{ route('restore.category', $item->id) }}"><span class="glyphicon glyphicon-saved"></span></a></button>
                                                        <button class="btn btn-danger"><a class="text-white"
                                                                href="{{ route('permanent.delete', $item->id) }}"><span class="glyphicon glyphicon-remove"></span></a></button>

                                                    </td>
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
