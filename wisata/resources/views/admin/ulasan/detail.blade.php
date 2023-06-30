@extends('admin.layout.appadmin')
@section('content')

<style>
  .container {
    margin-top: 50px;
  }

  .project-info-box {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
    width: 80%;
    max-width: 500px;
    background-color: #f8f9fa;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .project-info-box p {
    margin-bottom: 10px;
  }

  .project-info-box b {
    font-weight: bold;
  }

  h1 {
    margin-bottom: 30px;
  }
</style>

<div class="container">
  <h1 class="text-center">Details</h1>
  <div class="row justify-content-center">
    @foreach ($ulasan as $u)
    <div class="col-md-6">
      <div class="project-info-box">
        <p><i class="fas fa-user"></i> <b>Pengunjung:</b> {{$u->pengunjung}}</p>
        <p><i class="fas fa-user-check"></i> <b>Wisata:</b> {{$u->wisata}}</p>
        <p><i class="fas fa-comment"></i> <b>Ulasan:</b> {{$u->komentar}}</p>
       
      </div>
    </div>
    @endforeach
  </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>
@endsection