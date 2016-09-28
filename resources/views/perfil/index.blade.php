@extends('layouts.dashboard')
@section('page_heading','Perfil')
@section('section')

    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($perfiles as $perfil)
                <tr>
                    <td>{{$perfil->name}}</td>
                    <td><a href="{{route('perfil.edit',$perfil->id)}}" class="btn btn-info"><i class="fa fa-cogs" aria-hidden="true"></i></a></td>
                    @if($perfil->estado)
                        <td><a href="#" class="btn btn-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a></td>
                    @else
                        <td><a href="#" class="btn btn-danger"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a></td>
                    @endif
                    @if($perfil->estado)
                        <td>
                            {!! Form::open([
                                 'method' => 'DELETE',
                                 'route' => ['perfil.destroy', $perfil->id]
                             ]) !!}
                            {!! Form::submit('Deshabilitar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    @else
                        <td><a href="{{route('perfil.habilitar',$perfil->id)}}" class="btn btn-primary">Habilitar</a></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop