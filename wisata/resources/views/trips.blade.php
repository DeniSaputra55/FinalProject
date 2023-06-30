@extends('frontend.index')
@section('front')

<div class="site-section">

<div class="container">
  <div class="row justify-content-center text-center">
    <div class="col-md-7">
      <div class="heading-39101 mb-5">
        <span class="backdrop text-center">VACATION</span>
        <span class="subtitle-39191">Your Amazing Places are Here</span>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- <div class="col-md-4">
      <div id="weatherapi-weather-widget-1"></div><script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=3037591&wid=1&tu=2&div=weatherapi-weather-widget-1' async></script><noscript><a href="https://www.weatherapi.com/weather/q/pangandaran-3037591" alt="Hour by hour Pangandaran weather">10 day hour by hour Pangandaran weather</a></noscript>
    </div> -->
    @forelse($trips as $row)
    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
      <div class="listing-item">
        <div class="listing-image">
          <img src="{{asset('admin/image/'.$row['foto'])}}" alt="Image" class="img-fluid" style="height: 300px">
        </div>
        <div class="listing-item-content">
          <a class="px-3 mb-3 category bg-primary" href="#">Check This Out</a>
          <h2 class="mb-1"><a href="{{ url('trips/'.$row->id) }}">{{ $row->nama }}</a></h2>
        </div>
      </div>
      <br>
      <div class="listing-details">
  <div class="text-center">
    <a href="{{url('/reviewwisata')}}" class="btn btn-primary">Review</a>
  </div>
      </div>
    </div>
    @empty
    <center><h3>Data tidak tersedia</h3></center>
    @endforelse
</div>
</div>

</div>
@endsection