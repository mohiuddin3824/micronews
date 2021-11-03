@extends('frontend.frontend-master')

@section('content')
@php
    $single_page_footer = App\Models\Advert::where('ad_name', 'Single Page Before Footer')->first();
@endphp
    <section class="single_page_body mt-2 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h1>{{ $page->title }}</h1>
                        </div>
                        
                        <div class="card-body">
                            <div class="single_page_main_content">
                                <img class="img-fluid mb-4" src="{{ asset($page->image) }}" alt="{{ $page->title }}">
    
                                {!! $page->description !!}
    
                            </div>
                        </div>
                    </div>                                
                </div>
                
            </div>
        </div>
    </section>
    @if ($single_page_footer->status == 1)
    <section class="sec_bg middle_section_ad mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="home_sidebar_ad_one">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{$single_page_footer->ad_link}}" target="__blank">
                                    {!! $single_page_footer->ad_code !!}
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
