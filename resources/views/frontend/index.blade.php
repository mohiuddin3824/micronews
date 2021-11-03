@extends('frontend.frontend-master')

@section('content')
@php
    $home_sidebar_one = App\Models\Advert::where('ad_name', 'Home Sidebar One')->first();
    $home_sidebar_two = App\Models\Advert::where('ad_name', 'Home Sidebar Two')->first();
    $home_sidebar_three = App\Models\Advert::where('ad_name', 'Home Sidebar Three')->first();
    $home_section_middle_one = App\Models\Advert::where('ad_name', 'Home Section Middle One')->first();
    $home_section_middle_two = App\Models\Advert::where('ad_name', 'Home Section Middle Two')->first();
    $home_section_before_footer = App\Models\Advert::where('ad_name', 'Home Before Footer')->first();

    $single_page_sidebar_one = App\Models\Advert::where('ad_name', 'Single Page Sidebar One')->first();

@endphp
    <section class="lead_section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @if ($leadNews->count() > 0)
                                @foreach ($leadNews->slice(0, 1) as $post)
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                        <div class="lead_post" style="background-image: url('{{ asset($post->post_thumbnail) }}');">
                                            
                                            <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                                <h2>{{ $post->post_title }}</h2>
                                            </a>
                                        </div>
                                    </a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="heading_icon">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="colum_headline">
                                    <h2 class="pt-1 ps-1">{{ __('সর্বশেষ প্রকাশিত') }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($latest->count() > 0)
                                @foreach ($latest->slice(0, 5) as $post)
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
                </div>
            </div>
        </div>
    </section>

    <section class="sec_bg feature_section pt-5 pb-5">
        <div class="container">
            <div class="row">

                <div class="col-sm-8">
                    <div class="row">
                        @if ($featuredNews->count() > 0)
                            @foreach ($featuredNews->slice(0, 6) as $post)
                                <div class="col-sm-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}"
                                                class="text-dark">
                                                <div class="feature_news_img">
                                                    <img class="img-fluid" src="{{ asset($post->post_thumbnail) }}"
                                                        alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                                </div>
                                                <div class="feature_news_title mt-1">
                                                    <h2>{{ $post->post_title }} </h2>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-footer">
                                            <div class="feature_news_components d-flex">
                                                <a href="{{ url('category/' . $post->category->category_slug) }}"><span
                                                        class="pe-1"><i
                                                            class="fas fa-tags"></i></span>{{ $post->category->category_name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>

                <div class="col-sm-4">
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
                </div>
            </div>
        </div>
    </section>
    @if ($home_section_middle_one->status == 1)
    <section class="text-center middle_section_ad mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{$home_section_middle_one->ad_link}}" target="__blank">
                        {!! $home_section_middle_one->ad_code !!}
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="sec_bg national_sec pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="section_title">
                        <h2> {{ $national->category_name }} </h2>
                        <span class="title_border"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="section_read_more">
                        <a href="{{ url('category/' . $national->category_slug) }}">{{ __('আরো পড়ুন') }} <span><i
                                    class="fas fa-book-reader"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($national->posts->count() > 0)
                    @foreach ($national->posts->slice(0, 8) as $post)
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}" class="text-dark">
                                        <div class="feature_news_img">
                                            @if ($post->post_thumbnail)
                                                <img class="img-fluid" src="{{ asset($post->post_thumbnail) }}"
                                                    alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                            @else
                                                <img class="img-fluid"
                                                    src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                                    alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                            @endif
                                        </div>
                                        <div class="feature_news_title mt-1">
                                            <h2>{{ $post->post_title }} </h2>
                                        </div>
                                        <div class="feature_news_components d-flex">
                                            <p><span class="pe-1"><i class="fas fa-user-clock"></i></span>
                                                {{ $post->created_at->format('jS M Y') }}</p>
                                            <p class="ps-2"><span><i class="fas fa-book-medical"></i></span>
                                                {{ $post->view_count }} {{ __('বার পড়া হয়েছে') }}</p>
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

    <section class="international_sec pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="section_title">
                                <h2> <span class="pe-1"><i class="fas fa-globe-americas"></i></span> <a href="{{ url('category/' . $international->category_slug) }}">{{ $international->category_name }}</a> </h2>
                                <span class="title_border"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="section_read_more">
                                <a href="{{ url('category/' . $international->category_slug) }}">{{ __('আরো পড়ুন') }} <span><i
                                            class="fas fa-book-reader"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            @foreach ($international->posts->slice(0, 1) as $post)
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}">
                                            <img class="img-fluid" src="{{ asset($post->post_thumbnail) }}" alt="{{$post->thumbnail_alt !== NULL ? $post->thumbnail_alt : str_replace(" ","-",$post->post_title)}}">
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <h2><a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}">{{$post->post_title}}</a></h2>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-5 mt-1">
                            <div class="card">
                                <div class="card-body">
                                @foreach ($international->posts->slice(1, 4) as $post)
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="home_sidebar_ad_one">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{$home_sidebar_one->ad_link}}" target="__blank">
                                    {!! $home_sidebar_one->ad_code !!}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="politics_economics pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2><span class="pe-2"><i class="fab fa-artstation"></i></span><a href="{{ url('category/' . $politics->category_slug) }}">{{$politics->category_name}}</a></h2>
                        </div>
                        <div class="card-body">
                            @foreach ($politics->posts->slice(0, 1) as $post)
                            <div class="news_with_img">
                                <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                    @if ($post->post_thumbnail)
                                        <img class="img-thumbnail" src="{{ asset($post->post_thumbnail) }}"
                                            alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                    @else
                                        <img class="img-thumbnail" src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                            alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                    @endif
                                </a>
                                <div class="news_title">
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>

                                </div>
                                <hr>
                            </div>
                            @endforeach

                            <div class="news_only_title">

                                <ul>
                                    @foreach ($politics->posts->slice(1, 4) as $post)
                                    <li>
                                        <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <h2>
                                <span class="pe-2"><i class="fab fa-artstation"></i></span><a href="{{ url('category/' . $politics->category_slug) }}">{{__('আরো পড়ুন')}}</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2><span class="pe-2"><i class="fas fa-cogs"></i></span><a href="{{ url('category/' . $economics->category_slug) }}">{{$economics->category_name}}</a></h2>
                        </div>
                        <div class="card-body">
                            @foreach ($economics->posts->slice(0, 1) as $post)
                            <div class="news_with_img">
                                <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                    @if ($post->post_thumbnail)
                                        <img class="img-thumbnail" src="{{ asset($post->post_thumbnail) }}"
                                            alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                    @else
                                        <img class="img-thumbnail" src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                            alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                    @endif
                                </a>
                                <div class="news_title">
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>
                                </div>
                                <hr>
                            </div>
                            @endforeach

                            <div class="news_only_title">
                                <ul>
                                    @foreach ($economics->posts->slice(1, 4) as $post)
                                    <li>
                                        <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <h2>
                                <span class="pe-2"><i class="fas fa-cogs"></i></span> <a href="{{ url('category/' . $economics->category_slug) }}">{{__('আরো পড়ুন')}}</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2><span class="pe-2"><i class="fas fa-balance-scale"></i></span><a href="{{ url('category/' . $law_justice->category_slug) }}">{{$law_justice->category_name}}</a></h2>
                        </div>
                        <div class="card-body">
                            @foreach ($law_justice->posts->slice(0, 1) as $post)
                            <div class="news_with_img">
                                <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                    @if ($post->post_thumbnail)
                                        <img class="img-thumbnail" src="{{ asset($post->post_thumbnail) }}"
                                            alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                    @else
                                        <img class="img-thumbnail" src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                            alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                    @endif
                                </a>
                                <div class="news_title">
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>

                                </div>
                                <hr>
                            </div>
                            @endforeach

                            <div class="news_only_title">

                                <ul>
                                    @foreach ($law_justice->posts->slice(1, 4) as $post)
                                    <li>
                                        <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <h2>
                                <span class="pe-2"><i class="fas fa-balance-scale"></i></span><a href="{{ url('category/' . $law_justice->category_slug) }}">{{__('আরো পড়ুন')}}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($home_section_middle_one->status == 1)
    <section class="sec_bg middle_section_ad mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="home_sidebar_ad_one">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{$home_section_middle_two->ad_link}}" target="__blank">
                                    {!! $home_section_middle_two->ad_code !!}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if ($health->posts->count() > 0)
    <section class="sec_bg health_section pt-5 pb-5 mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="section_title">
                        <h2 class="text-dark"> {{ $health->category_name }} </h2>
                        <span class="title_border"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="section_read_more">
                        <a class="text-primary" href="{{ url('category/' . $health->category_slug) }}"
                            class="text-dark">{{ __('আরো পড়ুন') }} <span><i class="fas fa-book-reader"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="row">


                    @foreach ($health->posts->slice(0, 8) as $post)
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}" class="text-dark">
                                        <div class="feature_news_img">
                                            @if ($post->post_thumbnail)
                                                <img class="img-fluid" src="{{ asset($post->post_thumbnail) }}"
                                                    alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                            @else
                                                <img class="img-fluid"
                                                    src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                                    alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                            @endif
                                        </div>
                                        <div class="feature_news_title mt-1">
                                            <h2>{{ $post->post_title }} </h2>
                                        </div>
                                        <div class="feature_news_components d-flex">
                                            <p><span class="pe-1"><i class="fas fa-user-clock"></i></span>
                                                {{ $post->created_at->format('jS M Y') }}</p>
                                            <p class="ps-2"><span><i class="fas fa-book-medical"></i></span>
                                                {{ $post->view_count }} {{ __('বার পড়া হয়েছে') }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach



            </div>
        </div>
    </section>
    @endif

    <section class="religion_info_travel pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2><span class="pe-2"><i class="fab fa-artstation"></i></span><a href="{{ url('category/' . $religion->category_slug) }}">{{$religion->category_name}}</a></h2>
                        </div>
                        <div class="card-body">
                            @foreach ($religion->posts->slice(0, 1) as $post)
                            <div class="news_with_img">
                                <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                    @if ($post->post_thumbnail)
                                        <img class="img-thumbnail" src="{{ asset($post->post_thumbnail) }}"
                                            alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                    @else
                                        <img class="img-thumbnail" src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                            alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                    @endif
                                </a>
                                <div class="news_title">
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>

                                </div>
                                <hr>
                            </div>
                            @endforeach

                            <div class="news_only_title">

                                <ul>
                                    @foreach ($religion->posts->slice(1, 4) as $post)
                                    <li>
                                        <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <h2>
                                <span class="pe-2"><i class="fab fa-artstation"></i></span><a href="{{ url('category/' . $religion->category_slug) }}">{{__('আরো পড়ুন')}}</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2><span class="pe-2"><i class="fas fa-cogs"></i></span><a href="{{ url('category/' . $infoTech->category_slug) }}">{{$infoTech->category_name}}</a></h2>
                        </div>
                        <div class="card-body">
                            @foreach ($infoTech->posts->slice(0, 1) as $post)
                            <div class="news_with_img">
                                <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                    @if ($post->post_thumbnail)
                                        <img class="img-thumbnail" src="{{ asset($post->post_thumbnail) }}"
                                            alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                    @else
                                        <img class="img-thumbnail" src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                            alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                    @endif
                                </a>
                                <div class="news_title">
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>
                                </div>
                                <hr>
                            </div>
                            @endforeach

                            <div class="news_only_title">
                                <ul>
                                    @foreach ($infoTech->posts->slice(1, 4) as $post)
                                    <li>
                                        <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <h2>
                                <span class="pe-2"><i class="fas fa-cogs"></i></span> <a href="{{ url('category/' . $infoTech->category_slug) }}">{{__('আরো পড়ুন')}}</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2><span class="pe-2"><i class="fas fa-balance-scale"></i></span><a href="{{ url('category/' . $travel->category_slug) }}">{{$travel->category_name}}</a></h2>
                        </div>
                        <div class="card-body">
                            @foreach ($travel->posts->slice(0, 1) as $post)
                            <div class="news_with_img">
                                <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                    @if ($post->post_thumbnail)
                                        <img class="img-thumbnail" src="{{ asset($post->post_thumbnail) }}"
                                            alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                    @else
                                        <img class="img-thumbnail" src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                            alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                    @endif
                                </a>
                                <div class="news_title">
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>

                                </div>
                                <hr>
                            </div>
                            @endforeach

                            <div class="news_only_title">

                                <ul>
                                    @foreach ($travel->posts->slice(1, 4) as $post)
                                    <li>
                                        <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">{{$post->post_title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <h2>
                                <span class="pe-2"><i class="fas fa-balance-scale"></i></span><a href="{{ url('category/' . $travel->category_slug) }}">{{__('আরো পড়ুন')}}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="education_entertainment pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="section_title">
                                <h2> <span class="pe-1"><i class="fas fa-globe-americas"></i></span> <a href="{{ url('category/' . $education->category_slug) }}">{{ $education->category_name }}</a> </h2>
                                <span class="title_border"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="section_read_more">
                                <a href="{{ url('category/' . $education->category_slug) }}">{{ __('আরো পড়ুন') }} <span><i
                                            class="fas fa-book-reader"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            @foreach ($education->posts->slice(0, 1) as $post)
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}">
                                            <img class="img-fluid" src="{{ asset($post->post_thumbnail) }}" alt="{{$post->thumbnail_alt !== NULL ? $post->thumbnail_alt : str_replace(" ","-",$post->post_title)}}">
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <h2><a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}">{{$post->post_title}}</a></h2>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-5 mt-1">
                            <div class="card">
                                <div class="card-body">
                                @foreach ($education->posts->slice(1,5) as $post)
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2><span class="pe-2"><i class="fab fa-artstation"></i></span><a href="{{ url('category/' . $entertainment->category_slug) }}">{{$entertainment->category_name}}</a></h2>
                        </div>
                        <div class="card-body">
                            @foreach ($entertainment->posts->slice(0, 4) as $post)
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
                        </div>

                        <div class="card-footer text-center">
                            <h2>
                                <span class="pe-2"><i class="fab fa-artstation"></i></span><a href="{{ url('category/' . $entertainment->category_slug) }}">{{__('আরো পড়ুন')}}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($sports->posts->count() > 0)
    <section class="sec_bg sports_section pt-5 pb-5 mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="section_title">
                        <h2 class="text-light"> {{ $sports->category_name }} </h2>
                        <span class="title_border"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="section_read_more">
                        <a class="text-white" href="{{ url('category/' . $sports->category_slug) }}"
                            >{{ __('আরো পড়ুন') }} <span><i class="fas fa-book-reader"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="row">

                    @foreach ($sports->posts->slice(0, 8) as $post)
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}" class="text-dark">
                                        <div class="feature_news_img">
                                            @if ($post->post_thumbnail)
                                                <img class="img-fluid" src="{{ asset($post->post_thumbnail) }}"
                                                    alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                            @else
                                                <img class="img-fluid"
                                                    src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                                    alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                            @endif
                                        </div>
                                        <div class="feature_news_title mt-1">
                                            <h2>{{ $post->post_title }} </h2>
                                        </div>
                                        <div class="feature_news_components d-flex">
                                            <p><span class="pe-1"><i class="fas fa-user-clock"></i></span>
                                                {{ $post->created_at->format('jS M Y') }}</p>
                                            <p class="ps-0"><span><i class="fas fa-book-medical"></i></span>
                                                {{ $post->view_count }} {{ __('বার পড়া হয়েছে') }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach



            </div>
        </div>
    </section>
    @endif
    <section class="sec_bg photo_gallery mb-5 pt-5 pb-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                                <div class="carousel-inner">
                                    @if ($photoGallery->posts->count() > 0)
                                        @foreach ($photoGallery->posts->slice(0, 8) as $key => $post)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                                    @if ($post->post_thumbnail)
                                                        <img class="img-fluid"
                                                            src="{{ asset($post->post_thumbnail) }}"
                                                            alt="{{ $post->thumbnail_alt !== null ? $post->thumbnail_alt : str_replace(' ', '-', $post->post_title) }}">
                                                    @else
                                                        <img class="img-fluid"
                                                            src="{{ asset('frontend/assets/images/post/default-post.png') }}"
                                                            alt="{{ str_replace(' ', '-', $post->post_title) }}">
                                                    @endif

                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>{{ $post->post_title }}</h5>

                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h2><span><i class="fas fa-video"></i></span> {{ $specialReport->category_name }}</h2>
                        </div>
                        <div class="card-body">
                            @if ($specialReport->posts->count() > 0)
                                @foreach ($specialReport->posts->slice(0, 4) as $post)
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
                        <div class="card-footer our_bangladesh text-center">
                            <h2><span class="pe-3"><i class="fab fa-accusoft"></i></span><a
                                    href="{{ url('category/' . $specialReport->category_slug) }}">{{ __('আরো পড়ুন') }}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec_bg video_gallery mb-3 pb-5 pt-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2><span class="pe-2"><i class="fas fa-video"></i></span>{{ __('ভিডিও') }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if ($videos->count() > 0)
                            @foreach ($videos->slice(0, 6) as $post)
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
                                                            <img class="img-fluid"
                                                                src="{{ asset('frontend/assets/images/videos/thumbnail-1.png') }}"
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
                        @endif

                    </div>

                </div>
            </div>

        </div>
    </section>
    @if ($home_section_before_footer->status == 1)
    <section class="sec_bg middle_section_ad mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="home_sidebar_ad_one">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{$home_section_before_footer->ad_link}}" target="__blank">
                                    {!! $home_section_before_footer->ad_code !!}
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
