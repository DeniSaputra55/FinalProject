@extends('admin.layout.appadmin')
@section('content')

<style>
  .container {
    margin-top: 50px;
  }

  .project-info-box {
    background-color: #f8f9fa;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .project-info-box h5 {
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
  }

  .project-info-box p {
    margin-bottom: 10px;
    color: #666;
  }

  .project-info-box img {
    max-width: 100%;
    height: auto;
    margin-top: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .back-button {
    margin-top: 20px;
  }
</style>

<h1 align="center">Detail Wisata</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<div class="container">
  @foreach ($wisata as $w)
  <div class="row">
    <div class="col-md-5">
      <div class="project-info-box mt-0">
        <h5>Detail Wisata</h5>
        <p><i class="fas fa-id-badge"></i> <b>ID:</b> {{$w->id}}</p>
        <p><i class="fas fa-heading"></i> <b>Nama:</b> {{$w->nama}}</p>
        <p><i class="fas fa-info-circle"></i> <b>Deskripsi:</b> {{$w->deksripsi}}</p>
        <p><i class="fas fa-map-marker-alt"></i> <b>Kota:</b> {{$w->kota}}</p>
        <p><i class="fas fa-map-marker-alt"></i> <b>Alamat:</b> {{$w->alamat}}</p>
      </div>
      <input type="hidden" value="{{$w->id}}" />
    </div>
    <div class="col-md-7">
      @empty($w->foto)
      <img src="{{url('admin/image/nofoto.png')}}" alt="project-image" class="rounded">
 @else
<img src="{{url('admin/image')}}/{{$w->foto}}" alt="project-image" class="rounded">
      @endempty
      <div class="project-info-box back-button">
        <a href="{{url('admin/wisata')}}">
          <button class="btn btn-primary btn-lg"><i class="fas fa-arrow-left"></i> Back</button>
        </a>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>
@endforeach

@endsection
