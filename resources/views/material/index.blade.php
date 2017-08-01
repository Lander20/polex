@extends('layouts.dashboard')
@section('page_heading','Materiales')
@section('section')

    <div class="card">
        <div class="body">
            <div class="table-responsive">
                <table class="table" id="table-materiales">
                    <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Precio</th>
                    <th style="text-align: center">Acciones</th>
                    </thead>
                    <tbody>
                    @foreach($materiales as $material)
                        <tr>
                            <td>{{$material->id}}</td>
                            <td>{{$material->name}}</td>
                            <td>{{$material->specialty}}</td>
                            <td>{{$material->price}}</td>
                            <td style="text-align: center">
                                <a href="{{route("material.edit",$material->id)}}" class="btn bg-pink waves-effect"><i class="material-icons">mode_edit</i></a>
                                <a href="{{route("material.delete",$material->id)}}" class="btn bg-pink waves-effect"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@stop
