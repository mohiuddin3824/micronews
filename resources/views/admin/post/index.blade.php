 @php
    $seos = DB::table('s_e_o_s')->first();
    $role = Auth::User()->role_id;
    $authuserNews = App\Models\Post::where('user_id', Auth::id())->orderBy('id', 'DESC')->take(6)->get();
    @endphp
@extends('admin.admin-master')

@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">{{$seos->meta_author}}</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('All Posts') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <div class="row">
                                    <div class="col-6 text-right">
                                        <a href="{{ route('create.post') }}"
                                            class="btn btn-success">{{ __('Add New Post') }}</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a class="btn btn-danger float-sm-left"
                                            href="{{ route('trashed.posts') }}">{{ __('Trashed Posts') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example6" class="table table-bordered table-striped" style="width:100%">
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
                                            @if ($role == 1 || $role == 2)
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
                                            @else
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
                                                                    class="badge badge-success">{{ __('View') }}</a>
                                                                <a href="{{ route('edit.post',$post->id) }}" class="badge badge-primary">{{ __('Edit') }}</a>
                                                                <a href="{{route('sdelete.post',$post->id)}}" class="badge badge-danger">{{ __('Trash') }}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
