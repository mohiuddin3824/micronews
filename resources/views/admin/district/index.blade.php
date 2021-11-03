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
                                     <li class="breadcrumb-item" aria-current="page">{{ __('Districts') }}</li>
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
                                         <a href="{{ route('create.district') }}"
                                             class="btn btn-success">{{ __('Add New District') }}</a>
                                     </div>
                                     <div class="col-6 text-right">
                                         <a class="btn btn-danger float-sm-left"
                                             href="{{ route('trashed.district') }}">{{ __('Trashed Districts') }}</a>
                                     </div>
                                 </div>
                             </div>
                             <!-- /.box-header -->
                             <div class="box-body">
                                 <div class="table-responsive">
                                     <table id="example5" class="table table-bordered table-striped" style="width:100%">

                                         <thead>
                                             <tr>
                                                 <th> {{ __('District ID') }} </th>
                                                 <th>{{ __('District Name') }} </th>
                                                 <th>{{ __('Division Name') }}</th>
                                                 <th> {{ __('District Slug') }} </th>
                                                 <th> {{ __('Action') }} </th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @if ($districts->count())
                                                 @foreach ($districts as $item)
                                                     <tr>
                                                         <td>{{ $item->id }}</td>
                                                         <td class="py-1">
                                                             <a href="">{{ $item->district_name }}</a>
                                                         </td>
                                                         <td><a href="">{{ $item->division->division_name }}</a></td>

                                                         <td> {{ $item->district_slug }} </td>

                                                         <td>
                                                             <button class="btn btn-primary"><a class="text-white"
                                                                     href="{{ route('edit.district', $item->id) }}"><span
                                                                         class="glyphicon glyphicon-edit"></span></a></button>
                                                             <button class="btn btn-danger"><a class="text-white"
                                                                     href="{{ route('delete.district', $item->id) }}"><span
                                                                         class="glyphicon glyphicon-trash"></span></a></button>

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
