@extends('layouts.plane')
@section('page_heading','Material')
@section('page_small','Crear un nuevo Material')
@section('section')

    <div class="card">
        <div class="body">
            <br>
            {!! Form::open([ 'route' => 'material.store']) !!}

            @include('material.form')

            {!! Form::submit('Guardar', ['class' => 'btn btn-success',"style"=>"margin-left:41%"]) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop