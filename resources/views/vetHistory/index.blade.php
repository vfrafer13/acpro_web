@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Historial Veterinario</a>
         </div>
    </div>
@stop
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Nombre</td>
            <td>Dueño</td>
            <td># de Visitas</td>
        </tr>
        </thead>
        <tbody>
        @foreach($dogs as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->owner }}</td>
                <td>{{ $value->vetHistoryEntries->count() }}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('vetHistory/history_entries/' . $value->id) }}"><i class="ti-eye"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop