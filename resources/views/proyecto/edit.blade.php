@extends('layouts.dashboard')
@section('page_heading','Proyecto')
@section('page_small','Editando Proyecto')

@section('section')
    <div class="card">
        <div class="body">
            <br>
            {!! Form::model($proyecto, ['method' => 'PATCH', 'route' => ['proyecto.update', $proyecto->id]]) !!}

            @include('proyecto.form')

            {!! Form::submit('Guardar', ['class' => 'btn btn-success',"style"=>"margin-left:41%"]) !!}


            {!! Form::close() !!}


        </div>
    </div>

@stop