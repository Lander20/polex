@extends('layouts.dashboard')
@section('page_heading','Usuarios')
@section('section')
    <div class="card">
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th style="text-align: center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            @if($user->state)
                                <td><h4><span class="label bg-pink">Activado</span></h4></td>
                            @else
                                <td><h4><span class="label bg-pink">Desactivado</span></h4></td>
                            @endif

                            @if($user->state)
                                <td style="text-align: center">
                                    <a href="{{route('user.edit',$user->id)}}" class="btn bg-pink"><i class="material-icons">mode_edit</i></a>
                                    <a class="btn bg-pink" href="{{route('user.delete',$user->id)}}" ><i class="material-icons">thumb_down</i></a>
                                </td>
                            @else
                                <td style="text-align: center">
                                    <a href="{{route('user.edit',$user->id)}}" class="btn bg-pink"><i class="material-icons">mode_edit</i></a>
                                    <a href="{{route('user.habilitar',$user->id)}}" class="btn bg-pink"><i class="material-icons">thumb_up</i></a>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop