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
								<li class="breadcrumb-item" aria-current="page">{{ __('Add New Tag') }}</li>
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
                                    <a href="{{ route('all.tags') }}" class="btn btn-success">{{__('Tag list')}}</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            
                            <form class="forms-sample" action="{{route('store.tag')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">{{ __('Tag Name') }}</label>
                                    <input type="text" class="form-control" name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }}</label>
                                    <input type="text" class="form-control" name="slug">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('Tag Description') }}</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Add New Tag') }}</button>
                            </form>
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