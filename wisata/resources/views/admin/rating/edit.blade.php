@extends('admin.layout.appadmin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
@foreach($rating as $r)
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3>Edit Rating</h3>
        </div>
        <div class="card-body">
          
          <form method="POST" action="{{url('admin/rating/update')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$r->id}}">
            <div class="form-group row">
              <label for="select" class="col-4 col-form-label">Pengunjung</label>
              <div class="col-8">
                <select id="select" name="pengunjung_id" class="custom-select">
                  @foreach($pengunjung as $p)
                  <option value="{{$p->id}}">{{$p->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="select1" class="col-4 col-form-label">Wisata</label>
              <div class="col-8">
                <select id="select1" name="wisata_id" class="custom-select">
                  @foreach($wisata as $w)
                  <option value="{{$w->id}}">{{$w->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="select1" class="col-4 col-form-label">Rating</label>
              <div class="col-8">
                <select name="nama" id="select1" class="custom-select" value="{{$r->nama}}">
                  <option value="Sangat Bagus">Sangat Bagus</option>
                  <option value="Bagus">Bagus</option>
                  <option value="Cukup Bagus">Cukup Bagus</option>
                  <option value="Tidak Bagus">Tidak Bagus</option>
                </select>
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
