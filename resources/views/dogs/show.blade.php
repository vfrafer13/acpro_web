@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{ $dog->name }}</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            <table class="table table-striped table-bordered">
                <tbody>
                <tr>
                    <td><b>Dueño</b></td>
                    <td>{{$dog->owner}}</td>
                </tr>
                <tr>
                    <td><b>Raza</b></td>
                    <td>{{$dog->breed}}</td>
                </tr>
                <tr>
                    <td><b>Edad</b></td>
                    <td>
                        {{$dog->age}}
                        @if ($dog->age==1)
                            año
                        @else
                            años
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><b>Peso</b></td>
                    <td>{{ $dog->weight }} Kg</td>
                </tr>
                <tr>
                    <td><b>Sexo</b></td>
                    <td>
                        @if ($dog->gender==0)
                            Macho
                        @else
                            Hembra
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><b>Descripción</b></td>
                    <td>{{ $dog->physicalDescription }}</td>
                </tr>
                </tbody>
            </table>
            <div class="text-center">
                <a class="btn btn-small btn-info" href="{{ URL::to('dogs/' . $dog->id . '/edit') }}">Editar</a>
                <a class="btn btn-small btn-secondary" href="{{ URL::to('dogs/') }}">Regresar</a>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a class="btn btn-small btn-primary" href="{{ URL::to('vetHistory/history_entries/' . $dog->id) }}">Historial Veterinario</a>
        <a class="btn btn-small btn-primary" href="{{ URL::to('eventHistory/history_entries/' . $dog->id) }}">Historial de Eventos</a>
    </div>
@stop
