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
								<li class="breadcrumb-item" aria-current="page">{{ __('Edit Category') }}</li>
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
                                    <a href="{{ route('all.categories') }}" class="btn btn-success">{{__('Category list')}}</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form class="forms-sample" action="{{route('update.category')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <div class="form-group">
                                    <label for="category_name">{{ __('Category Name') }}</label>
                                    <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_slug">{{ __('Category Slug') }}</label>
                                    <input type="text" class="form-control" name="category_slug" value="{{$category->category_slug}}">

                                </div>
                                <div class="form-group">
                                    <label for="category_desc">{{ __('Category Description') }}</label>
                                    <textarea name="category_desc" class="form-control" cols="30" rows="10">{{$category->category_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_title">{{ __('Category Page Title') }}</label>
                                    <input type="text" class="form-control" name="category_title" value="{{$category->category_title}}">
                                </div>
                                <div class="form-group">
                                    <label for="category_bg">{{ __('Category Page Background') }}</label> <br>
                                    <input type="file" name="category_bg" id="image">

                                </div>

                                <div class="form-group">
                                    <img id="mainThmb" src="{{ asset($category->category_bg) }}" class="img-thumbnail">
                                    <input type="hidden" name="oldimage" value="{{ $category->category_bg }}">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Update Category') }}</button>
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

        $('#image').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#mainThmb').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });
</script>
@endsection
