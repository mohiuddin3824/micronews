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
								<li class="breadcrumb-item" aria-current="page">{{__('User')}}</li>
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
                                    <a href="{{route('create.user')}}" class="btn btn-success">{{__('Add New User')}}</a>
                                </div> 
                                <div class="col-6 text-right">
                                    <a href="{{route('all.users')}}" class="btn btn-primary">{{__('User List')}}</a>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="userTable" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Role')}}</th>
                                            <th>{{__('Photo')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($trashUsers->count())
                                            @foreach ($trashUsers as $user)                                                              
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->roles->role }}</td>
                                                    <td><img src="{{ asset($user->profile_photo) }}" alt="{{$user->name}}" style="width:80px; height:80px;"></td>
                                                    
                                                    <td>
                                                        <a href="{{route('restore.user', $user->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-saved"></span></a>
                                                        <a href="{{route('delete.user', $user->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
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