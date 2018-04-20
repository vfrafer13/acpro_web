@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Editar Perro</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="content">
            {{ Form::model($dog , array('route' => array('dogs.update', $dog->id), 'method' => 'PUT')) }}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name', Input::old('name'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('owner', 'Dueño') }}
                        {{ Form::text('owner', Input::old('owner'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('breed', 'Raza') }}
                        {{ Form::text('breed', Input::old('breed'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('age', 'Edad (en años)') }}
                        {{ Form::text('age', Input::old('age'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('weight', 'Peso (en kg)') }}
                        {{ Form::text('weight', Input::old('weight'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::label('gender', 'Sexo') }}
                        {{ Form::select('gender', array('0' => 'Macho', '1' => 'Hembra'), Input::old('gender'), array('class' => 'form-control border-input', 'required'=>'required')) }}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        {{ Form::label('physicalDescription', 'Descripción Física') }}
                        {{ Form::text('physicalDescription', Input::old('physicalDescription'), array('class' => 'form-control border-input', 'required'=>'required')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        {{ Form::label('abilities', 'Habilidades')}}
                    </div>
                </div>
            </div>
            @foreach($abilities as $id => $ability)
                @if ($id%3==0)
                    <div class="row">
                @endif
                <div class="col-md-3">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("abilities[]", $id, in_array($id, $items)) !!} {{$ability}}
                        </label>
                    </div>
                </div>
                @if ($id%3==0)
                    </div>
                @endif
            @endforeach
            <div class="center">
                {{ Form::submit('Guardar cambios', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-small btn-secondary" href="{{ URL::to('dogs/') }}">Cancelar</a>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop