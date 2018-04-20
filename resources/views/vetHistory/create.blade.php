@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Nueva entrada para {{$dog->name}}</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            {{ Form::open(array('url' => 'vetHistory')) }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::hidden('dog_id', $dog->id)}}
                        {{ Form::label('clinic', 'Hospital Veterinario') }}
                        {{ Form::text('clinic', Input::old('clinic'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('type', 'Tipo de atención') }}
                        {{ Form::select('type', $types, Input::old('type'), ['class' => 'form-control border-input', 'required'=>'required']) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('date', 'Fecha') }}
                        {{ Form::date('date', Input::old('date'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        {{ Form::label('description', 'Notas') }}
                        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="text-center">
                {{ Form::submit('Guardar entrada', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ URL::to('vetHistory/history_entries/' . $dog->id) }}">Cancelar</a>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop