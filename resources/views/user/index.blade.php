@extends('layouts.dashboard')
@section('page_heading','Usuarios')
@section('section')

    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-info"><i class="fa fa-cogs" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop