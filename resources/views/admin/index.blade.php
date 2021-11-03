@extends('admin.admin-master')

@section('content')
@php
    $posts = DB::table('posts')->get();
    $cats = DB::table('categories')->get();
    $districts = DB::table('districts')->get();
    $divisions = DB::table('divisions')->get();
    $users = DB::table('users')->get();
    $roles = DB::table('roles')->get();
    $role = Auth::User()->role_id;
@endphp
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-primary-light rounded w-60 h-60">
                              <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                          </div>
                          <div>
                              
                              <p class="text-mute mt-20 mb-0 font-size-16">Posts</p>
                              <h3 class="text-white mb-0 font-weight-500">{{count($posts)}} </h3>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-warning-light rounded w-60 h-60">
                              <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Categories</p>
                              <h3 class="text-white mb-0 font-weight-500">{{count($cats)}} </h3>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-info-light rounded w-60 h-60">
                              <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Districts</p>
                              <h3 class="text-white mb-0 font-weight-500">{{count($districts)}} </h3>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-danger-light rounded w-60 h-60">
                              <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Disvisions</p>
                              <h3 class="text-white mb-0 font-weight-500">{{count($divisions)}}</h3>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-success-light rounded w-60 h-60">
                              <i class="text-success mr-0 font-size-24 mdi mdi-phone-outgoing"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">{{__('Users')}}</p>
                              <h3 class="text-white mb-0 font-weight-500">{{count($users)}} </h3>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                          <div class="icon bg-light rounded w-60 h-60">
                              <i class="text-white mr-0 font-size-24 mdi mdi-chart-line"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">{{__('Roles')}}</p>
                              <h3 class="text-white mb-0 font-weight-500">{{count($roles)}}</h3>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-12">
                <div class="col-12">
                    @php
                        $allPosts = App\Models\Post::latest()->orderBy('id', 'DESC')->take(6)->get();
                        $authuserNews = App\Models\Post::where('user_id', Auth::id())->orderBy('id', 'DESC')->take(6)->get();
                    @endphp
                    @if ($role == 1 || $role == 2)
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2>{{__('Latest Published Posts')}}</h2>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table  class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Psot id') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Title') }}</th>
                                           <th>{{ __('author') }}</th>
                                            <th>{{ __('Category') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($allPosts->count() > 0)
                                            @foreach ($allPosts as $post)


                                                <tr>
                                                    <td class="py-1">{{ $post->id }}</td>
                                                    <td class="py-1">
                                                        <img src="{{ asset($post->post_thumbnail) }}" alt="{{ $post->post_title }}"
                                                            style="width:80px; height:80;">
                                                    </td>
                                                    <td> {{ Str::words($post->post_title, 10, ' ...') }} </td>
                                                    @if ($post->repoter_name == !null)
                                                        <td><a href="">{{ $post->repoter_name }}</a></td>
                                                    @else
                                                        <td><a href="{{url('admin/user/'.$post->user->name)}}">{{ $post->user->name }}</a></td>
                                                    @endif
                                                                                                            
                                                    <td> <a href="{{url('admin/category/'.$post->category->category_slug)}}">@if ($post->category != NULL){{ $post->category->category_name }}@endif</a> </td>
                                                    
                                                    <td>
                                                        <a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}" target="__blank"
                                                            class="badge badge-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                        <a href="{{ route('edit.post',$post->id) }}" class="badge badge-primary"><span class="glyphicon glyphicon-edit"></span></a>
                                                        <a href="{{route('sdelete.post',$post->id)}}" class="badge badge-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    @else
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2>{{__('Latest Published Posts')}}</h2>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table  class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Psot id') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Title') }}</th>
                                           <th>{{ __('author') }}</th>
                                            <th>{{ __('Category') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($authuserNews->count() > 0)
                                            @foreach ($authuserNews as $post)


                                                <tr>
                                                    <td class="py-1">{{ $post->id }}</td>
                                                    <td class="py-1">
                                                        <img src="{{ asset($post->post_thumbnail) }}" alt="{{ $post->post_title }}"
                                                            style="width:80px; height:80;">
                                                    </td>
                                                    <td> {{ Str::words($post->post_title, 10, ' ...') }} </td>
                                                    @if ($post->repoter_name == !null)
                                                        <td><a href="">{{ $post->repoter_name }}</a></td>
                                                    @else
                                                        <td><p>{{ $post->user->name }}</p></td>
                                                    @endif
                                                    
                                                        
                                                    <td> <a href="{{url('admin/category/'.$post->category->category_slug)}}">@if ($post->category != NULL){{ $post->category->category_name }}@endif</a> </td>

                                                    
                                                    <td>
                                                        <a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}" target="__blank"
                                                            class="badge badge-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                        <a href="{{ route('edit.post',$post->id) }}" class="badge badge-primary"><span class="glyphicon glyphicon-edit"></span></a>
                                                        <a href="{{route('sdelete.post',$post->id)}}" class="badge badge-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    @endif
                    <!-- /.box -->
                </div>
              </div>
              
              
          </div>
      </section>
      <!-- /.content -->
    </div>
</div>

@endsection