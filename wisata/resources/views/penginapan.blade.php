@extends('frontend.index')
@section('front')

<style>
  .site-section {
    padding: 50px 0;
  }

  .heading-39101 {
    position: relative;
    margin-bottom: 50px;
  }

  .heading-39101 .backdrop {
    display: inline-block;
    font-size: 40px;
    font-weight: bold;
    color: #fff;
    background-color: #000;
    padding: 10px 20px;
  }

  .heading-39101 .subtitle-39191 {
    display: block;
    font-size: 24px;
    font-weight: bold;
    color: #000;
    margin-top: 20px;
  }

  .listing-item {
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
    transition: transform 0.3s ease;
  }

  .listing-item:hover {
    transform: translateY(-5px);
  }

  .listing-image-container {
    height: 400px;
    width: 100%;
  }

  .listing-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .listing-item-content {
    padding: 20px;
    text-align: center;
  }

  .listing-title {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }

  .listing-details {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .rating {
    display: inline-block;
    font-size: 24px;
    color: #ffd700;
  }

  .rating::before {
    content: "★★★★★";
    letter-spacing: 1px;
  }

  .rating .stars::before {
    content: "★★★★★";
    position: absolute;
    top: 0;
    left: 0;
    white-space: nowrap;
    overflow: hidden;
    width: 0;
  }
</style>

<div class="site-section">
  <div class="container">
    <div class="row justify-content-center text-center">
      <!-- <div class="col-md-7">
        <div class="heading-39101 mb-5">
          <span class="backdrop text-center">VACATION</span>
        </div>
        <span class="subtitle-39191">Your Amazing Places are Here</span>
      </div> -->
    </div>
    <div class="row">
      @forelse($penginapan as $row)
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
        <div class="listing-item">
          <div class="listing-image-container">
            <img src="{{ asset('admin/image/'.$row['foto']) }}" alt="Image" class="img-fluid">
          </div>
          <div class="listing-item-content">
            <h2 class="listing-title"><a href="{{ url('penginapan/'.$row->id) }}">{{ $row->nama }}</a></h2>
            <a href="{{ url('penginapan/'.$row->id) }}" class="btn btn-primary">see details</a>
          </div>
        </div>
        <div class="listing-details">
          <div class="rating">
            <div class="stars"></div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <div class="text-center">
          <h3>Data tidak tersedia</h3>
        </div>
      </div>
      @endforelse
    </div>
  </div>
</div>

<script>
  // Add fake star ratings
  const ratings = document.querySelectorAll('.rating');

  ratings.forEach(rating => {
    const stars = rating.querySelector('.stars');
    const ratingValue = Math.floor(Math.random() * 5) + 1; // Generate random rating between 1 and 5

    stars.style.width = (ratingValue / 5) * 100 + '%';
  });
</script>

@endsection
