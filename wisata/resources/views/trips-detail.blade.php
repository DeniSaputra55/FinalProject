@extends('frontend.index')
@section('front')
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

.container-cuaca{
    overflow: hidden;
    z-index: 10;
    position: relative;
    height: 90px;
    width: 300px;
    border-radius: 10px;
    box-shadow: 2px 2px 1px rgba(0,0,0,0.2);
}

.morning {
    background-image: url('https://cdn.weatherapi.com/weather-widget/img/weatherapi-backgrounds/4_widget4.png');
}

.afternoon {
    background-image: url('https://cdn.weatherapi.com/weather-widget/img/weatherapi-backgrounds/4_widget1.png');
}

.evening {
    background-image: url('https://cdn.weatherapi.com/weather-widget/img/weatherapi-backgrounds/4_widget3.png');
}

/*  BACKGROUND  */

.Circle1{
    z-index: 100;
    position: absolute;
    height: 80px;
    width: 80px;
    right: -20px;
    top: -30px;
    border-radius: 50%;
    background-color: rgb(199, 190, 169);
    animation: enlarge;
    animation-duration: 5s;
    animation-iteration-count: infinite;
}

.Circle2{
    z-index: 80;
    position: absolute;
    height: 150px;
    width: 150px;
    right: -50px;
    top: -70px;
    border-radius: 50%;
    background-color: rgba(202, 200, 198, 0.7);
    
    animation: enlarge;
    animation-duration: 7s;
    animation-iteration-count: infinite;
}

.Circle3{
    z-index: 50;
    position: absolute;
    height: 200px;
    width: 200px;
    right: -50px;
    top: -100px;
    border-radius: 50%;
    background-color: rgba(95, 94, 94, 0.7);
    
    animation: enlarge;
    animation-duration: 10s;
    animation-iteration-count: infinite;
}



/*  CONTENT  */

.sun{
    z-index: 1000;
    font-size: 15px !important;
}

.Condition{
    z-index: 1000;
    position: absolute;
    font-family: "Roboto", sans-serif;
    font-weight: 100;
    font-size: 20px;
    left: 20px;  
    top: 10px;
    color: white;
}

.Temp{
    z-index: 1000;
    position: absolute;
    font-family: "Roboto", sans-serif;
    font-size: 35px;
    font-weight: 400;
    left: 20px;
    bottom: 5px;
    color: white;
}

#F{
    z-index: 1000;
    font-family: "Roboto",sans-serif;
    font-weight: 100;
    font-size: 30px;
    color: white;
}


.Time{
    z-index: 1000;
    position: absolute;
    font-family: "Noto Sans", sans-serif;
    font-size: 18px;
    font-weight: 200;
    right: 20px;
    top: 10px;
    color: white;
}

.locationIcon{
    z-index: 1000;
    font-size: 10px !important;
    color: white;
}

.Location{
    z-index: 1000;
    position: absolute;
    font-family: "Noto Sans", sans-serif;
    font-size: 12px;
    font-weight: 200;
    right: 20px;
    bottom: 15px;
    color: white;
}

@keyframes enlarge{
    50%{
        transform: scale(1.2);
    }
}
</style>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $trips->nama }}</h2>
                <p>{{ $trips->deksripsi }}</p>
                <p>
                    <i class="material-icons locationIcon" style="color: #000000;">place</i> {{ $trips->alamat }}
                </p>
                <div class="container-cuaca">
                    <div id="hasil_cuaca"></div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('admin/image/'.$trips->foto) }}" alt="{{$trips->foto}}" class="img-thumbnail" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            </div>
        </div>
    </div>
</div>

<script>
    const cekCuaca = async() => {
        const url = 'http://api.weatherapi.com/v1/current.json?key=ca34b190634a4ca1a0c140031232106&q={{ $trips->kota }}&aqi=no';

        try {
            const cuaca = document.getElementById('hasil_cuaca');
            const response = await fetch(url)
            .then(response => response.json())
            .then(response => {
                const time = response.location.localtime;
                if (time >= '06:00' && time < '12:00') {
                    $('.container-cuaca').addClass('morning');
                } else if (time >= '12:00' && time < '18:00') {
                    $('.container-cuaca').addClass('afternoon');
                } else {
                    $('.container-cuaca').addClass('evening');
                }
                cuaca.innerHTML = `
                <div class="background">
                    <div class="Circle1"></div>
                    <div class="Circle2"></div>
                    <div class="Circle3"></div>
                    <div class="content">
                        <h1 class="Condition"><img src="${response.current.condition.icon}" width="20"> ${response.current.condition.text}</h1>
                        <h1 class="Temp">${response.current.temp_c}<span id="F">&#8451;</span></h1>
                        <h1 class="Time">${time.substring(11, 16)}</h1>
                        <h1 class="Location"><i class="material-icons locationIcon">place</i> ${response.location.name}</h1>
                    </div>
                </div>
                `;
            });      
        } catch (error) {
            console.error(error);
        }
    }

    cekCuaca();
</script>
@endsection