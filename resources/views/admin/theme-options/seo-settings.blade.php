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
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Search Engine Optimization') }}</li>
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
                                <h2>{{ __('SEO Settings will increase traffic for your site!') }}</h2>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <form class="forms-sample" action="{{ route('seo.update', $seos->id) }}" method="POST">
                            @csrf
                            <div class="box">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="meta_author">{{ __('Meta Author / Site Name') }}</label>
                                        <input type="text" class="form-control" name="meta_author"
                                            value="{{ $seos->meta_author }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">{{ __('Meta Title') }}</label>
                                        <input type="text" class="form-control" name="meta_title"
                                            value="{{ $seos->meta_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">{{ __('Meta Description') }}</label>
                                        <textarea name="meta_description" id="some-textarea"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $seos->meta_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">{{ __('Meta Keywords') }}</label>
                                        <textarea name="meta_keywords" rows="5" cols="5"
                                            class="form-control">{{ $seos->meta_keywords }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">{{ __('Paste Google Analytics Code here') }}</h4>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="form-group">
                                        <textarea name="google_analytics" rows="5" cols="5"
                                            class="form-control">{{ $seos->google_analytics }}</textarea>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                            <div class="box">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="baidu_verification">{{ __('Baidu Verification') }}</label>
                                        <input type="text" class="form-control" name="baidu_verification"
                                            value="{{ $seos->baidu_verification }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="yandex_verification">{{ __('Yandex Verification') }}</label>
                                        <input type="text" class="form-control" name="yandex_verification"
                                            value="{{ $seos->yandex_verification }}">
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

@endsection
