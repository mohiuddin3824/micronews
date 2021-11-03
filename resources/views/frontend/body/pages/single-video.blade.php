@php
     $seos = DB::table('s_e_o_s')->first();
 @endphp
    @section('opengp')
       <title>{{$video->video_title}}</title>
        <meta property="og:title" content="{{$video->video_title}}" />

        <meta property="og:image" content="{{asset($video->video_thumbnail)}}" />

        <meta property="og:url" content="{{URL::current();}}" />

        <meta property="fb:app_id" content="288946465996468" />
        <meta property="og:type" content="article" />
        <meta property="og:site_name" content="{{$seos->meta_author}}" />

    @endsection

@extends('frontend.frontend-master')

@section('content')

@php
    $single_page_sidebar_one = App\Models\Advert::where('ad_name', 'Single Page Sidebar One')->first();
    $single_page_sidebar_two = App\Models\Advert::where('ad_name', 'Single Page Sidebar two')->first();
    $single_page_middle_ad = App\Models\Advert::where('ad_name', 'Single Page Middle')->first();
    $single_page_before_footer_ad = App\Models\Advert::where('ad_name', 'Single Page Before Footer')->first();
@endphp

    <section class="single_page_top mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="single_title mb-lg-5 pt-lg-5">
                        <h2>{{ $video->video_title }} </h2>
                    </div>
                    <div class="reporter_details d-flex mt-5 pt-lg-5">
                        <div class="reporter_img">
                            <a href="{{url('user/'.$video->user->id.'/'.$video->user->name)}}">
                                <img src="{{asset($video->user->profile_photo)}}" alt="{{$video->user->name}}">
                            </a>
                        </div>
                        <div class="reporter_name ps-4 pt-3">
                            @if($video->repoter_name != NULL)
                                <a href="{{url('user/'.$video->user->id.'/'.$video->repoter_name)}}">{{$video->repoter_name}}</a>
                            @else    
                                <a href="{{url('user/'.$video->user->id.'/'.$video->user->name)}}">{{$video->user->name}}</a>
                            @endif
                            <div class="single_news_components d-flex mt-3">
                                <p><span><i class="fas fa-user-clock"></i></span> {{$video->created_at->format('jS M Y')}}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="single_post_image">
                        <div class="card">
                            <div class="card-body">
                                <iframe width="610" height="330" src="https://www.youtube.com/embed/{{$video->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="single_news_details mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="single_page_selected">
                        <div class="card">
                            <div class="card-header">
                                <h2><span><i class="fas fa-video"></i></span> {{__('সর্বশেষ প্রকাশিত')}} </h2>
                            </div>
                            <div class="card-body">
                                @if ($latestPost->count() > 0)
                                    @foreach ($latestPost->slice(0, 5) as $post) 
                                        <div class="selected_news">
                                            <div class="news_img">
                                                <a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}">
                                                    @if ($post->post_thumbnail)
                                                    <img src="{{ asset($post->post_thumbnail) }}" alt="{{$post->thumbnail_alt !== NULL ? $post->thumbnail_alt : str_replace(" ","-",$post->post_title)}}">
                                                @else    
                                                    <img src="{{ asset('frontend/assets/images/post/default-post.png') }}" alt="{{str_replace(" ","-",$post->post_title)}}">
                                                @endif
                                                </a>
                                            </div>
                                            <div class="news_headline">
                                                <a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}">
                                                    <h2>{{$post->post_title}}</h2>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif        
                                
                            </div>
                            <div class="card-footer our_bangladesh text-center">
                                <h2><span class="pe-3"><i class="fab fa-accusoft"></i></span><a href="">{{__('আরো পড়ুন')}}</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="single_page_ad1 mt-3 mb-3">
                        @if ($single_page_sidebar_two->status == 1)
                        <div class="card">
                            <div class="card-body">
                                <a href="{{$single_page_sidebar_two->ad_link}}" target="__blank">
                                    {!! $single_page_sidebar_two->ad_code !!}
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="single_content mb-5">
                        <div class="card">
                            <div class="card-body">
                                {!! $video->video_desc !!}
                            </div>
                        </div>
                        <div class="comments mt-5 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3><span><i class="far fa-comments"></i></span> {{__('ভিডিওর বিষয় সম্পর্কে মন্তব্য করুন')}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="fb-comments" data-href="https://www.facebook.com/theholymedia" data-width="100%" data-numposts="7"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    @if ($single_page_middle_ad->status == 1)
    <section class="sec_bg middle_section_ad mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="home_sidebar_ad_one">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{$single_page_middle_ad->ad_link}}" target="__blank">
                                    {!! $single_page_middle_ad->ad_code !!}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="sec_bg holy_library pt-5 pb-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <div class="section_title">
                        <h2 class="text-dark"><i class="fas fa-folder-open"></i> <span class="ps-2">{{__('আরো ভিডিও দেখুন')}}</span> </h2>
                        <span class="title_border"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                
                @if ($videos->count() > 0)
                        @foreach ($videos->slice(0, 8) as $post) 
                            <div class="col-md-3 mb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{url('video/'.$post->id)}}">
                                            <div class="video_content">
                                                <div class="video_source">
                                                    @if ($post->video_thumbnail)
                                                        <img class="img-fluid" src="{{ asset($post->video_thumbnail) }}" alt="{{$post->thumbnail_alt !== NULL ? $post->thumbnail_alt : str_replace(" ","-",$post->post_title)}}">
                                                    @else    
                                                        <img class="img-fluid" src="{{ asset('frontend/assets/images/videos/thumbnail-1.png') }}" alt="{{str_replace(" ","-",$post->post_title)}}">
                                                    @endif
                                                    <div class="video_icon">
                                                        <i class="fas fa-play-circle"></i>
                                                    </div>
                                                </div>
                                                
                                                <div class="video_title">
                                                    <h2 class="text-dark">{{$post->video_title}}</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif  
                
            </div>
        </div>
    </section>
    @if ($single_page_before_footer_ad->status == 1)
    <section class="sec_bg middle_section_ad mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="home_sidebar_ad_one">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{$single_page_before_footer_ad->ad_link}}" target="__blank">
                                    {!! $single_page_before_footer_ad->ad_code !!}
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