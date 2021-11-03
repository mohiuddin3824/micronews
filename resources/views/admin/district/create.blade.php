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
								<li class="breadcrumb-item" aria-current="page">{{ __('Add New District') }}</li>
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
                                <a href="{{ route('districts') }}" class="btn btn-success">{{__('District list')}}</a>
                            </div>
                        </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                    
                    <form class="forms-sample" action="{{route('store.district')}}" method="POST">
                        
                            @csrf
                              <div class="form-group">
                                  <label for="district_name">{{ __('District Name') }}</label>
                                  <input type="text" class="form-control" name="district_name">
                                  @error('district_name')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="district_slug">{{ __('District Slug') }}</label>
                                  <input type="text" class="form-control" name="district_slug">
                                  @error('district_slug')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                <label>{{__('Selelct Division')}}</label>
                                <select class="js-example-basic-single" name="division_id" style="width:100%; padding: 8px 2px; background:#2a3038; color:#fff">
                                  <option disabled selected>{{__('Select Division')}}</option>
                                  @foreach ($holyalldivisions as $div)
                                  
                                  <option value="{{$div->id}}">{{$div->division_name}}</option>
                                    
                                  @endforeach
                                  
                                </select>
                                @error('division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <button type="submit" class="btn btn-primary mr-2">{{ __('Add New District') }}</button>
                          </form>
                   <!-- /.box-body -->
                </div>
                 <!-- /.box -->      
            </div> 
        </div>
    </section>
    </div>
    </div>

@endsection