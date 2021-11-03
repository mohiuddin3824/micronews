@extends('frontend.frontend-master')

@section('content')
    <div class="single-box">
        <section class="single_page_body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center" style="margin-bottom:30px; ">
                            <h1>{{__('Get in Touch')}}</h1>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="contact" class="contact">
            <div class="container">
      
              <div class="row text-center" data-aos="fade-up">
      
                <div class="col-sm-12">
      
                  <div class="info-wrap">
                    <div class="row">
                      <div class="col-lg-4 info">
                        <i class="icofont-google-map"></i>
                        <h4>{{__('Location:')}}</h4>
                        <p>{{$contactInfos->location}}</p>
                      </div>
      
                      <div class="col-lg-4 info mt-4 mt-lg-0">
                        <i class="icofont-envelope"></i>
                        <h4>{{__('Email:')}}</h4>
                        <p>{{$contactInfos->email}}</p>
                      </div>
      
                      <div class="col-lg-4 info mt-4 mt-lg-0">
                        <i class="icofont-phone"></i>
                        <h4>{{__('Call:')}}</h4>
                        <p>{{$contactInfos->phone}}</p>
                      </div>
                    </div>
                  </div>
      
                </div>
      
              </div>
      
              <div class="card row mt-5 text-center" data-aos="fade-up">
                <div class="col-sm-12">
                  <form action="{{route('contact.store')}}" method="post" class="card-body php-email-form">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                      <div class="col-md-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                        @error('email')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3">
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                      @error('subject')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                      @error('message')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>  
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      @endif
                    </div>
                    <div class="text-center"><button class="btn btn-success" type="submit">Send Message</button></div>
                  </form>
                </div>
      
              </div>
      
            </div>
          </section><!-- End Contact Section -->
    </div>

    <section class="mt-3 mb-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header text-center">
                <h2>{{__('Find Us on Google')}}</h2>
              </div>
              <div class="card-body">
                
                  {!! $contactInfos->gmap !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
