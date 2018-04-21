@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Editar Evento</a>
        </div>
    </div>
@stop
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="content">
            {{ Form::model($event , array('route' => array('events.update', $event->id), 'method' => 'PUT')) }}
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::hidden('id', $event->id)}}
                        {{ Form::hidden('type', 'event')}}
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name', Input::old('name'), array('class' => 'form-control border-input')) }}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('type', 'Tipo de Evento') }}
                        {{ Form::select('type', $types, Input::old('type'), ['class' => 'form-control border-input']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('date', 'Fecha') }}
                        {{ Form::date('date', $date, array('class' => 'form-control border-input')) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('time', 'Hora de Inicio') }}
                        {{ Form::time('time', $time,  array('class' => 'form-control border-input')) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('time_end', 'Hora de Fin') }}
                        {{ Form::time('time_end', $time_end, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        {{ Form::label('address', 'Dirección') }}
                        {{ Form::text('address', Input::old('address'), array('class' => 'form-control border-input')) }}
                    </div>
                </div>
            </div>
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
                    <td></td>
                    <td>Nombre</td>
                    <td>Dueño</td>
                </tr>
                </thead>
                <tbody>
                @foreach($dogs as $key => $value)
                    <tr>
                        <td>
                            <div class="checkbox">
                               {!! Form::checkbox("dogs[]", $value->id, in_array($value->id, $items)) !!}
                            </div>
                        </td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->owner }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ Form::submit('Guardar cambios', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ URL::to('events/') }}">Cancelar</a>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop