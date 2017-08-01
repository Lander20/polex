@extends('layouts.dashboard')
@section('page_heading','Proyectos')
@section('section')
    @if(count($proyectos)==0)
        <div class="card">
            <div class="body" style="text-align: center">
                <h5>No hay proyectos</h5>
                <a class="btn btn-success" href="{{route('proyecto.create')}}">Crear proyecto </a>
            </div>
        </div>
    @endif

    @foreach($proyectos as $proyecto)
        <div class="proyectos col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box hover-expand-effect">
                <div class="icon bg-purple">
                    <h1 style="color: white">{{strtoupper ($proyecto->name[0])}}</h1>
                </div>
                <div class="content">
                    <div class="text user">Asignado a {{$proyecto->usuario->name}}</div>
                    <div class="number name">{{$proyecto->name}}</div>
                </div>
                <div class="div-btns">
                    <a href="{{route('proyecto.show',$proyecto->id)}}" type="button" class="show btn bg-red btn-circle waves-effect waves-circle waves-float waves-red" >
                        <i class="material-icons">touch_app</i>
                    </a>
                    <a href="{{route('proyecto.edit',$proyecto->id)}}" type="button" class="edit btn bg-red btn-circle waves-effect waves-circle waves-float waves-red" style="margin-left: 5px" >
                        <i class="material-icons">edit</i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach

   {{-- <div class="body">
        <div class="table-responsive">
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
                        <td><a type="button" href="{{route('proyecto.show',$proyecto->id)}}" class="btn btn-success"><i class="material-icons">visibility</i></a></td>
                        <td><a href="{{route('proyecto.edit',$proyecto->id)}}" class="btn btn-info"><i class="material-icons">mode_edit</i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>--}}
@stop