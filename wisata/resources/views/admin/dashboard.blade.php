@extends('admin.layout.appadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Data Pengguna :
                        {{ $totalUsers }}
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('admin/user')}}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Data Pengunjung  :
                            
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Data Wisata :
                        {{ $totalWisata }}
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('admin/wisata')}}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Data Review :
                        {{ $totalUlasan }}
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('admin/reviewwisata')}}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Data Rating :
                            
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('admin/rating')}}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">

                        <!-- paste pie -->
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Diagram Tempat Wisata
                        </div>
                        <div class="card-body"><canvas id="pieChart" width="100%" height="50"></canvas></div>
                        <!-- <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div> -->
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Diagram Pengguna
                        </div>
                        <div class="card-body"><canvas id="pieChart1" width="100%" height="50"></canvas></div>
                    </div>
                </div>
            </div>

            <script>
// Set new default font family and font color to mimic Bootstrap's default styling


// Bar Chart Example
var lbl21 = [@foreach ($ar_user as $user) '{{$user->role}}',
@endforeach];
var jml1 = [@foreach($ar_user as $user) {{$user->jumlah}},
 @endforeach];
document.addEventListener("DOMContentLoaded", () => {
    new Chart(document.querySelector('#pieChart1'), {
  type: 'pie',
  data: {
    labels: lbl21,
    datasets: [{
      data: jml1,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
    });
});

        </script>
        <script>
//             var ctx = document.getElementById("myPieChart");
// var myPieChart = new Chart(ctx, 
var lbl2 = [@foreach ($ar_wilayah as $wilayah) '{{$wilayah->kota}}',
@endforeach];
var jml = [@foreach($ar_wilayah as $wilayah) {{$wilayah->jumlah}}, @endforeach];
document.addEventListener("DOMContentLoaded", () => {
    new Chart(document.querySelector('#pieChart'), {
  type: 'pie',
  data: {
    labels: lbl2,
    datasets: [{
      data: jml,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
    });
});


        </script>

@endsection