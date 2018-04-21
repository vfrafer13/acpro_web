@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Editar Cita</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            {{ Form::model($appointment , array('route' => array('appointments.update', $appointment->id), 'method' => 'PUT')) }}
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('dog_id', 'Perro') }}
                        {{ Form::select('dog_id', $dogs, Input::old('dog_id'), ['class' => 'form-control border-input', 'required'=>'required']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('date', 'Fecha') }}
                        {{ Form::date('date', $date, array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('time', 'Hora de Inicio') }}
                        {{ Form::time('time', $time, array('class' => 'form-control border-input', 'required'=>'required')) }}
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
                        {{ Form::text('address', Input::old('address'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="text-center">
                {{ Form::submit('Guardar cambios', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ URL::to('appointments/') }}">Cancelar</a>
            </div>
        {{ Form::close() }}
        </div>
    </div>
@stop