@php
$socials = DB::table('socials')->first();

$headers = App\Models\Header::first();

$topAd = App\Models\Advert::where('ad_name', 'Top Header')->first();
$seos = DB::table('s_e_o_s')->first();
@endphp
<header class="site_header bg-light">
    @if ($topAd->status == 1)
        <div class="header_advert">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <div class="adcontent">
                            {!! $topAd->ad_code !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="top_header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 pt-3 text-center">
                    <p class="date"><span><i class="fas fa-map-marker-alt"></i></span>
                        @php
                            use EasyBanglaDate\Types\BnDateTime;

                            $bongabda = new BnDateTime('now', new DateTimeZone('Asia/Dhaka'));
                            echo $bongabda->getDateTime()->format('l, jS F, Y');
                        @endphp
                    </p>
                </div>
                <div class="col-sm-5">
                    <div class="site_logo text-center">
                        @if ($headers->header_logo)
                            <a href="{{ url('/') }}"><img src="{{ asset($headers->header_logo) }}"
                                    class="header_logo" alt="{{ $seos->meta_author }}"></a>
                        @else
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/assets/images/logos/logo.png') }}" class="header_logo"
                                    alt="theholymedia">
                            </a>
                        @endif
                    </div>

                </div>

                <div class="col-sm-2 login_colum">
                    <div class="dark_light">

                        <div class="form-check form-switch">
                            <label class="form-check-label" for="lightSwitch">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-brightness-high" viewBox="0 0 16 16">
                                    <path
                                        d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                </svg>
                            </label>
                            <input class="form-check-input" type="checkbox" id="lightSwitch" />
                        </div>
                    </div>

                </div>
                <div class="col-sm-2 write_colum">
                    <div class="footer_socials pt-3">
                        <ul>
                            @if ($socials->facebook == !null)
                                <li class="facebook" data-toggle="tooltip" data-placement="bottom"
                                    title="Fcebook"><a href="{{ $socials->facebook }}" target="__blank"><i
                                            class="fab fa-facebook-square"></i></a></li>
                            @endif

                            @if ($socials->twitter == !null)
                                <li class="twitter" data-toggle="tooltip" data-placement="bottom"
                                    title="Twitter"><a href="{{ $socials->twitter }}" target="__blank"><i
                                            class="fab fa-twitter-square"></i></a></li>
                            @endif

                            @if ($socials->instagram == !null)
                                <li class="instagram" data-toggle="tooltip" data-placement="bottom"
                                    title="Instagram"><a href="{{ $socials->instagram }}" target="__blank"><i
                                            class="fab fa-instagram-square"></i></a></li>
                            @endif

                            @if ($socials->youtube == !null)
                                <li class="youtube" data-toggle="tooltip" data-placement="bottom"
                                    title="Youtube"><a href="{{ $socials->youtube }}" target="__blank"><i
                                            class="fab fa-youtube-square"></i></a></li>
                            @endif

                            @if ($socials->linkedin == !null)
                                <li class="sun_clooud" data-toggle="tooltip" data-placement="bottom"
                                    title="Linked-In"><a href="{{ $socials->linkedin }}" target="__blank"><i
                                            class="fab fa-instagram-square"></i></a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header_menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <a class="home_btn pe-1" href="{{ url('/') }}"><i class="fa fa-home"
                                    aria-hidden="true"></i></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="main_nav">
                                <ul class="navbar-nav">
                                    @foreach ($menuItems as $key => $menuItem)

                                        @if ( count($menuItem->submenus) == 0 )
                                            <li class="nav-item"><a class="nav-link" href="{{ url($menuItem->link) }}">{{ $menuItem->name }}</a></li>

                                        @else
                                            <li class="nav-item dropdown">
                                                <a class="nav-link  dropdown-toggle" href="{{ url($menuItem->link) }}" data-bs-toggle="dropdown"> {{ $menuItem->name }} <b class="caret"></b></a>

                                                <ul class="dropdown-menu animate slideIn">
                                                    @foreach ($menuItem->submenus as $key => $submenu )
                                                        <li><a class="dropdown-item" href="{{ url($submenu->link) }}">{{ $submenu->name }}</a></li>
                                                    @endforeach

                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div> <!-- navbar-collapse.// -->
                        </div> <!-- container-fluid.// -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
