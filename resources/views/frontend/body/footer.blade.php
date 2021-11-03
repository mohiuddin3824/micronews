@php
    $footers = App\Models\Footer::first();
@endphp
<footer class="sec_bg">
    <div class="top_footer pt-3 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="footer_logo">
                        <a href="{{url('/')}}"><img src="{{asset($footers->footer_logo)}}" alt="{{$seos->meta_author}}"></a>
                        <span class="title_border mb-2 mt-2"></span>
                        <p>
                            {!! $footers->footer_disclaimer !!}
                        </p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="footer_about">
                        <h2 class="mt-3">Know us</h2>
                        <span class="title_border mb-2 mt-2"></span>
                        <ul>
                            <li><a href="{{$footers->footer_menu_link1}}">{{__('About Us')}}</a></li>
                            <li><a href="{{$footers->footer_menu_link2}}">{{__('Contact Us')}}</a></li>
                            <li><a href="{{$footers->footer_menu_link3}}">{{__('Privacy and Policy')}}</a></li>
                            <li><a target="__blank" href="{{$footers->footer_font}}">{{__('Convert Font')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 responsive_class">
                    <h2 class="mt-3">{{__('Like Us')}}</h2>
                    <span class="title_border mb-2 mt-2"></span>
                    <div class="fb_page">
                        {!! $footers->fb !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-top-wrapper show">
        <span class="scroll-top-inner">
            <i class="fa fa-2x fa-angle-up"></i>
        </span>
    </div>
    <div class="bottom_footer bg-dark">
        
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <p class="text-light pt-2">@Copyright 2021, Allrights Reserved, TheHolyMedia.com | <span>Developed by <a href="https://webservice24.org/">MicroWeb Technology</a></span></p>
                </div>
                <div class="col-sm-3">
                    <div class="footer_socials">
                        <ul>
                            <li><a href="" class="text-light"><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href="" class="text-light"><i class="fab fa-twitter-square"></i></a></li>
                            <li><a href="" class="text-light"><i class="fab fa-youtube-square"></i></a></li>
                            <li><a href="" class="text-light"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>