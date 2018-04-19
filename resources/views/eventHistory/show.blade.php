@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{ $dog->name . ' - ' . $event->name}}</a>
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
                    <td>{{$eventType->name}}</td>
                </tr>
                <tr>
                    <td><b>Notas</b></td>
                    <td>{{$eventHistory->notes}}</td>
                </tr>
                </tbody>
            </table>
            <div class="text-center">
                <a class="btn btn-small btn-info" href="{{ URL::to('eventHistory/entry/' . $eventHistory->id . '/edit') }}">Editar</a>
                <a class="btn btn-small btn-secondary" href="{{ URL::to('eventHistory/history_entries/' . $eventHistory->dog_id) }}">Regresar</a>
            </div>
        </div>
    </div>
@stop

