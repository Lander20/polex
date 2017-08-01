@extends('layouts.dashboard')
@section('page_heading','Plano')
@section('page_small',"Plano ". $plano->name)

@section('section')
    <div class="card">
        <div class="header">
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
        <div class="body">
            @if($plano->url_image && $plano->url_image)
                <a href="{{route('cubicacion.create',[$proyecto->id, $plano->id])}}" class="btn btn-success" @if(!count($infoCubicaciones)) style="margin-top: 5%;" @endif>Crear cubicación</a>
            @endif
            <br>
            @if(count($infoCubicaciones))
                <div>
                    <table class="table">
                        <thead>
                        <th>Numero </th>
                        <th>Estado</th>
                        <th>Aprobada</th>
                        <th>Acción</th>
                        </thead>
                        <tbody>
                        @foreach($infoCubicaciones as $info)
                            <tr>
                                <td>{{$info->name}}</td>
                                <td>?</td>
                                <td>
                                    @if($info->selected)
                                        <a class="btn bg-pink" disabled data-toggle="tooltip" title="Seleccionada"><i class="material-icons">thumb_up</i></a>
                                    @else
                                        <a href="{{route("cubicacion.selected",[$proyecto->id,$plano->id,$info->id])}}" class="btn bg-pink" data-toggle="tooltip" title="Seleccionar"><i class="material-icons">thumb_down</i></a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn bg-pink" href="{{route('cubicacion.show',[$proyecto->id,$plano->id,$info->id])}}">Editar/Revisar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

@stop