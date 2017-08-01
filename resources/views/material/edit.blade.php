@extends('layouts.dashboard')
@section('page_heading','Material')
@section('page_small','Editando Material')
@section('section')
    <div class="card">
        <div class="body">
            <br>
            {!! Form::model($material, ['method' => 'PATCH', 'route' => ['material.update', $material->id]]) !!}

            @include('material.form')

            {!! Form::submit('Guardar', ['class' => 'btn btn-success',"style"=>"margin-left:41%"]) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop