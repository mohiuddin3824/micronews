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
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Add New Page') }}</li>
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
                                        <h2>{{ __('Add New Page') }}</h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{route('all.pages')}}" class="btn btn-success">{{ __('Page list') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->


                        <form action="{{route('update.page')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$editPage->id}}">
                        <div class="row">
                                <div class="col-md-9">
                                    
                                    <div class="box bl-3 border-primary">
                                        <div class="box-body"> 
                                                              
                                            <div class="form-group">
                                                <label for="title">{{ __('Page Title') }}</label>
                                                <input type="text" class="form-control" name="title" value="{{$editPage->title}}">
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">{{ __('Page Slug') }}</label>
                                                <input type="text" class="form-control" name="slug" value="{{$editPage->title}}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <textarea id="editor1" name="description" rows="20" cols="80">
                                                    {{$editPage->description}}
                                                </textarea>
                                                
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                    
                                    <div class="box bl-3 border-primary">
                                        <div class="box-header">
                                            <h4>{{ __('Add Page Image') }}</h4>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input type="file" name="image" id="pageimage">

                                            </div>

                                            <div class="form-group">
                                                <img src="{{asset($editPage->image)}}" class="img-thumbnail" id="pageThmb" alt="add post thumbnail">
                                                <input type="hidden" name="oldimage" value="{{ $editPage->image }}">
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <button class="btn btn-lg btn-success" style="font-size: 20px">{{__('Update')}}</button>
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

            $('#pageimage').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#pageThmb').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>

@endsection
