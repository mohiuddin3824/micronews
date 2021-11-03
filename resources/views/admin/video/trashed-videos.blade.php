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
                                     <li class="breadcrumb-item" aria-current="page">{{ __('All Trashed Videos') }}</li>
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
                                         <a class="btn btn-info float-sm-left"
                                             href="{{ route('all.videos') }}">{{ __('Video List') }}</a>
                                     </div>
                                 </div>
                             </div>
                             <!-- /.box-header -->
                             <div class="box-body">
                                 <div class="table-responsive">
                                     <table id="example6" class="table table-bordered table-striped" style="width:100%">
                                         <thead>
                                             <tr>
                                                 <th>{{ __('id id') }}</th>
                                                 <th>{{ __('Video') }}</th>
                                                 <th>{{ __('Title') }}</th>
                                                 <th>{{ __('author') }}</th>
                                                 <th>{{ __('Category') }}</th>
                                                 <th>{{ __('Action') }}</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @if ($trashedVideos->count() > 0)
                                                 @foreach ($trashedVideos as $post)


                                                     <tr>
                                                         <td class="py-1">{{ $post->id }}</td>
                                                         <td class="py-1">
                                                             <video width="100" height="100" controls>
                                                                 <source src="{{ $post->video_link }}" type="video/mp4">
                                                             </video>
                                                         </td>
                                                         <td> {{ Str::words($post->video_title, 10, ' ...') }} </td>
                                                         @if ($post->repoter_name == !null)
                                                             <td>{{ $post->repoter_name }}</td>
                                                         @else
                                                             <td>{{ Auth::User()->name }}</td>
                                                         @endif
                                                         <td> @if ($post->videocategory != null){{ $post->videocategory->category_name }}@endif</td>
                                                         <td>
                                                             <a href="{{ route('restore.video', $post->id) }}"
                                                                 class="badge badge-primary"><span
                                                                     class="glyphicon glyphicon-saved"></span></a>
                                                             <a href="{{ route('pdelete.video', $post->id) }}"
                                                                 class="badge badge-danger"><span
                                                                     class="glyphicon glyphicon-remove"></span></a>

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
