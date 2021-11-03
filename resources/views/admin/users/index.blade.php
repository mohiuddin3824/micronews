@php
$role = Auth::User()->role_id;
$seos = DB::table('s_e_o_s')->first();
@endphp

@extends('admin.admin-master')

@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">{{ $seos->meta_author }}</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('User') }}</li>
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
                            @if ($role == 1 || $role == 2)
                                <div class="box-header with-border">
                                    <div class="row">
                                        <div class="col-6 text-right">
                                            <a href="{{ route('create.user') }}"
                                                class="btn btn-success">{{ __('Add New User') }}</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="{{ route('trashed.users') }}"
                                                class="btn btn-info">{{ __('Trashed Users') }}</a>
                                        </div>

                                    </div>
                                </div>
                            @else

                            @endif
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="userTable" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Role') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Posts') }}</th>
                                                <th>{{ __('Photo') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($users->count())
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->roles->role }}</td>
                                                        <td>
                                                            @if ($user->status == 1)
                                                                <button class="btn btn-success">{{__('Active')}}</button>
                                                             @else
                                                                <button class="btn btn-danger">{{__('Blocked')}}</button>
                                                            @endif
                                                        </td>
                                                        <td><p class="joined-text">{{ App\Models\Post::where('user_id', $user->id)->count() }}</p></td>
                                                        <td>
                                                            @if ($user->profile_photo)
                                                                
                                                                <img src="{{ asset($user->profile_photo) }}" alt="{{ $user->name }}" style="width:80px; height:80px;">
                                                            @else
                                                                <img src="{{asset('backend/images/avatar/avatar-6.png')}}" class="img-thumbnail" id="profileThmb" alt="{{Auth::User()->name}}" style="width:80px; height:80px;">    
                                                            @endif
                                                        </td>

                                                        <td>
                                                            {{-- <a href="{{route('view.profile', $user->id)}}" class="btn btn-success">{{__('View')}}</a> --}}

                                                            <a href="{{ route('edit.user', $user->id) }}"
                                                                class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                                            @if ($role == 1)
                                                                <a href="{{ route('sdelete.user', $user->id) }}"
                                                                    class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                                                @if ($user->status == 1)
                                                                    <a href="{{ route('block.user', $user->id) }}" class="btn btn-danger"><span class="fa fa-lock"></span></a>
                                                                @else
                                                                    <a href="{{ route('unblock.user', $user->id) }}" class="btn btn-success"><span class="fa fa-unlock"></span></a>
                                                                @endif
                                                            @elseif ($role == 2)
                                                                @if ($user->status == 1)
                                                                    <a href="{{ route('block.user', $user->id) }}" class="btn btn-danger"><span class="fa fa-lock"></span></a>
                                                                @else
                                                                    <a href="{{ route('unblock.user', $user->id) }}" class="btn btn-success"><span class="fa fa-unlock"></span></a>
                                                                @endif

                                                            @endif
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
                        <!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
