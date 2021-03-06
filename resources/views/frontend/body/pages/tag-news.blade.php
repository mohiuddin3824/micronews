@extends('frontend.frontend-master')

@section('content')

@php
     $seos = DB::table('s_e_o_s')->first();
 @endphp

<section class="sec_bg tag_section pb-5">
    <div class="container">
        @if ($tagWiseNews->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h2><i class="fab fa-accusoft"></i> {{$tag->name}}</h2>
                </div>
                <div class="card-body">
                    <div class="row">

                        @foreach ($tagWiseNews->slice(0,12) as $post)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}" class="text-dark">
                                        <div class="feature_news_img">
                                            @if ($post->post_thumbnail)
                                                <img class="img-fluid" src="{{ asset($post->post_thumbnail) }}" alt="{{$post->thumbnail_alt !== NULL ? $post->thumbnail_alt : str_replace(" ","-",$post->post_title)}}">
                                            @else
                                                <img class="img-fluid" src="{{ asset('frontend/assets/images/post/default-post.png') }}" alt="{{str_replace(" ","-",$post->post_title)}}">
                                            @endif
                                        </div>
                                        <div class="feature_news_title mt-1">
                                            <h2>{{$post->post_title}}</h2>
                                        </div>
                                        <div class="card-footer feature_news_components d-flex">
                                            <p><span class="pe-1"><i class="fas fa-user-clock"></i></span> {{$post->created_at->format('jS M Y')}}</p>
                                            <p class="ps-2"><span><i class="fas fa-book-medical"></i></span> {{$post->view_count}} {{__('????????? ????????? ???????????????')}}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="card-footer">
                    {{ $tagWiseNews->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body text-center">
                    <h2>{{__('No post found on this category!')}}</h2>
                    <a href="{{url('/')}}" class="btn btn-success">{{__('Visit Home Page')}}</a>
                </div>
            </div>
        @endif
    </div>
</section>
<section class="sec_bg middle_section_ad mb-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="images/ads/ad1.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>


@endsection
