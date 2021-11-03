<!DOCTYPE html>
<html lang="en">
  <head>
  @php
      $seos = DB::table('s_e_o_s')->first();
       $headers = App\Models\Header::first();
  @endphp
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$seos->meta_description}}">
    <meta name="author" content="{{$seos->meta_author}}">
    
	@if ($headers->favicon)
		<link rel="shortcut icon" href="{{asset($headers->favicon)}}" type="image/x-icon">	
	@else
		<link rel="shortcut icon" href="{{asset('backend/images/logo/logo-3.jpg')}}" type="image/x-icon">				
	@endif
    <title>{{$seos->meta_author}}</title>
    <meta name="csrf-token" content=" {{ csrf_token() }} ">
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">


  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css"/>

     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

@include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->
@include('admin.body.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('admin.body.footer')
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
  <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	
  <script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>	
  <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="{{asset('../assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
  <script src="https://cdn.tiny.cloud/1/r24p9oqicwy6ccj2ntw3q6u2jal1ex8hzk0fpu8qj7ys77ob/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{asset('backend/js/pages/editor.js')}}"></script>

  
  <script src="{{asset('backend/js/summernote-bs4.min.js')}}"></script>
  <!-- Sunny Admin App -->
  <script src="{{asset('backend/js/pages/data-table.js')}}"></script>
  
  <script src="{{asset('backend/js/template.js')}}"></script>
  <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>

  <script>
    $(document).ready(function(){
         @if(Session::has('message'))
             var type ="{{Session::get('alert-type','info')}}"
             switch(type){
                 case 'info':
                     toastr.info(" {{Session::get('message')}} ");
                     break;
                 case 'success':
                     toastr.success(" {{Session::get('message')}} ");
                     break;
                 case 'warning':
                     toastr.warning(" {{Session::get('message')}} ");
                     break;
                 case 'error':
                     toastr.error(" {{Session::get('message')}} ");
                     break;
             }
         @endif
         
         
         $('#ad_content').summernote({
          height: 300,
          tooltip: false
        });
        
         $('#footer_info').summernote({
          height: 200,
          tooltip: false
        });
        
        
        tinymce.init({
            selector: 'textarea#posteditor',
            height: 400,
            menubar: true,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	        "searchreplace wordcount visualblocks visualchars code fullscreen",
	        "insertdatetime media nonbreaking save table contextmenu directionality",
	        "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            
            
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons | print preview media | code fullscreen",
	    
	    a11y_advanced_options: true,
	     image_title: true,
		  /* enable automatic uploads of images represented by blob or data URIs*/
		  automatic_uploads: true,
		  /*
		    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
		    images_upload_url: 'postAcceptor.php',
		    here we add custom filepicker only to Image dialog
		  */
		  file_picker_types: 'file image media',
		  image_uploadtab: true,
		  image_advtab: true,
		  image_caption: true,
		  images_upload_credentials: true,
		  /* and here's our custom image picker*/
		  file_picker_callback: function (cb, value, meta) {
		    var input = document.createElement('input');
		    input.setAttribute('type', 'file');
		    input.setAttribute('accept', 'image/*');
		
		    /*
		      Note: In modern browsers input[type="file"] is functional without
		      even adding it to the DOM, but that might not be the case in some older
		      or quirky browsers like IE, so you might want to add it to the DOM
		      just in case, and visually hide it. And do not forget do remove it
		      once you do not need it anymore.
		    */
		
		    input.onchange = function () {
		      var file = this.files[0];
		
		      var reader = new FileReader();
		      reader.onload = function () {
		        /*
		          Note: Now we need to register the blob in TinyMCEs image blob
		          registry. In the next release this part hopefully won't be
		          necessary, as we are looking to handle it internally.
		        */
		        var id = 'blobid' + (new Date()).getTime();
		        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
		        var base64 = reader.result.split(',')[1];
		        var blobInfo = blobCache.create(id, file, base64);
		        blobCache.add(blobInfo);
		
		        /* call the callback and populate the Title field with the file name */
		        cb(blobInfo.blobUri(), { title: file.name });
		      };
		      reader.readAsDataURL(file);
		    };
		
		    input.click();
		  },
	    content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
         
         
     
     
     tinymce.init({
            selector: 'textarea#editpost_content',
            height: 400,
            menubar: true,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	        "searchreplace wordcount visualblocks visualchars code fullscreen",
	        "insertdatetime media nonbreaking save table contextmenu directionality",
	        "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            
            
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons | print preview media | code",
	    
	    
	    a11y_advanced_options: true,
	     image_title: true,
		  /* enable automatic uploads of images represented by blob or data URIs*/
		  automatic_uploads: true,
		  /*
		    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
		    images_upload_url: 'postAcceptor.php',
		    here we add custom filepicker only to Image dialog
		  */
		  file_picker_types: 'file image media',
		  image_uploadtab: true,
		  image_advtab: true,
		  image_caption: true,
		  images_upload_credentials: true,
		  /* and here's our custom image picker*/
		  file_picker_callback: function (cb, value, meta) {
		    var input = document.createElement('input');
		    input.setAttribute('type', 'file');
		    input.setAttribute('accept', 'image/*');
		
		    /*
		      Note: In modern browsers input[type="file"] is functional without
		      even adding it to the DOM, but that might not be the case in some older
		      or quirky browsers like IE, so you might want to add it to the DOM
		      just in case, and visually hide it. And do not forget do remove it
		      once you do not need it anymore.
		    */
		
		    input.onchange = function () {
		      var file = this.files[0];
		
		      var reader = new FileReader();
		      reader.onload = function () {
		        /*
		          Note: Now we need to register the blob in TinyMCEs image blob
		          registry. In the next release this part hopefully won't be
		          necessary, as we are looking to handle it internally.
		        */
		        var id = 'blobid' + (new Date()).getTime();
		        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
		        var base64 = reader.result.split(',')[1];
		        var blobInfo = blobCache.create(id, file, base64);
		        blobCache.add(blobInfo);
		
		        /* call the callback and populate the Title field with the file name */
		        cb(blobInfo.blobUri(), { title: file.name });
		      };
		      reader.readAsDataURL(file);
		    };
		
		    input.click();
		  },
	    content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
     
         
     });
 </script>


</body>
</html>
