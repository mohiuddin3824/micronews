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
								<li class="breadcrumb-item" aria-current="page">{{ __('Add New Role') }}</li>
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
                                        <a href="{{ route('all.roles') }}" class="btn btn-success">{{__('Role list')}}</a>
                                    </div>
                                </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            
                                <form class="forms-sample" action="{{route('store.role')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category_name">{{ __('Role Name') }}</label>
                                        <input type="text" class="form-control" name="role">
                                        @error('role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="role form-group">
                                        <h2>{{__('Distribute Permission')}}</h2>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="post" id="post" value="1">
                                            <label for="post"
                                                class="block">{{ __('post') }}</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="category" id="category" value="1">
                                            <label for="category"
                                                class="block">{{ __('category') }}</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="division" id="division" value="1">
                                            <label for="division"
                                                class="block">{{ __('division') }}</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="district" id="district" value="1">
                                            <label for="district"
                                                class="block">{{ __('district') }}</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="menu" id="menu" value="1">
                                            <label for="menu"
                                                class="block">{{ __('menu') }}</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="photo_gallery" id="photo_gallery" value="1">
                                            <label for="photo_gallery"
                                                class="block">{{ __('photo_gallery') }}</label>
                                        </div>

                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="video" id="video" value="1">
                                            <label for="video"
                                                class="block">{{ __('video') }}</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="seo" id="seo" value="1">
                                            <label for="seo"
                                                class="block">{{ __('seo') }}</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="general_setting" id="general_setting" value="1">
                                            <label for="general_setting"
                                                class="block">{{ __('general setting') }}</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="header" id="header" value="1">
                                            <label for="header"
                                                class="block">{{ __('header') }}</label>
                                        </div>
                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="footer" id="footer" value="1">
                                            <label for="footer"
                                                class="block">{{ __('footer') }}</label>
                                        </div>

                                        <div class="custom-checkbox">
                                            <input type="checkbox" name="ads" id="ads" value="1">
                                            <label for="ads"
                                                class="block">{{ __('ads') }}</label>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('Create Role') }}</button>
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