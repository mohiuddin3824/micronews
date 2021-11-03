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
                                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                            class="mdi mdi-home-outline"></i></a></li>
                                                <li class="breadcrumb-item" aria-current="page">{{ __('Add New Post') }}</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="content">
                            <div class="row">
                                <div class="col-12">

                                    <div class="box box-shadowed">
                                        <div class="box-header without-border">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="">{{ __('Add New Post') }}</h2>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <a href="{{route('all.posts')}}" class="btn btn-success">{{ __('Post list') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->


                                    <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="row">
                                            <div class="col-md-9">

                                                <div class="box bl-3 border-primary">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="post_uper_title">{{ __('Post uper Sub Title ') }}</label>
                                                            <input type="text" class="form-control" name="post_uper_title"
                                                                placeholder="Post sub Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="post_title">{{ __('Post Title') }}</label>
                                                            <input type="text" class="form-control" name="post_title" placeholder="Post Title">
                                                            @error('post_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="post_sub_title">{{ __('Post Sub Title') }}</label>
                                                            <input type="text" class="form-control" name="post_sub_title" placeholder="Post Sub Title">
                                                        </div>

                                                        <div class="form-group">
                                                            <textarea id="posteditor" name="post_details" rows="20" cols="80">

                                                            </textarea>
                                                            @error('post_details')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label">{{__('Post Tags')}}</label>
                                                            <input type="text" class="w-100" id="tagnames" name="tags[]" data-role="tagsinput">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="box box-slided-up bl-3 border-primary">
                                                        <div class="box-header with-border">
                                                            <h4 class="box-title">{{ __('SEO Settings') }}</h4>
                                                            <ul class="box-controls pull-right">
                                                                <li><a class="box-btn-slide rotate-180" href="#"></a></li>
                                                            </ul>
                                                        </div>

                                                        <div class="box-body" style="display: block;">
                                                            <div class="form-group">
                                                                <label for="post_slug">{{ __('Post Slug') }}</label>
                                                                <input type="text" class="form-control" name="post_slug"
                                                                    placeholder="Post Slug">
                                                            </div>
                                                            <div class="callout">
                                                                <div class="form-group">
                                                                    <label for="seo_title">{{ __('Post SEO Title') }}</label>
                                                                    <input type="text" name="seo_title" class="form-control"
                                                                        placeholder="Post SEO Title">
                                                                </div>
                                                            </div>
                                                            <div class="box-body" style="display: block;">
                                                                <div class="form-group">
                                                                    <label for="seo_descp">{{ __('Post Meta Description') }}</label>
                                                                    <textarea rows="5" cols="5" name="seo_descp" class="form-control"
                                                                        placeholder="Meta Description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="box bl-3 border-primary">
                                                    <div class="box-header">
                                                        <h4>{{ __('Select, if Needed!') }}</h4>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <div class="custom-checkbox">
                                                                <input type="checkbox" name="lead" id="checkbox_123" value="1">
                                                                <label for="checkbox_123"
                                                                    class="block">{{ __('Is it Lead News?') }}</label>
                                                            </div>
                                                            <div class="custom-checkbox">
                                                                <input type="checkbox" name="lead2" id="checkbox_1235" value="1">
                                                                <label for="checkbox_1235"
                                                                    class="block">{{ __('Is it Elected News?') }}</label>
                                                            </div>
                                                            <div class="custom-checkbox">
                                                                <input type="checkbox" name="featured" id="checkbox_234" value="1">
                                                                <label for="checkbox_234"
                                                                    class="block">{{ __('Is it Featured?') }}</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box bl-3 border-primary">
                                                    <div class="box-header">
                                                        <label for="repoter_name">{{ __('Input Reporter Name') }}</label>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">

                                                            <input type="text" class="form-control" name="repoter_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box bl-3 border-primary">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>{{__('Selelct Division')}}</label>
                                                            <select class="js-example-basic-single" name="division_id" style="width:100%; padding: 8px 2px; background:#2a3038; color:#fff">
                                                            <option disabled selected>{{__('Select Division')}}</option>
                                                            @foreach ($allDivisions as $div)

                                                            <option value="{{$div->id}}">{{$div->division_name}}</option>

                                                            @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>{{__('Select District (Optional)')}}</label>
                                                            <select class="js-example-basic-single" id="district_id" name="district_id" style="width:100%; padding:8px 2px;">
                                                                <option disabled selected>{{__('Select District')}}</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>{{__('Select Category')}}</label>
                                                            <select class="js-example-basic-single" name="category_id" style="width:100%; padding: 8px 2px; background:#2a3038; color:#fff">
                                                                <option disabled selected>{{__('Select Category')}}</option>
                                                                @foreach ($allCats as $cat)

                                                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>

                                                                @endforeach

                                                            </select>
                                                            @error('category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="box bl-3 border-primary">
                                                    <div class="box-header">
                                                        <h4>{{ __('Add Featured Image') }}</h4>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <input type="file" name="post_thumbnail" id="image">

                                                        </div>

                                                        <div class="form-group">
                                                            <img src="" class="img-thumbnail" id="mainThmb" alt="add post thumbnail">
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>{{ __('Image Caption') }}</h4>
                                                            <span class="badge badge-info">{{ __('Optional') }}</span>
                                                            <textarea name="thumbnail_caption"
                                                                class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>{{ __('Image Alter Text') }}</h4>
                                                            <span class="badge badge-primary">{{ __('Recommended for SEO') }}</span>
                                                            <br>
                                                            <input type="text" name="thumbnail_alt" class="form-control">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <button class="btn btn-lg btn-success" style="font-size: 20px">{{__('Publish')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.box -->
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {

                        //For Sub district
                        $('select[name="division_id"]').on('change', function() {
                            var division_id = $(this).val();
                            if (division_id) {
                                $.ajax({
                                    url: "{{ url('/get/district/') }}/" + division_id,
                                    type: "GET",
                                    dataType: "json",
                                    success: function(data) {
                                        $("#district_id").empty();
                                        $.each(data, function(key, value) {
                                            $("#district_id").append('<option value="' + value.id +
                                                '">' + value.district_name + '</option>');
                                        });
                                    },

                                });
                            } else {
                                alert('danger');
                            }
                        });

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
