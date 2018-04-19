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
            {{ Html::image('img/main.jpg', '', array('class' => 'img-circle')) }}
        </div>
    </div>
@stop

