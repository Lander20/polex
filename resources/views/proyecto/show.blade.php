@extends('layouts.dashboard')
@section('page_heading','Proyecto')
@section('section')

    <h3>Editando Proyecto "{{ $proyecto->name }}", asignado a {{$proyecto->usuario->name}}</h3>

    <div class="panel panel-primary" style="margin: 4%">

        <div class="panel-heading">
            <h3 class="panel-title">Planos</h3>
        </div>

        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($proyecto->planos as $planos)
                        <td>{{$planos->name}}</td>
                        <td><a class="btn btn-primary" href="{{route('plano.show',[$proyecto->id,$planos->id])}}"><i class="fa fa-hand-o-up" aria-hidden="true"></i></a></tr>
                    @endforeach
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@stop