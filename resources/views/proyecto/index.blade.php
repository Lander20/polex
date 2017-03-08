@extends('layouts.dashboard')
@section('page_heading','Proyecto')
@section('section')

    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Asignado a :</th>
                <th>Ver</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                    <td>{{$proyecto->name}}</td>
                    <td>{{$proyecto->usuario->name}}</td>
                    <td><a href="{{route('proyecto.show',$proyecto->id)}}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                    <td><a href="{{route('proyecto.edit',$proyecto->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop