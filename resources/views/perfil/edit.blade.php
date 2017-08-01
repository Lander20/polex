@extends('layouts.dashboard')
@section('page_heading','Perfil')
@section('page_small','Editando perfil')

@section('section')
    <div class="card">
        <div class="body">
            <br>
            {!! Form::model($perfil, ['method' => 'PATCH', 'route' => ['perfil.update', $perfil->id]]) !!}

            @include('perfil.form')


            {!! Form::submit('Guardar', ['class' => 'btn btn-success',"style"=>"margin-left:41%"]) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop