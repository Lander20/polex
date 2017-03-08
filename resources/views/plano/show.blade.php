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

    @if(count($presupuestos))
        <div class="col-xs-12">
            <div class="panel panel-primary" style="margin: 4%">

                <div class="panel-heading">
                    <h3 class="panel-title">Presupuesto</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        @foreach($presupuestos as $presupuesto)
                            <li>id => {{$presupuesto->id}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <a href="{{route('plano.presupuestoCreate',[$proyecto->id, $plano->id])}}" class="btn btn-success">Crear presupuesto <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
@stop