@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Nueva entrada de evento</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            {{ Form::open(array('url' => 'eventHistory')) }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::hidden('dog_id', $dog->id)}}
                        {{ Form::label('event_id', 'Evento') }}
                        {{ Form::select('event_id', $events, Input::old('event_id'), ['class' => 'form-control border-input']) }}
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
                <a class="btn btn-small btn-secondary" href="{{ URL::to('eventHistory/history_entries/' . $dog->id) }}">Cancelar</a>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop