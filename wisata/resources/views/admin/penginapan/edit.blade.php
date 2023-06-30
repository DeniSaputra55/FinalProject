@extends('admin.layout.appadmin')
@section('content')

<style>
  .container {
    margin-top: 50px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  img {
    max-width: 100%;
    height: auto;
    margin-top: 10px;
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
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Update penginapan</div>
        <div class="card-body">
          @foreach($penginapan as $w)
          <form method="POST" action="{{url('admin/penginapan/update/')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$w->id}}">
            <div class="form-group row">
              <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>
              <div class="col-md-8">
                <input id="nama" name="nama" type="text" class="form-control" value="{{$w->nama}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="deksripsi" class="col-md-4 col-form-label text-md-right">Fasilitas</label>
              <div class="col-md-8">
                <input id="fasilitas" name="fasilitas" type="text" class="form-control" value="{{$w->fasilitas}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="kota" class="col-md-4 col-form-label text-md-right">Harga</label>
              <div class="col-md-8">
                <input id="harga" name="harga" type="number" class="form-control" value="{{$w->harga}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="kota" class="col-md-4 col-form-label text-md-right">Kelas</label>
              <div class="col-md-8">
                <input id="kelas" name="kelas" type="text" class="form-control" value="{{$w->kelas}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
              <div class="col-md-8">
                <input id="alamat" name="alamat" type="text" class="form-control" value="{{$w->alamat}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>
              <div class="col-md-8">
                <input id="foto" name="foto" type="file" class="form-control">
                <div>
                  @empty($w->foto)
                  <img src="{{url('admin/image/nofoto.png')}}">
                  @else
                  <img src="{{url('admin/image')}}/{{$w->foto}}">
                  @endempty
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-8 offset-md-4">
                <button name="submit" type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection