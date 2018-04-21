@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Eventos de {{$dog->name}} </a>
            <a class="btn btn-small btn-info" href="{{ URL::to('eventHistory/history_entries/'. $dog->id .'/create') }}"><i class="ti-plus"></i></a>
        </div>
    </div>
@stop
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Evento</td>
            <td>Tipo de evento</td>
            <td>Fecha de evento</td>
        </tr>
        </thead>
        <tbody>
        @foreach($entries as $key => $value)
            <tr>
                <td>{{ $events[$value->event_id] }}</td>
                <td>{{ $types[$eventTypes[$value->event_id]]}}</td>
                <td>{{ date('d-m-Y', strtotime($eventDates[$value->event_id])) }}</td>
                <td>
                    {{ Form::open(array('url' => 'event_histories/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <a class="btn btn-small btn-success" href="{{ URL::to('eventHistory/entry_detail/' . $value->id) }}"><i class="ti-eye"></i></a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('eventHistory/entry/' . $value->id . '/edit') }}"><i class="ti-pencil"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-center">
        <a class="btn btn-small btn-secondary" href="{{ URL::to('eventHistory/') }}">Regresar</a>
    </div>
@stop