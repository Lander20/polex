@extends('layouts.dashboard')
@section('page_heading','Perfil')
@section('section')

    <h3>Crear un nuevo perfil</h3>
    <br>

    {!! Form::open([ 'route' => 'perfil.store']) !!}

    @include('perfil.form')

    {!! Form::submit('Crear', ['class' => 'btn btn-primary col-xs-offset-4 col-xs-4',"style"=>"margin-bottom:1%"]) !!}

    {!! Form::close() !!}
@stop