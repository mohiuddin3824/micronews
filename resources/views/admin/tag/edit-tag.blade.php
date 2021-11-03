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
                        
                        <form class="forms-sample" action="{{route('update.tag')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tag_id" value="{{$tag->id}}">
                            <div class="form-group">
                                <label for="name">{{ __('Tag Name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{$tag->name}}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">{{ __('Slug') }}</label>
                                <input type="text" class="form-control" name="slug" value="{{$tag->slug}}">
                                
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Tag Description') }}</label>
                                <textarea name="description" class="form-control" cols="30" rows="10">{{$tag->description}}</textarea>
                            </div>

                            <div class="box bl-3 border-primary">
                                <div class="box-header">
                                    <h4>{{ __('Add Tag Image') }}</h4>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="file" name="tag_thumb" id="tagimg">

                                    </div>

                                    <div class="form-group">
                                        <img src="{{ asset($tag->tag_thumb) }}" class="img-thumbnail" id="tagThmb" alt="Tag Thumbnail">
                                        <input type="hidden" name="oldimage" value="{{ $tag->tag_thumb }}">
                                    </div>
                                    <div class="form-group">
                                        <h4>{{ __('Image Caption') }}</h4>
                                        <span class="badge badge-info">{{ __('Optional') }}</span>
                                        <textarea name="thumb_caption"
                                            class="form-control">{{$tag->thumb_caption}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <h4>{{ __('Image Alter Text') }}</h4>
                                        <span class="badge badge-primary">{{ __('Recommended for SEO') }}</span>
                                        <br>
                                        <input type="text" name="thumb_alt" value="{{$tag->thumb_alt}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Update Tag') }}</button>
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

    $('#tagimg').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#tagThmb').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

});
</script>
@endsection