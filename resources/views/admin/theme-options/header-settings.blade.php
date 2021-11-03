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
                                     <li class="breadcrumb-item" aria-current="page">{{ __('Header Settings') }}</li>
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
                             <div class="box-header">
                                 <h2>{{ __('Header Settings will increase traffic for your site!') }}</h2>
                             </div>
                         </div>
                         <!-- /.box-header -->
                         <form class="forms-sample" action="{{ route('header.update', $headers->id) }}" method="POST"
                             enctype="multipart/form-data">
                             @csrf
                             <input type="hidden" name="id" value="{{ $headers->id }}">
                             <div class="box">
                                 <div class="box-body">
                                     <div class="form-group">
                                         <label for="meta_author">{{ __('Header logo') }}</label>
                                         <input type="file" class="form-control" id="mainLogo" name="header_logo">
                                         <input type="hidden" name="old_main_logo" value="{{ $headers->header_logo }}">
                                     </div>
                                     <div class="form-group" style="width:200px; height:200px;">
                                         <img src="{{ asset($headers->header_logo) }}" class="img-thumbnail"
                                             id="headerLogo" alt="site logo">
                                     </div>
                                     <div class="form-group">
                                         <label for="meta_author">{{ __('Mobile logo') }}</label>
                                         <input type="file" class="form-control" id="mobileLogo" name="mobile_logo">
                                         <input type="hidden" name="old_mobile_logo" value="{{ $headers->mobile_logo }}">
                                     </div>
                                     <div class="form-group" style="width:200px; height:200px;">
                                         <img src="{{ asset($headers->mobile_logo) }}" class="img-thumbnail" id="mLogo"
                                             alt="site logo">
                                     </div>
                                     <div class="form-group">
                                         <label for="meta_author">{{ __('Favicon') }}</label>
                                         <input type="file" class="form-control" id="siteFav" name="favicon">
                                         <input type="hidden" name="old_fav" value="{{ $headers->old_fav }}">
                                     </div>

                                     <div class="form-group" style="width:100px; height:100px;">
                                         <img src="{{ asset($headers->favicon) }}" class="img-thumbnail" id="favIcon"
                                             alt="site logo">
                                     </div>
                                 </div>
                             </div>


                             <button type="submit" class="btn btn-primary mr-2">{{ __('Save Changes') }}</button>
                         </form>
                     </div>
                 </div>
             </section>
         </div>
     </div>

     <script type="text/javascript">
         $(document).ready(function() {



             $('#mainLogo').change(function() {

                 let reader = new FileReader();

                 reader.onload = (e) => {

                     $('#headerLogo').attr('src', e.target.result);
                 }

                 reader.readAsDataURL(this.files[0]);

             });

             $('#mobileLogo').change(function() {

                 let reader = new FileReader();

                 reader.onload = (e) => {

                     $('#mLogo').attr('src', e.target.result);
                 }

                 reader.readAsDataURL(this.files[0]);

             });

             $('#siteFav').change(function() {

                 let reader = new FileReader();

                 reader.onload = (e) => {

                     $('#favIcon').attr('src', e.target.result);
                 }

                 reader.readAsDataURL(this.files[0]);

             });

         });
     </script>

 @endsection
