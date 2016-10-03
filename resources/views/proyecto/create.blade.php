@extends('layouts.dashboard')
@section('page_heading','Proyecto')
@section('section')

    <h3>Crear un nuevo Proyecto</h3>
    <br>

    {!! Form::open([ 'route' => 'proyecto.store']) !!}

    @include('proyecto.form')

    {!! Form::submit('Crear', ['class' => 'btn btn-primary col-xs-offset-4 col-xs-4',"style"=>"margin-bottom:1%"]) !!}

    {!! Form::close() !!}
@stop