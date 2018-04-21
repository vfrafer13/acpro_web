@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Nueva Cita</a>
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
            {{ Form::open(array('url' => 'appointments')) }}
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::hidden('query_type', 'null')}}
                        {{ Form::label('dog_id', 'Perro') }}
                        {{ Form::select('dog_id', $dogs, Input::old('dog_id'), ['class' => 'form-control border-input', 'required'=>'required']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('date', 'Fecha') }}
                        {{ Form::date('date', Input::old('date'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('time', 'Hora de Inicio') }}
                        {{ Form::time('time', Input::old('time'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('time_end', 'Hora de Fin') }}
                        {{ Form::time('time_end', Input::old('time_end'), array('class' => 'form-control border-input', 'required'=>'required')) }}
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
                {{ Form::submit('Guardar cita', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ URL::to('appointments/') }}">Cancelar</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop
