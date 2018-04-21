@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Lista de Eventos</a>
            <a class="btn btn-small btn-info" href="{{ URL::to('events/create') }}"><i class="ti-plus"></i></a>
        </div>
    </div>
@stop
@section('content')
    <table class="table table-striped table-bordered">
        <caption><h6>Eventos próximos</h6></caption>
        <thead>
        <tr>
            <td>Nombre</td>
            <td>Fecha</td>
            <td>Hora Inicio</td>
            <td>Hora Fin</td>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                <td>{{ date('H:i', strtotime($value->date)) }}</td>
                <td>{{ date('H:i', strtotime($value->date_end)) }}</td>
                <td>
                    {{ Form::open(array('url' => 'events/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <a class="btn btn-small btn-success" href="{{ URL::to('events/' . $value->id) }}"><i class="ti-eye"></i></a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('events/' . $value->id . '/edit') }}"><i class="ti-pencil"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <table class="table table-striped table-bordered">
        <caption><h6>Eventos pasados</h6></caption>
        <thead>
        <tr>
            <td>Nombre</td>
            <td>Fecha</td>
            <td>Hora Inicio</td>
            <td>Hora Fin</td>
        </tr>
        </thead>
        <tbody>
        @foreach($events_old as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                <td>{{ date('H:i', strtotime($value->date)) }}</td>
                <td>{{ date('H:i', strtotime($value->date_end)) }}</td>
                <td>
                    {{ Form::open(array('url' => 'events/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <a class="btn btn-small btn-success" href="{{ URL::to('events/' . $value->id) }}"><i class="ti-eye"></i></a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('events/' . $value->id . '/edit') }}"><i class="ti-pencil"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop