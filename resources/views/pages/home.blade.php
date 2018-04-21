@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Bienvenido, Melchor Paredes</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            <div class="text-center">
                {{ Form::hidden('lat', $coordinates[0], ['id' => 'lat']) }}
                {{ Form::hidden('lng', $coordinates[1], ['id' => 'lng']) }}
                @if(count($coordinates)>=3)
                    {{ Form::hidden('zoom', $coordinates[2], ['id' => 'zoom']) }}
                @endif
                <h5>Mérida, Yucatán, México</h5>
                {{"Estamos a " . $temp ." °C"}}
                <img src='https://openweathermap.org/img/w/{{$icon}}'/><br>
                <br>
                {{ Html::image('img/main.jpg', '', array('class' => 'img-circle img-thumbnail', 'style' => 'width:25%')) }}
                <br/>
                <br/>
                <br/>
                @if(!is_null($event))
                    <a href="{{ URL::to('events/' . $event->id) }}">
                        <h6>
                            Próximo evento: {{date('d/m/Y', strtotime($event->date))}}, {{date('H:i', strtotime($event->date))}}
                        </h6>
                    </a><br>
                @endif
                @if(!is_null($appointment))
                    <a href="{{ URL::to('appointments/' . $appointment->id) }}">
                        <h6>
                            Próxima cita: {{date('d/m/Y', strtotime($appointment->date))}}, {{date('H:i', strtotime($appointment->date))}}
                        </h6>
                    </a><br>
                    <div class="card card-map">
                        <div class="map">
                            <div id="map"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function initMap() {
            var lat = document.getElementById('lat').value;
            var lng = document.getElementById('lng').value;
            var zoom;
            if (!!document.getElementById('zoom')) {
                zoom = document.getElementById('zoom').value;
            } else {
                zoom = 13;
            }
            var myLatLng = {lat: Number(lat), lng: Number(lng)};
            // Create a map object and specify the DOM element for display.
            var mapProp= {
                center:new google.maps.LatLng(Number(lat),Number(lng)),
                zoom: Number(zoom),
            };
            var map=new google.maps.Map(document.getElementById("map"),mapProp);
            var marker_appointment = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Próxima cita'
            });
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhy2C0FU9fAaJnBsAshSHdix0UMWsbERk&callback=initMap"></script>
@stop

