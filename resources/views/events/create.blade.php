@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Nuevo Evento</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            {{ Form::open(array('url' => 'events')) }}
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name', Input::old('name'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('type', 'Tipo de Evento') }}
                        {{ Form::select('type', $types, Input::old('type'), ['class' => 'form-control border-input', 'required'=>'required']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('date', 'Fecha') }}
                        {{ Form::date('date', Input::old('date'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('time', 'Hora') }}
                        {{ Form::time('time', Input::old('time'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        {{ Form::label('address', 'Dirección') }}
                        {{ Form::text('address', Input::old('address'), array('class' => 'form-control border-input', 'required'=>'required')) }}
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
                                {!! Form::checkbox("dogs[]", $value->id) !!}
                            </div>
                        </td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->owner }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ Form::submit('Guardar evento', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ URL::to('events/') }}">Cancelar</a>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop