@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{ $appointment->dog->name . ' (' . date('d-m-Y', strtotime($appointment->date)) . ')' }}</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <td><b>Perro</b></td>
                        <td>{{$appointment->dog->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Dueño</b></td>
                        <td>{{$appointment->dog->owner}}</td>
                    </tr>
                    <tr>
                        <td><b>Fecha</b></td>
                        <td>{{date('d/m/Y', strtotime($appointment->date))}}</td>
                    </tr>
                    <tr>
                        <td><b>Hora de Inicio</b></td>
                        <td>{{date('H:i', strtotime($appointment->date))}}</td>
                    </tr>
                    <tr>
                        <td><b>Hora de Fin</b></td>
                        <td>{{date('H:i', strtotime($appointment->date_end))}}</td>
                    </tr>
                    <tr>
                        <td><b>Dirección</b></td>
                        <td>{{$appointment->address}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <a class="btn btn-small btn-info" href="{{ URL::to('appointments/' . $appointment->id . '/edit') }}">Editar</a>
                <a class="btn btn-small btn-secondary" href="{{ URL::to('appointments/') }}">Regresar</a>
            </div>
        </div>
    </div>
@stop

