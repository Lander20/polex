@extends('layouts.dashboard')
@section('page_heading','Proyecto')
@section('section')

    <h3>Crear un nuevo Proyecto</h3>
    <br>

    {!! Form::model($proyecto, ['method' => 'PATCH', 'route' => ['proyecto.update', $proyecto->id]]) !!}

    @include('proyecto.form')

    {!! Form::submit('Guardar', ['class' => 'btn btn-primary col-xs-offset-4 col-xs-4',"style"=>"margin-bottom:1%"]) !!}

    {!! Form::close() !!}
@stop