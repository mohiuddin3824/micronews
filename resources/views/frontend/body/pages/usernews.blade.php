
@extends('frontend.frontend-master')

@section('content')

    <section class="sec_bg writer_top_section">
        <div class="bg_overlay"></div>
        <div class="ing_greadient"></div>
        <div class="container">
            <div class="section_content">
                <div class="section_header">
                    <h2 >ইসলাম প্রচারের বিশ্বস্ত প্ল্যাটফর্ম</h2>
                </div>
                <div class="mt-3 section_slogan">

                    <p >ইসলাম প্রচারের নতুন ধারার মিডিয়া</p>
                </div>
            </div>
        </div>
    </section>
    <section class="writer_pic">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="writer_img" style="width:200px;height:200px">
                        @if ($user->profile_photo)
                            <img src="{{ asset($user->profile_photo) }}" class="img-thumbnail" id="profileThmb" alt="{{$user->name}}" >
                        @else
                            <img src="{{asset('backend/images/avatar/avatar-6.png')}}" class="img-thumbnail" id="profileThmb" alt="{{$user->name}}">

                        @endif
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="writer_articles mt-3">
                        <i class="fas fa-user-edit"></i> <span class="text-medium">{{ App\Models\Post::where('user_id', $user->id)->count() }} {{__('Publishhed Articles')}}</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="profile_desc">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>{{__('About')}} {{$user->name}}</h2>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Accordion Item #1
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Accordion Item #2
                                    </button>
                                  </h2>
                                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      Accordion Item #3
                                    </button>
                                  </h2>
                                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec_bg  pb-5 mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2><i class="fab fa-accusoft"></i> {{__('Content By')}} {{$user->name}}</h2>
                   
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        @foreach ($userNews->slice(0,12) as $post)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="{{url('post/'. $post->id.'/'.$post->post_slug)}}" class="text-dark">
                                        <div class="feature_news_img">
                                            @if ($post->post_thumbnail)
                                                <img class="img-fluid" src="{{ asset($post->post_thumbnail) }}" alt="{{$post->thumbnail_alt !== NULL ? $post->thumbnail_alt : str_replace(" ","-",$post->post_title)}}">
                                            @else    
                                                <img class="img-fluid" src="{{ asset('frontend/assets/images/post/default-post.png') }}" alt="{{str_replace(" ","-",$post->post_title)}}">
                                            @endif
                                        </div>
                                        <div class="feature_news_title mt-1">
                                            <h2>{{$post->post_title}}</h2>
                                        </div>
                                        <div class="card-footer feature_news_components d-flex">
                                            <p><span class="pe-1"><i class="fas fa-user-clock"></i></span> {{$post->created_at->format('jS M Y')}}</p>
                                            <p class="ps-2"><span><i class="fas fa-book-medical"></i></span> {{$post->view_count}} {{__('বার পড়া হয়েছে')}}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
        
                        </div>
                    @endforeach
                        
                        
                    </div>
                </div>
                <div class="card-footer">
                    {{ $userNews->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
    <section class="sec_bg middle_section_ad mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <img src="images/ads/ad1.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>


@endsection