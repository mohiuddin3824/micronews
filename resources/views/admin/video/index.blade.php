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
                                     <li class="breadcrumb-item" aria-current="page">{{ __('All Videos') }}</li>
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
                                         <a href="{{ route('add.video') }}"
                                             class="btn btn-success">{{ __('Add New Video') }}</a>
                                     </div>
                                     <div class="col-6 text-right">
                                         <a class="btn btn-danger float-sm-left"
                                             href="{{ route('trashed.Videos') }}">{{ __('Trashed Videos') }}</a>
                                     </div>
                                 </div>
                             </div>
                             <!-- /.box-header -->
                             <div class="box-body">
                                 <div class="table-responsive">
                                     <table id="videos" class="table table-bordered table-striped" style="width:100%">
                                         <thead>
                                             <tr>
                                                 <th>{{ __('Psot id') }}</th>
                                                 <th>{{ __('Video') }}</th>
                                                 <th>{{ __('Title') }}</th>
                                                 <th>{{ __('author') }}</th>
                                                 <th>{{ __('Category') }}</th>
                                                 <th>{{ __('Action') }}</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @if ($allvideos->count() > 0)
                                                 @foreach ($allvideos as $post)
                                                     <tr>
                                                         <td class="py-1">{{ $post->id }}</td>
                                                         <td class="py-1">

                                                            <img src="{{ asset($post->video_thumbnail) }}" alt="{{ $post->video_title }}"
                                                            style="width:80px; height:80;">
                                                         </td>
                                                         <td> {{ Str::words($post->video_title, 10, ' ...') }} </td>
                                                         @if ($post->repoter_name == !null)
                                                             <td><a href="">{{ $post->repoter_name }}</a></td>
                                                         @else
                                                             <td><a href="">{{ $post->user->name }}</a></td>
                                                         @endif
                                                         <td> <a href="">@if ($post->videocategory != null){{ $post->videocategory->category_name }}@endif</a> </td>

                                                         <td>
                                                             <a href="{{ url('video/' . $post->id) }}" target="__blank"
                                                                 class="badge badge-success">{{ __('View') }}</a>
                                                             <a href="{{ route('edit.video', $post->id) }}"
                                                                 class="badge badge-primary">{{ __('Edit') }}</a>
                                                             <a href="{{ route('sdelete.video', $post->id) }}"
                                                                 class="badge badge-danger">{{ __('Trash') }}</a>

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
