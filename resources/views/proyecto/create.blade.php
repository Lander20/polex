@extends('layouts.dashboard')
@section('page_heading','Proyecto')
@section('page_small','Crear un nuevo Proyecto')

@section('section')
    <div class="card">
        <div class="body">
            <br>
            {!! Form::open([ 'route' => 'proyecto.store']) !!}

            @include('proyecto.form')

            {!! Form::submit('Crear', ['class' => 'btn btn-success',"style"=>"margin-left:41%"]) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop