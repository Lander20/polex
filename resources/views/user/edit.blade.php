@extends('layouts.dashboard')
@section('page_heading','Usuarios')
@section('section')

    <h3>Editando usuario "{{ $usuario->name }}"</h3>
    <br>

    {!! Form::model($usuario, ['method' => 'PATCH', 'route' => ['user.update', $usuario->id]]) !!}

    @include('user.form')


    {!! Form::submit('Guardar',['class' => 'btn btn-primary col-xs-offset-4 col-xs-4', 'style'=>'']) !!}

    {!! Form::close() !!}
@stop