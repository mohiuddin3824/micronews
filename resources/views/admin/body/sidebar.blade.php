@php
    $role = Auth::User()->role_id;
    $headers = App\Models\Header::first();
    $seos = DB::table('s_e_o_s')->first();
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        @if ($headers->header_logo)
                        <img class="img-thumbnail" src="{{ asset($headers->header_logo) }}" alt="{{$seos->meta_title}}">
                            
                        @else
                            <img src="{{asset('backend/images/logo/default-logo.png')}}" class="img-thumbnail" id="profileThmb" alt="MicroWeb Technology">

                        @endif
                    </div>  
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if ( $role == 1 || $role == 2 || $role == 3 || $role == 4 || $role == 5 || $role == 6)                            
                <li class="treeview">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>{{ __('Posts') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        
                        <li class="{{ request()->is('admin/all/posts*') ? 'active' : 'deactive' }}"> <a
                                href="{{ route('all.posts') }}"><i class="ti-more"></i>{{ __('All Posts') }}</a></li>
                        <li class="{{ request()->is('admin/create/new/post*') ? 'active' : 'deactive' }}"><a
                                href="{{ route('create.post') }}"><i class="ti-more"></i>{{ __('Add New Post') }}</a></li>

                    </ul>
                </li>
            @else

            @endif

            @if ( $role == 1 || $role == 2 || $role == 3 || $role == 4 || $role == 5) 
                <li class="treeview">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>{{ __('Videos') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('admin/all/videos*') ? 'active' : 'deactive' }}"> <a
                                href="{{ route('all.videos') }}"><i class="ti-more"></i>{{ __('All Videos') }}</a></li>

                        <li class="{{ request()->is('admin/add/new/video*') ? 'active' : 'deactive' }}"> <a
                                href="{{ route('add.video') }}"><i class="ti-more"></i>{{ __('Add New Video') }}</a></li>
                        
                        @if ( $role == 1 || $role == 2) 
                            <li class="{{ request()->is('admin/video/categories*') ? 'active' : 'deactive' }}"><a
                                href="{{ route('all.videocategories') }}" class="active"><i
                                    class="ti-more"></i>{{ __('Categories') }}</a></li>
                        @else

                        @endif
                    </ul>
                </li>
            @else

            @endif
            
             @if ( $role == 1 || $role == 2 || $role == 3 || $role == 4 || $role == 5) 
                <li class="{{ request()->is('admin/live/tv/settings*') ? 'active' : 'deactive' }}">
                    <a href="{{route('tv.setting')}}">
                        <i data-feather="message-circle"></i>
                        <span>{{ __('Live Tv') }}</span>
                    </a>
                </li>
            @else

            @endif

            @if ( $role == 1 || $role == 2 || $role == 3 || $role == 4) 
                <li class="treeview">
                    <a href="#">
                        <i data-feather="grid"></i>
                        <span>{{ __('Appreance') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('admin/all/categories*') ? 'active' : 'deactive' }}"><a
                                href="{{ route('all.categories') }}" class="active"><i
                                    class="ti-more"></i>{{ __('Categories') }}</a></li>
                        @if ( $role == 1 || $role == 2 || $role == 4)                                     
                        <li class="{{ request()->is('admin/divisions*') ? 'active' : 'deactive' }}"><a
                                href="{{ route('divisions') }}"><i class="ti-more"></i>{{ __('Divisions') }}</a></li>

                        <li class="{{ request()->is('admin/districts*') ? 'active' : 'deactive' }}"><a
                                href=" {{ route('districts') }} "><i class="ti-more"></i>{{ __('Districts') }}</a></li>

                        <li class="{{ request()->is('admin/tags*') ? 'active' : 'deactive' }}"><a
                                    href=" {{ route('all.tags') }} "><i class="ti-more"></i>{{ __('Tags') }}</a></li>
                        @else
                        @endif
                    </ul>
                </li>
            @else

            @endif

            @if ( $role == 1 || $role == 2 || $role == 4)   
                <li class="treeview">
                    <a href="#">
                        <i data-feather="mail"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('admin/contact/message*') ? 'active' : 'deactive' }}"><a href="{{route('admin.message')}}"><i class="ti-more"></i>{{__('Inbox')}}</a></li>
                        
                    </ul>
                </li>
            @else

            @endif 

            @if ( $role == 1 || $role == 2 || $role == 3 || $role == 4) 
                <li class="treeview">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Pages</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('admin/all/pages*') ? 'active' : 'deactive' }}"><a href="{{route('all.pages')}}"><i class="ti-more"></i>{{__('Pages')}}</a></li>
                        <li class="{{ request()->is('admin/create/pages*') ? 'active' : 'deactive' }}"><a href="{{route('create.page')}}"><i class="ti-more"></i>{{__('Add New Page')}}</a></li>
                        
                    </ul>
                </li>
            @else

            @endif
            @if ( $role == 1 || $role == 2 || $role == 3 || $role == 4) 
                <li class="treeview">
                    <a href="#">
                        <i data-feather="grid"></i>
                        <span>{{__('Theme Settings')}}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if ( $role == 1 || $role == 2 ) 
                            <li class="{{ request()->is('admin/header/settings*') ? 'active' : 'deactive' }}"><a href="{{route('header.settings')}}"><i class="ti-more"></i>{{__('Header Style')}}</a></li>
                            <li class="{{ request()->is('admin/footer/settings*') ? 'active' : 'deactive' }}"><a href="{{route('footer.settings')}}"><i class="ti-more"></i>{{__('Footer Settings')}}</a></li>
                            <li class="{{ request()->is('admin/contact/settings*') ? 'active' : 'deactive' }}"><a href="{{route('contact.settings')}}"><i class="ti-more"></i>{{__('Contact Information')}}</a></li>
                            
                            
                        @else
                        @endif

                        @if ( $role == 1 || $role == 2 || $role == 3) 
                            <li class="{{ request()->is('admin/seo/settings*') ? 'active' : 'deactive' }}"><a href="{{route('seo.setting')}}"><i class="ti-more"></i>{{__('SEO Settings')}}</a></li>
                        @else
                        @endif
                        
                        <li class="{{ request()->is('admin/social/links*') ? 'active' : 'deactive' }}"><a href="{{route('social.links')}}"><i class="ti-more"></i>{{__('Social Medias')}}</a></li>
                        
                        @if ( $role == 1 || $role == 2 ) 
                            <li><a href="{{route('all.adverts')}}"><i class="ti-more"></i>{{__('Advertise Management')}}</a></li>
                        @endif
                    </ul>
                </li>
            @else
            @endif

            @if ( $role == 1) 
                <li class="treeview">
                    <a href="#">
                        <i data-feather="credit-card"></i>
                        <span>{{__('Menus')}}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('admin/menu*') ? 'active' : 'deactive' }}"><a href="{{route('primary.menu')}}"><i class="ti-more"></i>{{__('Primary Menu')}}</a></li>
                        <li class="{{ request()->is('admin/sub/menu*') ? 'active' : 'deactive' }}"><a href="{{route('sub.menu')}}"><i class="ti-more"></i>{{__('Sub Menu')}}</a></li>
                        
                    </ul>
                </li>
            @else
            @endif
          
            @if ( $role == 1 || $role == 2) 
                <li class="treeview">
                    <a href="#">
                        <i data-feather="alert-triangle"></i>
                        <span>{{__('Authentication')}}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if ( $role == 1) 
                            <li class="{{ request()->is('admin/all/roles*') ? 'active' : 'deactive' }}"><a href="{{route('all.roles')}}"><i class="ti-more"></i>{{__('Roles')}}</a></li>
                        @else

                        @endif

                        <li class="{{ request()->is('admin/create/user*') ? 'active' : 'deactive' }}"><a href="{{route('create.user')}}"><i class="ti-more"></i>{{__('Add New User')}}</a></li>
                        <li class="{{ request()->is('admin/all/users*') ? 'active' : 'deactive' }}"><a href="{{route('all.users')}}"><i class="ti-more"></i>{{__('All Users')}}</a></li>
                        
                    </ul>
                </li>
            @else

            @endif

            
            @if ( $role == 1 || $role == 2) 
                <li>
                    <a href="{{ route('google.analytics') }}">
                        <i data-feather="pie-chart"></i>
                        <span>{{__('Google Analytics')}}</span>
                    </a>
                </li>
            @else

            @endif
            

            <li class="header nav-small-cap">EXTRA</li>

            

            <li>
                <a href="{{route('admin.logout')}}">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

</aside>
