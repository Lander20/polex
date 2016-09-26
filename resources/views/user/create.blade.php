@extends('layouts.dashboard')
@section('page_heading','Usuarios')
@section('section')

    <h3>Crear un nuevo usuario</h3>
    <br>

    {!! Form::open([ 'route' => 'user.store']) !!}

    @include('user.form')

    {!! Form::submit('Crear', ['class' => 'btn btn-primary col-xs-offset-4 col-xs-4',"style"=>"margin-bottom:1%"]) !!}

    {!! Form::close() !!}
@stop