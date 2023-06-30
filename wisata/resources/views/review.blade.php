@extends('frontend.index')
@section('front')

<div class="container">
        <h4 class="text-uppercase mb-6">Ulasan</h4>
        <p class="mb-6">Ulasan dari masyarakat tentang GoVocation. Berikan ulasan sekarang!</p>
        <div class="my-4" id="review">
        <form method="POST" action="{{url('review/store')}}" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="text" name="nama" type="text" class="form-control" placeholder="Masukkan nama mu">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Wisata</label> 
    <div class="col-8">
      <input id="text1" name="wisata" type="text" class="form-control" placeholder="Masukkan nama wisata">
    </div>
  </div>
  <div class="form-group row">
    <label for="textarea" class="col-4 col-form-label">Ulasan</label> 
    <div class="col-8">
      <textarea id="textarea" name="komentar" cols="40" rows="5" class="form-control" placeholder="Masukkan ulasan mu"></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
        </div>
    </div>
    </div> <!-- END .site-section -->
    </div>
@endsection