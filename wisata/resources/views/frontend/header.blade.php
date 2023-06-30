<!doctype html>
<html lang="en">

  <head>
    <title>GoVacation &mdash; Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="{{url('/front')}}" class="font-weight-bold">
                    <img src="{{asset('frontend/images/logo.png')}}" alt="Image" class="img-fluid" style="width: 164px; height: 51px;">
                </a>
              </div>
            </div>

            <div class="col-9 text-right">
    <span class="d-inline-block d-lg-none">
        <a href="/" class="text-white site-menu-toggle js-menu-toggle py-5 text-white">
            <span class="icon-menu h3 text-white"></span>
        </a>
    </span>

    <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
  <ul class="site-menu main-menu js-clone-nav ml-auto">
    <li class="active"><a href="{{url('/front')}}" class="nav-link">Home</a></li>
    <li><a href="{{url('/tentang')}}" class="nav-link">Tentang</a></li>
    <li><a href="{{url('/trips')}}" class="nav-link">Wisata</a></li>
    <li><a href="{{url('/penginapan')}}" class="nav-link">Penginapan</a></li>
    <!-- <li><a href="{{url('/review')}}" class="nav-link">Ulasan</a></li> -->

    @if (Auth::check())
      <li class="nav-item">
        <span class="nav-link">Halo, {{ Auth::user()->name }}</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('pengunjung/auth/logout')}}">Logout</a>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link" href="{{url('pengunjung/auth/login')}}">Login</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{url('pengunjung/auth/register')}}">Register</a>
      </li> --}}
    @endif
  </ul>
</nav>

</div>


            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('frontend/images/bg/img1.jpg')">        
        <div class="container">
          <div class="row justify-content-center align-items-center">
            <div class="col-8" data-aos="fade-right">
                <p class="text-center font-weight-bold" style="color: #305973">Vacation Platform</p>
                <h1 class="mb-3 text-white text-center">TAKE ONLY MEMORIES, LEAVE ONLY FOOTPRINTS</h1>             
                <p class="text-center">Treat our planet with respect, especially while traveling. Things like eco-tourism, carbon offsets, and environmental footprints need more attention!</p>
              <div class="d-flex justify-content-center">
                <a class="btn btn-custom text-center" href="{{url('/trips')}}" role="button">Explore Now!</a>
              </div>                  
            </div>
          </div>
        </div>
      </div>
    </div>

    <style>
      .btn-custom {
        background-color: #EF7E56; /* Your desired background color */
        border-color: #EF7E56; /* Your desired border color */
        color: #ffffff; /* Your desired text color */
      }
    </style>
