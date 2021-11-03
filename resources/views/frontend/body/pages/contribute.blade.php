@extends('frontend.frontend-master')

@section('content')

<section class="sec_bg cat_top_section contribute overflow-hidden" style="background-image: url('{{asset('frontend/assets/images/pages/contribute.jpg')}}')">
    <div class="bg_overlay"></div>
    <div class="ing_greadient"></div>
    <div class="container">
        <div class="section_content">
            <div class="section_header">
                <h2>{{__('বাংলা ভাষায় সর্ববৃহৎ কন্টেন্ট বিপ্লবের অংশ হোন আপনিও')}}</h2>
            </div>
            <div class="mt-3 section_slogan">

                <p class="ps-2 pe-2">{{__('রোর বাংলার যাত্রা শুরু হয়েছিল এমন সব গল্প বলার জন্য, যেগুলো জীবনের কথা বলে, স্বপ্নের কথা বলে, ভেঙে পড়ার গল্প বলে, আবার উঠে দাঁড়ানোর গল্প বলে। রোর ইতিহাসের গল্প শোনায়, বর্তমানের বিশ্লেষণ করে, ভবিষ্যতের স্বপ্ন দেখায়। রোর বাংলা এবার পাঠকদের জন্য গল্প শুনতে চায়, পাঠকদের গল্প শুনতে চায়। লিখুন মন খুলে, আপনার গল্প পৌঁছে যাক দুই বাংলার পাঠকসমাজের কাছে! ')}}</p>
            </div>
            
        </div>
        
    </div>
</section>

