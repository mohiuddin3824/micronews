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
                                     <li class="breadcrumb-item" aria-current="page">{{ __('Sub Menu') }}
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
                             <div class="box-header with-border">
                                 <h2>{{ __('Sub Menu Items') }}</h2>
                                 <a href="{{ route('create.submenu') }}"
                                     class="btn btn-primary float-right">{{ __('Add Sub Menu Item') }}</a>
                             </div>
                             <div class="box-body">
                                 <div class="table-responsive">
                                     <table id="subMenus" class="table table-bordered table-striped" style="width:100%">
                                         <thead>
                                             <tr>
                                                 <th> {{ __('SL') }} </th>
                                                 <th> {{ __('Item Name') }} </th>
                                                 <th> {{ __('Menu Name') }} </th>
                                                 <th> {{ __('Link') }} </th>
                                                 <th> {{ __('status') }} </th>
                                                 <th> {{ __('Position') }} </th>
                                                 <th> {{ __('Action') }} </th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @if ($submenus->count())
                                                 @foreach ($submenus as $key => $subMenuItem)
                                                     <tr>
                                                         <td>{{ $key + 1 }}</td>
                                                         <td>{{ $subMenuItem->name }}</td>
                                                         <td>{{ $subMenuItem->menu->name ?? '-' }}</td>
                                                         <td>{!! \Illuminate\Support\Str::limit($subMenuItem->link, 35, $end = '...') !!}</td>
                                                         <td>{{ $subMenuItem->status == 0 ? 'Disable' : 'Enable' }}</td>
                                                         <td>{{ $subMenuItem->position }}</td>
                                                         <td class="d-flex">
                                                             <a href="{{ route('edit.submenu', $subMenuItem->id) }}"
                                                                 class="btn btn-sm btn-primary mr-1"> {{ __('Edit') }}
                                                             </a>

                                                             <a href="{{ route('delelte.submenu', $subMenuItem->id) }}"
                                                                 class="btn btn-sm btn-danger"> {{ __('Delete') }} </a>

                                                         </td>
                                                     </tr>
                                                 @endforeach
                                             @else
                                                 <tr>
                                                     <td colspan="6">
                                                         <h5 class="text-center">{{ __('No subMenuItems found.') }}</h5>
                                                     </td>
                                                 </tr>
                                             @endif
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                         <!-- /.box-header -->
                     </div>
                 </div>
             </section>
         </div>
     </div>

 @endsection
