@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Historial de {{$dog->name}} </a>
            <a class="btn btn-small btn-info" href="{{ URL::to('vetHistory/history_entries/'. $dog->id .'/create') }}"><i class="ti-plus"></i></a>
        </div>
    </div>
@stop
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Hospital Veterinario</td>
            <td>Tipo de atención</td>
            <td>Fecha</td>
        </tr>
        </thead>
        <tbody>
        @foreach($entries as $key => $value)
            <tr>
                <td>{{ $value->clinic }}</td>
                <td>{{ $vetTypes[$value->type]->name }}</td>
                <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                <td>
                    {{ Form::open(array('url' => 'vet_histories/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <a class="btn btn-small btn-success" href="{{ URL::to('vetHistory/entry_detail/' . $value->id) }}"><i class="ti-eye"></i></a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('vetHistory/entry/' . $value->id . '/edit') }}"><i class="ti-pencil"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <a class="btn btn-small btn-secondary" href="{{ URL::to('vetHistory/') }}">Regresar</a>
    </div>
@stop