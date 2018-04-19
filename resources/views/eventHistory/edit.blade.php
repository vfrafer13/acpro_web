@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Editar- {{$dog->name}} #{{$event->id}}</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            {{ Form::model($eventHistory , array('route' => array('eventHistory.update', $eventHistory->id), 'method' => 'PUT')) }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::hidden('dog_id', $eventHistory->dog_id)}}
                        {{ Form::hidden('event_id', $eventHistory->event_id)}}
                        {{ Form::label('event', 'Evento') }}
                        {{ Form::text('event', $event->full_name, array('class' => 'form-control border-input', 'readonly')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        {{ Form::label('notes', 'Notas') }}
                        {{ Form::textarea('notes', Input::old('notes'), array('class' => 'form-control border-input')) }}
                    </div>
                </div>
            </div>
            <div class="text-center">
                {{ Form::submit('Guardar entrada', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ URL::to('eventHistory/history_entries/' . $eventHistory->dog_id) }}">Cancelar</a>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop