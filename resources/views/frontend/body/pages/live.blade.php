@extends('frontend.frontend-master')

@section('content')
@php
    $single_page_sidebar_one = App\Models\Advert::where('ad_name', 'Single Page Sidebar One')->first();
    $single_page_middle_ad = App\Models\Advert::where('ad_name', 'Single Page Middle')->first();
    $liveTV = DB::table('livetv')->first();
@endphp
    <section class="single_page_body">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    
                    <div class="single-box">
                                                
                        <div class="single_page_main_content">
                            

                            {!! $liveTV->livevideo !!}

                        </div>
                        
                    </div>
                    @if ($single_page_middle_ad->status == 1)
                        
                        <div class="dingle_page_middle_ad">
                            {!! $single_page_middle_ad->ad_code !!}
                        </div>
                    @endif
                    
                    
                </div>
                <div class="col-md-4">
                    <div class="single_page_sidebar" style="margin-top: 20px">
                        <div class="latest_news_single_sidebar_content">
                            <div class="category_sidebar_header">
                                <div class="categoyy_sidebar_divider_1">
                                    <div class="category_line_1"></div>
                                    <div class="category_line_2"></div>
                                </div>
                                <div class="catgeroy_sidebar_head_text single_sidebar_text_diveder">
                                    <h3>{{ __('সর্বশেষ প্রকাশিত') }}</h3>
                                </div>
                                <div class="categoyy_sidebar_divider_2">
                                    <div class="category_line_3"></div>
                                    <div class="category_line_4"></div>
                                </div>
                            </div>
                            <div class="latest_news_single_sidebar">
                                @foreach ($latestPost as $post)
                                    <a href="{{ url('post/' . $post->id . '/' . $post->post_slug) }}">
                                        <p><span><i class="fas fa-angle-double-right"></i></span> {{ $post->post_title }}
                                        </p>
                                    </a>
                                @endforeach


                            </div>
                        </div>

                    </div>
                    @if ($single_page_sidebar_one->status == 1)
                        
                        <div class="single_page_sidebar_ad">
                            {!! $single_page_sidebar_one->ad_code !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
