@extends('frontend.frontend-master')

@section('content')

@php
     $seos = DB::table('s_e_o_s')->first();
     $category_page_before_footer_ad = App\Models\Advert::where('ad_name', 'Category Before Footer')->first();
 @endphp


<section class="sec_bg video_category_section pb-5">
    <div class="container">
        @if ($catWiseVideos->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h2><i class="fab fa-accusoft"></i> {{$videocat->category_name}}</h2>
                </div>
                <div class="card-body">
                    <div class="row">

                        @foreach ($catWiseVideos->slice(0,12) as $post)
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ url('video/' . $post->id) }}">
                                        <div class="video_content">
                                            <div class="video_source">
                                                @if ($post->video_thumbnail)
                                                    <img class="img-fluid"
                                                        src="{{ asset($post->video_thumbnail) }}"
                                                        alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                                @else
                                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/videos/thumbnail-1.png') }}"
                                                        alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                                @endif
                                                <div class="video_icon">
                                                    <i class="fas fa-play-circle"></i>
                                                </div>
                                            </div>

                                            <div class="video_title">
                                                <h2 class="text-dark">{{ $post->video_title }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="card-footer">
                    {{ $catWiseVideos->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body text-center">
                    <h2>{{__('No video found on this category!')}}</h2>
                    <a href="{{url('/')}}" class="btn btn-success">{{__('Visit Home Page')}}</a>
                </div>
            </div>
        @endif
    </div>
</section>
@if ($category_page_before_footer_ad->status == 1)
<section class="sec_bg middle_section_ad mt-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="home_sidebar_ad_one">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{$category_page_before_footer_ad->ad_link}}" target="__blank">
                                {!! $category_page_before_footer_ad->ad_code !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@endsection
