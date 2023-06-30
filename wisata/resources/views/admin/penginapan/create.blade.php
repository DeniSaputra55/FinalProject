@extends('admin.layout.appadmin')

@section('content')

<br>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .form-group {
    margin-bottom: 20px;
  }
  
  .col-form-label {
    font-weight: bold;
  }
  
  .form-control {
    border-radius: 0;
  }
  
  .btn-primary {
    border-radius: 0;
  }
  
  h1 {
    margin-bottom: 20px;
  }
  
  form {
    max-width: 500px;
    margin: 0 auto;
    border: 1px solid #ccc;
    padding: 20px;
  }
  
  .fa {
    margin-right: 5px;
  }
</style>
<!-- menampilkan pesan error -->
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<!--  -->
<h1 align="center">Form Tambah penginapan</h1>
<form method="POST" action="{{url('admin/penginapan/store')}}" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label"><i class="fa fa-user"></i> Nama</label>
    <div class="col-8">
      <input id="text1" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama">
      @error('nama')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label"><i class="fa fa-info-circle"></i> Fasilitas</label>
    <div class="col-8">
      <input id="text2" name="fasilitas" type="text" class="form-control @error('fasilitas') is-invalid @enderror" placeholder="Masukkan fasilitas">
      @error('fasilitas')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label"><i class="fa fa-map-marker"></i> Alamat</label>
    <div class="col-8">
      <input id="text3" name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat">
      @error('alamat')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
    </div>
  </div>
  <div class="form-group row">
  <label for="text3" class="col-4 col-form-label"><i class="fa fa-usd"></i> Harga</label>

    <div class="col-8">
      <input id="text3" name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan harga">
      @error('harga')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
  <label for="text3" class="col-4 col-form-label"><i class="fas fa-hotel"></i> Kelas</label>

    <div class="col-8">
      <input id="text3" name="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" placeholder="Masukkan kelas">
      @error('kelas')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label"><i class="fa fa-file-image"></i> Foto</label>
    <div class="col-8">
      <input id="text4" name="foto" type="file" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
    </div>
  </div>
</form>

@endsection
