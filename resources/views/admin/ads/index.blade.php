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
								<li class="breadcrumb-item" aria-current="page">{{__('Categories')}}</li>
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
                                    <div class="col-12 text-right">
                                        <a href="{{ route('create.ad') }}" class="btn btn-success">{{__('Add New Advertise')}}</a>
                                    </div>
                                </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{__('Ad id')}}</th>
                                            <th>{{__('Ad Name')}}</th>
                                            <th>{{__('Ad Link')}}</th>
                                            <th>{{__('Ad Code')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($allAds->count())
                                            @foreach ($allAds as $ad)                                                              
                                                <tr>
                                                    <td>{{ $ad->id }}</td>
                                                    <td>{{ $ad->ad_name }}</td>
                                                    <td>{{ $ad->ad_link }}</td>
                                                    <td>
                                                        
                                                        {{ \Illuminate\Support\Str::limit($ad->ad_code, 50, $end='...') }}
                                                            
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="{{route('edit.advert', $ad->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                                        <a href="{{route('delete.advert', $ad->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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