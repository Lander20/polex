@extends('layouts.dashboard')
@section('page_heading','Perfil')
@section('section')

    <h3>Editando perfil "{{ $perfil->name }}"</h3>
    <br>

    {!! Form::model($perfil, ['method' => 'PATCH', 'route' => ['perfil.update', $perfil->id]]) !!}

    @include('perfil.form')


    {!! Form::submit('Guardar',['class' => 'btn btn-primary col-xs-offset-4 col-xs-4', 'style'=>'']) !!}

    {!! Form::close() !!}
@stop