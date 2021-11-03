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
								<li class="breadcrumb-item" aria-current="page">{{ __('Create New Advertisement') }}</li>
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
                                        <a href="{{ route('all.adverts') }}" class="btn btn-success">{{__('Ad list')}}</a>
                                    </div>
                                </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            
                            <form class="forms-sample" action="{{route('store.advert')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="ad_name">Select Ad Name</label>
                                    <select name="ad_name" class="form-control">
                                        <option> -- Select Widget --</option>
                                        <option> {{__('Top Header')}} </option>
                                        <option> {{__('Home Sidebar One')}} </option>
                                        <option> {{__('Home Sidebar Two')}} </option>
                                        <option> {{__('Home Sidebar Three')}} </option>
                                        <option> {{__('Home Section Middle One')}} </option>
                                        <option> {{__('Home Section Middle Two')}} </option>
                                        <option> {{__('Home Before Footer')}} </option>
                                        <option> {{__('Single Page Sidebar One')}} </option>
                                        <option> {{__('Single Page Sidebar Two')}} </option>
                                        <option> {{__('Single Page Middle')}} </option>
                                        <option> {{__('Single Page Before Footer')}} </option>
                                        <option> {{__('Category Page Sidebar One')}} </option>
                                        <option> {{__('Category Page Sidebar Two')}} </option>
                                        <option> {{__('Category Page Sidebar Three')}} </option>
                                        <option> {{__('Category Before Footer')}} </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ad_link">{{ __('Ad Link') }}</label>
                                    <input type="text" class="form-control" name="ad_link">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="ad_code">{{__('Ad Code')}}</label>
                                    <textarea class="form-control" name="ad_code" id="ad_content" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">{{__('Ad Status')}}</label>
                                    <select name="status" class="form-control">
                                        <option value="1"> Enabeld</option>
                                        <option value="0"> Dissabeld</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Add New Advert') }}</button>
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