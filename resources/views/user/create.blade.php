@extends('layouts.dashboard')
@section('page_heading','Usuario')
@section('page_small','Crear un nuevo usuario')
@section('section')
    <div class="card">
        <div class="body">
            <br>
            {!! Form::open([ 'route' => 'user.store']) !!}

            @include('user.form')

            {!! Form::submit('Crear', ['class' => 'btn btn-success',"style"=>"margin-left:41%"]) !!}

            {!! Form::close() !!}
        </div>
    </div>


@stop