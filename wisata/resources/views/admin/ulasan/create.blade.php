@extends('admin.layout.appadmin')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  .form-group {
    margin-bottom: 20px;
  }

  .form-label {
    text-align: right;
  }

  .form-control {
    border-radius: 0;
  }

  .btn-primary {
    border-radius: 0;
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
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3 align="center">Tambah Data Ulasan</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="{{url('admin/ulasan/store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group row">
              <div class="form-group row">
                <label for="select" class="col-4 col-form-label">Nama Pengunjung</label>
                <div class="col-8">
                  <select id="select" name="pengunjung_id" class="custom-select">
                    @foreach($pengunjung as $p)
                    <option value="{{$p->id}}">{{$p->nama}}</option>
                    @endforeach

                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="select1" class="col-4 col-form-label">Tempat Wisata</label>
                <div class="col-8">
                  <select id="select1" name="wisata_id" class="custom-select">
                    @foreach($wisata as $w)
                    <option value="{{$w->id}}">{{$w->nama}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="text4" class="col-4 col-form-label">Ulasan</label>
                <div class="col-8">
                  <input id="text4" name="komentar" type="text" class="form-control @error('komentar) is-invalid @enderror">
                  @error('komentar')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              
              <div class="form-group row">
              <div class="offset-md-3 col-md-9">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection