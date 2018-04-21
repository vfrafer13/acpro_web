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
                <a href="{{ URL::to('appointments/' . $appointment->id) }}">
                    <h6>
                        Próxima cita: {{date('d/m/Y', strtotime($appointment->date))}}, {{date('H:i', strtotime($appointment->date))}}
                    </h6>
                </a>
                <br/>
                <a href="{{ URL::to('events/' . $event->id) }}">
                    <h6>
                        Próximo evento: {{date('d/m/Y', strtotime($event->date))}}, {{date('H:i', strtotime($event->date))}}
                    </h6>
                </a><br/>
                <h5>Mérida, Yucatán, México</h5>
                {{"Estamos a " . $temp ." °C"}}
                <img src='https://openweathermap.org/img/w/{{$icon}}'/><br>
                {{"Temperatura Máxima: " . $temp_max ." °C"}}<br>
                <br>
                <div class="">
                    {{ Html::image('img/main.jpg', '', array('class' => 'img-circle img-thumbnail', 'style' => 'width:40%')) }}
                </div>
            </div>
        </div>
    </div>
@stop

