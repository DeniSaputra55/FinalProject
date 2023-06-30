@extends('admin.layout.appadmin')

@section('content')
<br>

<style>
    
    /* Form Styling */
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        background-color: #f8f9fa;
        border: 2px solid #ccc;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        text-align: center;
        margin-bottom: 0px;
    }

    .form-group label {
        font-weight: bold;
    }

    /* Table Styling */
    .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }

    .table-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-container th,
    .table-container td {
        padding: 20px;
        text-align: center;
    }

    .table-container th {
        background-color: #f5f5f5;
        font-weight: bold;
    }

    .table-container tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-container tr:hover {
        background-color: #f0f0f0;
    }
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@foreach($ulasan as $u)
<div class="form-container">
    <div class="container">
        <h1 class="form-title">Form Edit Ulasan</h1>
        <form method="POST" action="{{url('admin/ulasan/update/')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$u->id}}">
            <div class="form-group row">
                <label for="text1" class="col-4 col-form-label">Ulasan</label>
                <div class="col-8">
                    <input id="text1" name="komentar" type="text" class="form-control" value="{{$u->komentar}}">
                </div>
            </div>
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
            
            <div class="form-group text-center">
            <button name="submit" type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
</div>

@endforeach

@endsection
