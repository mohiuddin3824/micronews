@php
     $seos = DB::table('s_e_o_s')->first();
 @endphp
    @section('opengp')
       <title>{{$post->post_title}}</title>
        <meta property="og:title" content="{{$post->post_title}}" />

        <meta property="og:image" content="{{asset($post->post_thumbnail)}}" />

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

    <section class="single_news_details mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="single_content mb-5">
                        <div class="card">
                            <div class="card-header">
                                <span><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></span> / 
                                <a href="{{url('category',$post->category->category_slug)}}"><span
                                class="category_header_text">{{ $post->category->category_name }}</span></a>
                            </div>
                            <div class="card-body">
                                <div class="single_title">
                                    <h2 class="uper_title">{{ $post->post_uper_title }} </h2>
                                    <h2 class="news_headline mt-1">{{ $post->post_title }} </h2>
                                    <h3 class="sub_title mt-1">{{ $post->post_sub_title }} </h3>
                                </div>
                                <hr>
                                <div class="reporter_details d-flex mb-2 d-block">
                                    <div class="reporter_img me-2">
                                        <a href="{{url('user/'.$post->user->id.'/'.$post->user->name)}}">
                                            <img src="{{asset($post->user->profile_photo)}}" alt="{{$post->user->name}}">
                                        </a>
                                    </div>
                                    <div class="reporter_name mt-3">
                                        @if($post->repoter_name != NULL)
                                            <a href="{{url('user/'.$post->user->id.'/'.$post->repoter_name)}}">{{$post->repoter_name}}</a>
                                        @else
                                            <a href="{{url('user/'.$post->user->id.'/'.$post->user->name)}}">{{$post->user->name}}</a>
                                        @endif
                                        <div class="single_news_components d-flex">
                                            <p><span><i class="fas fa-user-clock"></i></span> {{$post->created_at->format('jS M Y')}}</p>
                                            <p class="ps-2"><span><i class="fas fa-book-medical"></i></span> {{$post->view_count}} বার পড়া হয়েছে</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post_thumbnail mb-2">
                                    @if ($post->post_thumbnail)
                                        <img class="img-fluid" src="{{ asset($post->post_thumbnail) }}" alt="{{$post->thumbnail_alt !== NULL ? $post->thumbnail_alt : str_replace(" ","-",$post->post_title)}}">
                                    @else
                                        <img class="img-fluid" src="{{ asset('frontend/assets/images/post/default-post.png') }}" alt="{{str_replace(" ","-",$post->post_title)}}">
                                    @endif
                                </div>
                                <div class="post_details">
                                    {!! $post->post_details !!}
                                </div>
                            </div>
                            <div class="card-footer post_tags">
                                
                                    <span class="pe-2"><i class="fas fa-tags"></i></span> 
                                    @foreach ($post->tags as $tag)
                                        <a href="{{url('tag/'.$tag->slug)}}"><span>{{$tag->name}}</span></a>
                                    @endforeach
                                
                            </div>
                        </div>
                        <div class="comments mt-5 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3><span><i class="far fa-comments"></i></span> {{__('আপনার পঠিত আর্টিক্যাল সম্পর্কে মন্তব্য করুন')}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="fb-comments" data-href="https://www.facebook.com/theholymedia" data-width="100%" data-numposts="7"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single_page_selected">
                        <div class="card">
                            <div class="card-header">
                                <h2><span><i class="fas fa-video"></i></span> {{__('সর্বশেষ প্রকাশিত')}} </h2>
                            </div>
                            <div class="card-body">
                                @if ($latest->count() > 0)
                                    @foreach ($latest->slice(0, 5) as $post)
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
                                <h2><span class="pe-3"><i class="fab fa-accusoft"></i></span><a href="">আরো পড়ুন</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="single_page_ad1 mt-3 mb-3">
                        @if ($single_page_sidebar_one->status == 1)
                        <div class="card">
                            <div class="card-body">
                                <a href="{{$single_page_sidebar_one->ad_link}}" target="__blank">
                                    {!! $single_page_sidebar_one->ad_code !!}
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="card">
                        <div class="card-header">
                                <h2><span class="pe-1"><i class="fab fa-accusoft"></i></span> {{__('পাঠকপ্রিয়')}}</h2>

                        </div>
                        <div class="card-body">
                            @if ($mstview->count() > 0)
                                @foreach ($mstview as $post)
                                    <div class="selected_news">
                                        <div class="news_img">
                                            <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                                @if ($post->post_thumbnail)
                                                    <img src="{{ asset($post->post_thumbnail) }}"
                                                        alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                                @else
                                                    <img src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                                        alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="news_headline">
                                            <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                                <h2>{{ $post->post_title }}</h2>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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
                        <h2 class="text-primary"><i class="fas fa-folder-open"></i> <span class="ps-2">{{__('এই ক্যাটাগরির আরো নিউজ পড়ুন')}}</span> </h2>
                        <span class="title_border"></span>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($relatedNews->slice(0,8) as $post)
                    <div class="col-md-3">
                        <div class="card mb-4">
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
                                    <div class="feature_news_components d-flex">
                                        <p><span class="pe-0"><i class="fas fa-user-clock"></i></span> {{$post->created_at->format('jS M Y')}}</p>
                                        <p class="ps-1"><span><i class="fas fa-book-medical"></i></span> {{$post->view_count}} {{__('বার পড়া হয়েছে')}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach

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
