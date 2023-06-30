@extends('frontend.index')
@section('front')
<div class="site-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="heading-39101 mb-5">
              <span class="backdrop">US</span>
              <span class="subtitle-39191">About</span>
              <h3>Go Vacation</h3>
            </div>
            <p>With us, have a worry-free vacation! We are a travel website that offers fantastic trip suggestions. Explore intriguing locations all throughout Indonesia and treat yourself to memorable experiences. 
              The helpful staff is prepared to help you choose your location. Your trip will be extraordinary if you go with us!</p>
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="{{asset('frontend/images/logoabs.svg')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section">

      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-10">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center">Our Team</span>
              <span class="subtitle-39191">Amazing Staff</span>
              <h3>Meet Our Team saya</h3>
            </div>
          </div>
        </div>


        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="person-29191 text-center">
              <img src="{{asset('frontend/images/team/denis.jpg')}}" alt="Image" class="img-fluid mb-4">
              <div class="px-4">
                <h2 class="mb-2">Deni Saputra</h2>
                <p class="caption mb-4">Backend Developer and Database Designer</p>
                <p>“Ruby is rubbish! PHP is phpantastic!” – Nikita Popov</p>
                <div class="social_29128 mt-5">
               </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="person-29191 text-center">
              <img src="{{asset('frontend/images/team/hafis.jpg')}}" alt="Image" class="img-fluid mb-4">
              <div class="px-4">
                <h2 class="mb-2">Hafiz Herla Firmansyah</h2>
                <p class="caption mb-4">Backend Developer and Designer Database</p>
                <p>“Make it work, make it right, make it fast.” – Kent Beck</p>
                <div class="social_29128 mt-5">
               </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="person-29191 text-center">
              <img src="{{asset('frontend/images/team/naya.jpg')}}" alt="Image" class="img-fluid mb-4 img-fluid custom-size">
              <div class="px-4">
                <h2 class="mb-2">Denaya Prama Sidya</h2>
                <p class="caption mb-4">Frontend and UI/UX Designer</p>
                <p>“Website without visitors is like a ship lost in the horizon.”― Dr. Christopher Dayagdag</p>
                <div class="social_29128 mt-5">
               </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="person-29191 text-center">
              <img src="{{asset('frontend/images/team/daniel.jpg')}}" alt="Image" class="img-fluid mb-4">
              <div class="px-4">
                <h2 class="mb-2">Daniel Adi Saputra</h2>
                <p class="caption mb-4">Database Designer</p>
                <p>“Measuring programming progress by lines of code is like measuring aircraft building progress by weight.”-Bill Gates</p>
                <div class="social_29128 mt-5">
               </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="person-29191 text-center">
              <img src="{{asset('frontend/images/team/arya.jpg')}}" alt="Image" class="img-fluid mb-4 img-fluid custom-size">
              <div class="px-4">
                <h2 class="mb-2">Arya Maulana Hidayatullah</h2>
                <p class="caption mb-4">Project Manager</p>
                <p>“Software always remains softly for End users! But sometimes hardly to developers!”-Mohamed Saad</p>
                <div class="social_29128 mt-5">
               </div>
              </div>
            </div>
          </div>


        </div>

      </div>
    </div>


    <div class="site-section bg-image overlay" style="background-image: url('frontend/images/bg/img2.png')">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-bold text-white">Join and Trip With Us</h2>
            <p class="text-white">A website called GoVacation is dedicated to suggesting tourism destinations. Please help us so that we can recommend additional tourist destinations.</p>
            <p class="mb-0"><a href="#" class="btn btn-primary text-white py-3 px-4">Get In Touch</a></p>
          </div>
        </div>
      </div>
    </div>

@endsection