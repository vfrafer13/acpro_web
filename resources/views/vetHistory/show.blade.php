@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{$dogName}} ({{date('d-m-Y', strtotime($vetHistory->date))}})</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            <table class="table table-striped table-bordered">
                <tbody>
                <tr>
                    <td><b>Hospital Veterinario</b></td>
                    <td>{{$vetHistory->clinic}}</td>
                </tr>
                <tr>
                    <td><b>Fecha</b></td>
                    <td>{{date('d-m-Y', strtotime($vetHistory->date))}}</td>
                </tr>
                <tr>
                    <td><b>Hora</b></td>
                    <td>{{date('H-i-s', strtotime($vetHistory->date))}}</td>
                </tr>
                <tr>
                    <td><b>Tipo de atención</b></td>
                    <td>{{$vetTypes[$vetHistory->type]->name}}</td>
                </tr>
                <tr>
                    <td><b>Notas</b></td>
                    <td>{{$vetHistory->description}}</td>
                </tr>
                </tbody>
            </table>
            <div class="text-center">
                <a class="btn btn-small btn-info" href="{{ URL::to('vetHistory/entry/' . $vetHistory->id . '/edit') }}">Editar</a>
                <a class="btn btn-small btn-secondary" href="{{ URL::to('vetHistory/history_entries/' . $vetHistory->dog_id) }}">Regresar</a>
            </div>
        </div>
    </div>
@stop

