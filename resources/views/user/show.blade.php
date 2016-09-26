@extends('layouts.dashboard')
@section('page_heading','Usuarios')
@section('section')

    <h1>Editando usuario "{{ $usuario->name }}"</h1>
    <div class="panel panel-default" style="margin: 4%">

        <table class="table" >
            <tr class="active">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
            </tr>
            <tr>
                <th>{{$usuario->name}}</th>
                <th>{{$usuario->last_name}}</th>
                <th>{{$usuario->email}}</th>
            </tr>
        </table>
    </div>
@stop