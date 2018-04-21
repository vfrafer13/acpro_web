@extends('layouts.sidebar')
@section('navheader')
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Lista de Perros</a>
            <a class="btn btn-small btn-info" href="{{ URL::to('dogs/create') }}"><i class="ti-plus"></i></a>
        </div>
    </div>
@stop
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Nombre</td>
            <td>Raza</td>
            <td>Edad</td>
            <td>Sexo</td>
        </tr>
        </thead>
        <tbody>
        @foreach($dogs as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->breed }}</td>
                <td>{{ $value->age }}
                    @if ($value->age==1)
                        año
                    @else
                        años
                    @endif
                </td>
                <td>
                    @if ($value->gender==0)
                        Macho
                    @else
                        Hembra
                    @endif
                </td>
                <td>
                    {{ Form::open(array('url' => 'dogs/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <a class="btn btn-small btn-success" href="{{ URL::to('dogs/' . $value->id) }}"><i class="ti-eye"></i></a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('dogs/' . $value->id . '/edit') }}"><i class="ti-pencil"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop