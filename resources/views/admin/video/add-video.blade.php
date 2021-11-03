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
                         <h3 class="page-title">{{ $seos->meta_author }}</h3>
                         <div class="d-inline-block align-items-center">
                             <nav>
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                 class="mdi mdi-home-outline"></i></a></li>
                                     <li class="breadcrumb-item" aria-current="page">{{ __('Add New Video') }}</li>
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
                                         <h2 class="">{{ __('Add New Video') }}</h2>
                                    </div>
                                    <div class="
                                             col-4 text-right">
                                             <a href="{{ route('all.videos') }}"
                                                 class="btn btn-success">{{ __('Video list') }}</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- /.box-header -->


                         <form action="{{ route('store.video') }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="row">
                                 <div class="col-md-9">

                                     <div class="box bl-3 border-primary">
                                         <div class="box-body">
                                             <div class="form-group">
                                                 <label for="video_title">{{ __('Video Title') }}</label>
                                                 <input type="text" class="form-control" name="video_title"
                                                     placeholder="Post Title">
                                                 @error('video_title')
                                                     <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                             </div>

                                             <div class="form-group">
                                                 <label for="video_desc">{{ __('Video Description') }}</label>
                                                 <textarea id="video_desc" name="video_desc" class="form-control"
                                                     cols="30" rows="10"></textarea>

                                             </div>

                                             <div class="form-group">
                                                 <label for="video_link">{{ __('Video ') }}</label>
                                                 <input type="text" class="form-control" name="video_link"
                                                     placeholder="Video Link">
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="box bl-3 border-primary">
                                        <div class="box-body">


                                            <div class="form-group">
                                                <label>{{ __('Select Category') }}</label>
                                                <select class="js-example-basic-single" name="video_cat_id"
                                                    style="width:100%; padding: 8px 2px; background:#2a3038; color:#fff">
                                                    <option disabled selected>{{ __('Select Category') }}</option>
                                                    @foreach ($allCats as $cat)

                                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}
                                                        </option>

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
                                            <h4>{{ __('Video Thumbnail') }}</h4>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input type="file" name="video_thumbnail" id="image">

                                            </div>

                                            <div class="form-group">
                                                <img src="" class="img-thumbnail" id="mainThmb" alt="add video thumbnail">
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
