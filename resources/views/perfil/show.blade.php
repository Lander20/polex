@extends('layouts.dashboard')
@section('page_heading','Perfil')
@section('section')

    <h1>Editando perfil "{{ $perfil->name }}"</h1>
    <div class="panel panel-default" style="margin: 4%">

        <table class="table" >
            <tr class="active">
                <th>Nombre</th>
            </tr>
            <tr>
                <th>{{$perfil->name}}</th>
            </tr>
        </table>
    </div>
@stop