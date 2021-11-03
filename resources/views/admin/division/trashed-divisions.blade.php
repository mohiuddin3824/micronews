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
                                <a href="{{ route('create.division') }}" class="btn btn-success">{{__('Add New Division')}}</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('divisions') }}" class="btn btn-info">{{__('Division List')}}</a>
                            </div>
                        </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            
                                <thead>
                                  <tr>
                                    <th> Division Id </th>
                                    <th> Name </th>
                                    <th> Slug </th>
                                    <th> Action </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if ($trashedDivs->count())
                                    @foreach ($trashedDivs as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td class="py-1">
                                        {{$item->division_name}}
                                        </td>
                                        <td>
                                            {{$item->division_slug}}
                                            </td>
                                        
                                        <td> 
                                        <button class="btn btn-primary"><a class="text-white" href="{{route('restore.trashed.divisions', $item->id)}}"><span class="glyphicon glyphicon-saved"></span></a></button>
                                        <button class="btn btn-danger"><a class="text-white" href="{{route('delete.trashed.divisions', $item->id)}}"><span class="glyphicon glyphicon-remove"></span></a></button>
                                        
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