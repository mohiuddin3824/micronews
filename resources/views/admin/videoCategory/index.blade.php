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
								<li class="breadcrumb-item" aria-current="page">{{__('Video Categories')}}</li>
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
                                        <a href="{{ route('create.videocategory') }}" class="btn btn-success">{{__('Add New Video Category')}}</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a class="btn btn-danger float-sm-left" href="{{route('trashed.videocategory')}}">{{__('Trashed Categories')}}</a>
                                    </div>
                                </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{__('Category id')}}</th>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Slug')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($categories->count())
                                            @foreach ($categories as $cat)                                                              
                                                <tr>
                                                    <td>{{ $cat->id }}</td>
                                                    <td>{{ $cat->category_name }}</td>
                                                    <td>{{ $cat->category_slug }}</td>
                                                    
                                                    <td>
                                                        <a href="{{ route('edit.videocategory',$cat->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                                        <a href="{{ route('soft.videodelete',$cat->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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