 @php
    $seos = DB::table('s_e_o_s')->first();
    @endphp
@extends('admin.admin-master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                    <li class="breadcrumb-item" aria-current="page">{{ __('Footer Settings') }}</li>
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
                            <div class="box-header">
                                <h2>{{ __('SEO Settings will increase traffic for your site!') }}</h2>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <form class="forms-sample" action="{{route('footer.update', $footers->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$footers->id}}">
                            <div class="box">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label for="footer_logo">{{ __('Foter logo') }}</label>
                                        <input type="file" class="form-control" id="fLogo" name="footer_logo">
                                        <input type="hidden" name="oldimage" value="{{ $footers->footer_logo }}">
                                    </div>
                                    <div class="form-group" style="width:200px; height:200px;">
                                        <img src="{{ asset($footers->footer_logo) }}" class="img-thumbnail"
                                            id="footerLogo" alt="site logo">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="footer_disclaimer">{{ __('site Description') }}</label>
                                        <textarea name="footer_disclaimer" id="some-textarea"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $footers->footer_disclaimer }}</textarea>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="box">
                                <div class="box-body">
                  
                                    <div class="form-group">
                                        <label for="footer_menu_link1">{{ __('About Us') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="footer_menu_link1" value="{{ $footers->footer_menu_link1 }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_menu_link2">{{ __('Contact Us') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="footer_menu_link2" value="{{ $footers->footer_menu_link2 }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_menu_link3">{{ __('Privacy and Policy') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="footer_menu_link3" value="{{ $footers->footer_menu_link3 }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_menu_link4">{{ __('Footer Menu link Foure') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="footer_menu_link4" value="{{ $footers->footer_menu_link4 }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_menu_link5">{{ __('Footer Menu link Five') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="footer_menu_link5" value="{{ $footers->footer_menu_link5 }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_menu_link6">{{ __('Footer Menu link Six') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="footer_menu_link6" value="{{ $footers->footer_menu_link6 }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_menu_link7">{{ __('Footer Menu link Seven') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="footer_menu_link7" value="{{ $footers->footer_menu_link7 }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_menu_link8">{{ __('Footer Menu link Eight') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="footer_menu_link8" value="{{ $footers->footer_menu_link8 }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_menu_link9">{{ __('Footer Menu link Nine') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ url('') }}/</span>
                                            </div>
                                            <input type="text" name="footer_menu_link9" value="{{ $footers->footer_menu_link9 }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fb">{{ __('Facebook page') }}</label>
                                        <textarea style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="fb">{{ $footers->fb }}</textarea>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="footer_font">{{ __('Footer Font') }}</label>
                                        <input type="text" class="form-control" name="footer_font"
                                            value="{{ $footers->footer_font }}">
                                    </div>
                                    

                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary mr-2">{{ __('Save Changes') }}</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {



            $('#fLogo').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#footerLogo').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });
            
            

        });
    </script>

@endsection
