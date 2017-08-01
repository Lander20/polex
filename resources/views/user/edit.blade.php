@extends('layouts.dashboard')
@section('page_heading','Editando usuario')
@section('section')
    <div class="card">
        <div class="body">
            <br>
            {!! Form::model($usuario, ['method' => 'PATCH', 'route' => ['user.update', $usuario->id]]) !!}

            @include('user.form')

            {!! Form::submit('Guardar', ['class' => 'btn btn-success',"style"=>"margin-left:41%"]) !!}

            {!! Form::close() !!}
        </div>
    </div>


@stop