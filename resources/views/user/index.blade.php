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
                <th>Estado</th>
                <th>Editar</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->estado)
                        <td><a href="#" class="btn btn-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a></td>
                    @else
                        <td><a href="#" class="btn btn-danger"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a></td>
                    @endif
                    <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-info"><i class="fa fa-cogs" aria-hidden="true"></i></a></td>

                    @if($user->estado)
                        <td>
                            {!! Form::open([
                                 'method' => 'DELETE',
                                 'route' => ['user.destroy', $user->id]
                             ]) !!}
                            {!! Form::submit('Deshabilitar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    @else
                        <td><a href="{{route('user.habilitar',$user->id)}}" class="btn btn-primary">Habilitar</a></td>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop