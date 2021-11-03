 @php
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
                        <h3 class="page-title">{{$seos->meta_author}}</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Create ‍Sub Menu') }}
                                    </li>
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
                                <h2>{{ __('Create Sub Menu Item') }}</h2>
                            </div>
                            <div class="box-body">
                                <form action="{{ route('store.submenu') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{__('Sub Menu Item Name')}}</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu_item_id">Main Menu Item</label>
                                        <select class="form-control" name="menu_item_id" id="">
                                            @foreach ($menus as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('menu_item_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="link" value="{{ old('link') }}" class="form-control"
                                                placeholder="article/video">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Enable
                                            </option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Disable
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">{{__('Position')}}</label>
                                        <input type="number" name="position" value="{{ old('position') }}"
                                            class="form-control" placeholder="Enter Position">
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary">{{__('Submit')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-header -->

                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
