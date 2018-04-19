@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{ $event->name }}</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            <table class="table table-striped table-bordered">
                <tbody>
                <tr>
                    <td><b>Fecha</b></td>
                    <td>{{date('d-m-Y', strtotime($event->date))}}</td>
                </tr>
                <tr>
                    <td><b>Hora</b></td>
                    <td>{{date('H-i-s', strtotime($event->date))}}</td>
                </tr>
                <tr>
                    <td><b>Tipo</b></td>
                    <td>{{$type_name}}</td>
                </tr>
                <tr>
                    <td><b>Dirección</b></td>
                    <td>{{$event->address}}</td>
                </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Participantes</label>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <td><b>Nombre</b></td>
                    <td><b>Dueño</b></td>
                </tr>
                </thead>
                <tbody>
                @foreach($dogs as $key => $value)
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->owner}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <a class="btn btn-small btn-info" href="{{ URL::to('events/' . $event->id . '/edit') }}">Editar</a>
                <a class="btn btn-small btn-secondary" href="{{ URL::to('events/') }}">Regresar</a>
            </div>
        </div>
    </div>
@stop
