 @php
    $seos = DB::table('s_e_o_s')->first();
    @endphp
@extends('admin.admin-master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
								<li class="breadcrumb-item" aria-current="page">{{ __('Update Advertisement') }}</li>
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
                            
                            <form class="forms-sample" action="{{route('update.advert')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$editAd->id}}">
                                <div class="form-group">
                                    <label for="ad_name">Select Ad Name</label>
                                    <select name="ad_name" class="form-control">
                                        <option> -- Select Widget --</option>
                                        <option {{ $editAd->ad_name == 'Top Header' ? 'selected' : ''}}> {{__('Top Header')}} </option>
                                        <option {{ $editAd->ad_name == 'Home Sidebar One' ? 'selected' : ''}}> {{__('Home Sidebar One')}} </option>
                                        <option {{ $editAd->ad_name == 'Home Sidebar Two' ? 'selected' : ''}}> {{__('Home Sidebar Two')}} </option>
                                        <option {{ $editAd->ad_name == 'Home Sidebar Three' ? 'selected' : ''}}> {{__('Home Sidebar Three')}} </option>
                                        <option {{ $editAd->ad_name == 'Home Section Middle One' ? 'selected' : ''}}> {{__('Home Section Middle One')}} </option>
                                        <option {{ $editAd->ad_name == 'Home Section Middle Two' ? 'selected' : ''}}> {{__('Home Section Middle Two')}} </option>
                                        <option {{ $editAd->ad_name == 'Home Before Footer' ? 'selected' : ''}}> {{__('Home Before Footer')}} </option>
                                        <option {{ $editAd->ad_name == 'Single Page Sidebar One' ? 'selected' : ''}}> {{__('Single Page Sidebar One')}} </option>
                                        <option {{ $editAd->ad_name == 'Single Page Sidebar Two' ? 'selected' : ''}}> {{__('Single Page Sidebar Two')}} </option>
                                        <option {{ $editAd->ad_name == 'Single Page Middle' ? 'selected' : ''}}> {{__('Single Page Middle')}} </option>
                                        <option {{ $editAd->ad_name == 'Single Page Before Footer' ? 'selected' : ''}}> {{__('Single Page Before Footer')}} </option>
                                        <option {{ $editAd->ad_name == 'Category Page Sidebar One' ? 'selected' : ''}}> {{__('Category Page Sidebar One')}} </option>
                                        <option {{ $editAd->ad_name == 'Category Page Sidebar Two' ? 'selected' : ''}}> {{__('Category Page Sidebar Two')}} </option>
                                        <option {{ $editAd->ad_name == 'Category Page Sidebar Three' ? 'selected' : ''}}> {{__('Category Page Sidebar Three')}} </option>
                                        <option {{ $editAd->ad_name == 'Category Before Footer' ? 'selected' : ''}}> {{__('Category Before Footer')}} </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ad_link">{{ __('Ad Link') }}</label>
                                    <input type="text" class="form-control" name="ad_link" value="{{$editAd->ad_link}}">
                                    
                                </div>
                                

                                <div class="form-group">
                                    <label for="ad_code">{{__('Ad Code')}}</label>
                                    <textarea class="form-control" name="ad_code" id="ad_content" cols="30" rows="10">{{$editAd->ad_code}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">{{__('Ad Status')}}</label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{$editAd->status == 1 ? 'selected': ''}}> Enabeld</option>
                                        <option value="0" {{$editAd->status == 0 ? 'selected': ''}}> Dissabeld</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Update') }}</button>
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

<script type="text/javascript">
    $(document).ready(function() {

        $('#adImage').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#adThmb').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });
</script>

@endsection