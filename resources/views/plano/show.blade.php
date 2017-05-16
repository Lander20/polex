@extends('layouts.dashboard')
@section('page_heading','Plano')
@section('section')

    <h3>Información del Plano "{{ $plano->name }}"</h3>

    <div class="col-xs-12">

        <div class="@if(!$plano->url_image) img-upload @else img-re-upload @endif">
            {!! Form::open(
            array(
            'route'=>['plano.upload',$proyecto->id,$plano->id],'method'=>'POST', 'files'=>true)) !!}
            <div class="control-group">
                <div class="controls">
                    <input class="form-control" name="image" type="file" style="width: 80%;float: left;" />
                    <input class="btn @if(!$plano->url_image) btn-success @else btn-danger @endif" type="submit" value="@if(!$plano->url_image) Subir @else Reemplazar @endif " style="width: 15%" />

                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>

    @if(count($cubicacionesByPlano))
        <div class="col-xs-12">
            <div class="panel panel-primary" style="margin: 4%">

                <div class="panel-heading">
                    <h3 class="panel-title">Cubicación</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Numero </th>
                            <th>Ver</th>
                            <th>Seleccionada</th>
                        </thead>
                        <tbody>
                            @foreach($cubicacionesByPlano as $cubicacion)
                                <tr>
                                    <td>{{$cubicacion->name}}</td>
                                    <td>link {{$cubicacion->id}}</td>
                                    <td>
                                        @if($cubicacion->selected)
                                            <a class="btn btn-success fa-lg" disabled data-toggle="tooltip" title="Seleccionada"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                                        @else
                                            <a href="{{route("cubicacion.selected",[$proyecto->id,$plano->id,$cubicacion->id])}}" class="btn btn-danger fa-lg" data-toggle="tooltip" title="Seleccionar"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    @if($plano->url_image && $plano->url_image)
        <a href="{{route('cubicacion.create',[$proyecto->id, $plano->id])}}" class="btn btn-success" @if(!count($cubicacionesByPlano)) style="margin-top: 5%;" @endif>Crear cubicación <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    @endif
@stop