<section class="why_write overflow-hidden mt-5 pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>{{__('কেন আপনি রোর বাংলায় লিখবেন?')}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="knowledge1">
                    <span><i class="fas fa-assistive-listening-systems"></i></span>
                    <h2>জ্ঞানের রাজ্যে ভ্রমণ</h2>
                    <p>আপনি লিখবেন, কেননা আপনি লিখতে ভালোবাসেন। আপনি লিখবেন, কেননা সৃষ্টিশীলতা আপনার মননকে উজ্জীবিত রাখে, আপনাকে মানসিকভাবে উদ্বুদ্ধ করে। প্রচুর পড়ুন, নতুন কিছু তুলে ধরুন পাঠকদের কাছে, কিংবা নতুন কোনো আইডিয়া দিয়ে বদলে দিন পাঠকের মনস্তত্ত্ব। কীবোর্ডে ঝড় তুলুন, লাখো পাঠকের কাছে পৌঁছে দিন আপনার যত লেখা।</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="keyboard">
                    <span><i class="far fa-keyboard"></i></span>
                    <h2>ঝড় উঠুক কীবোর্ডে</h2>
                    <p>আপনি লিখবেন, কেননা আপনি লিখতে ভালোবাসেন। আপনি লিখবেন, কেননা সৃষ্টিশীলতা আপনার মননকে উজ্জীবিত রাখে, আপনাকে মানসিকভাবে উদ্বুদ্ধ করে। প্রচুর পড়ুন, নতুন কিছু তুলে ধরুন পাঠকদের কাছে, কিংবা নতুন কোনো আইডিয়া দিয়ে বদলে দিন পাঠকের মনস্তত্ত্ব। কীবোর্ডে ঝড় তুলুন, লাখো পাঠকের কাছে পৌঁছে দিন আপনার যত লেখা।</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="achievement">
                    <span><i class="fas fa-birthday-cake"></i></span>
                    <h2>স্বীকৃতি অর্জন</h2>
                    <p>আপনি লিখবেন, কেননা আপনি প্রমাণ করতে চান যে আপনিই সেরা। আপনি চান যথাযথ সম্মান, আপনি চান স্বীকৃতি।

                        রোর আপনার মনের কথা বুঝতে পারে। আর তাই আপনার স্বীকৃতি আমাদের জন্যও বিশাল এক অর্জন। উত্তরোত্তর নিজেকে ছাড়িয়ে যাওয়ার জন্য একসাথে পথচলা যেমন চলবে, চলবে নিজেই নিজেকে চ্যালেঞ্জ ছুঁড়ে দেওয়ার কাজটাও। আপনি নিজেকে দিনে দিনে শাণিত করে তুলবেন, আর রোর বাংলার আয়োজিত জমজমাট সব ক্যাম্পেইনে অংশগ্রহণ করে নিজের মুকুটে যোগ করবেন একের পর এক পালক। </p>
                </div>
                
            </div>
            <div class="col-sm-6">
                <div class="iconic_person">
                    <span><i class="fab fa-battle-net"></i></span>
                    <h2>স্বীকৃতি অর্জন</h2>
                    <p>আপনি লিখবেন, কেননা আপনি প্রমাণ করতে চান যে আপনিই সেরা। আপনি চান যথাযথ সম্মান, আপনি চান স্বীকৃতি।

                        রোর আপনার মনের কথা বুঝতে পারে। আর তাই আপনার স্বীকৃতি আমাদের জন্যও বিশাল এক অর্জন। উত্তরোত্তর নিজেকে ছাড়িয়ে যাওয়ার জন্য একসাথে পথচলা যেমন চলবে, চলবে নিজেই নিজেকে চ্যালেঞ্জ ছুঁড়ে দেওয়ার কাজটাও। আপনি নিজেকে দিনে দিনে শাণিত করে তুলবেন, আর রোর বাংলার আয়োজিত জমজমাট সব ক্যাম্পেইনে অংশগ্রহণ করে নিজের মুকুটে যোগ করবেন একের পর এক পালক। </p>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="iconic_person">
                    <span><i class="fas fa-atom"></i></span>
                    <h2>সুবিশাল পাঠক কমিউনিটি</h2>
                    <p>আপনি লিখবেন, কেননা পাঠকেরা আপনার লেখা পড়বে, আপনার লেখনীর প্রশংসা করবে, আপনার লেখার সঙ্গে প্রাসঙ্গিক আলোচনা-সমালোচনা করবে। সব থেকে বড় কথা, আপনার লেখার জন্যই অপেক্ষা করবে দুই বাংলার অজস্র গুণমুগ্ধ পাঠক। বাংলা ভাষায় অন্যতম সমৃদ্ধশালী এক জ্ঞানের রাজ্যে আপনিও হতে পারেন গর্বিত একজন অংশীদার। </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="iconic_person">
                    <span><i class="fas fa-atom"></i></span>
                    <h2>সুবিশাল পাঠক কমিউনিটি</h2>
                    <p>আপনি লিখবেন, কেননা পাঠকেরা আপনার লেখা পড়বে, আপনার লেখনীর প্রশংসা করবে, আপনার লেখার সঙ্গে প্রাসঙ্গিক আলোচনা-সমালোচনা করবে। সব থেকে বড় কথা, আপনার লেখার জন্যই অপেক্ষা করবে দুই বাংলার অজস্র গুণমুগ্ধ পাঠক। বাংলা ভাষায় অন্যতম সমৃদ্ধশালী এক জ্ঞানের রাজ্যে আপনিও হতে পারেন গর্বিত একজন অংশীদার। </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq_sec overflow-hidden mt-5 mb-5 pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center mb-3">
                <h2><span class="pe-2"><i class="fas fa-question-circle"></i></span>{{__('যে প্রশ্নগুলো আসতে পারে আপনার মনে')}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 text-sm-start text-md-end">
                <img src="{{asset('frontend/assets/images/pages/faq-min.jpg')}}" alt="" class="img-fluid">
            </div>
            <div class="col-sm-7">
                <div class="card">
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
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="knowledge1 mt-5">
                    <span><i class="fas fa-assistive-listening-systems"></i></span>
                    <h2>রোর বাংলায় লেখা জমা দিতে আপনি প্রস্তুত?</h2>
                    <p>আপনারও আছে সবাইকে বলার মতো একটি অসাধারণ গল্প। দক্ষিণ এশিয়ার সর্ববৃহৎ কন্টেন্ট প্লাটফর্মের মাধ্যমে সেই গল্পটি ছড়িয়ে দিন সকলের মাঝে।</p>
                </div>
                <div class="contribute_btn mt-2">
                    <a href="{{route('login')}}" class="btn btn-lg btn-light">{{__('কন্ট্রিবিউট করুন')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection