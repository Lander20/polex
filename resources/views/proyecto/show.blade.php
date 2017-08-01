@extends('layouts.dashboard')
@section('page_heading','PROYECTO')
@section('page_small',"Proyecto ". $proyecto->shortname .", asignado a ".$proyecto->usuario->name)
@section('section')
    <div class="card">
        <a class="btn btn-success right" data-toggle="modal" data-target="#modal-plano-create" style="margin-top: -6%">Agregar plano</a>
        <div class="body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado cubicación</th>
                    <th>Estado revisión</th>
                    <th style="text-align: center;">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proyecto->planos as $plano)
                    <tr>
                        <td>{{$plano->name}}</td>
                        <td>
                            @php
                                $selected=false;
                                $idPlano = $plano->id;
                                $infoCubicaciones = App\InfoCubicacion::whereHas('cubicaciones', function ($query) use ($idPlano){
                                    $query->where('id_plano',$idPlano);
                                })->get();
                                foreach ($infoCubicaciones as $info){
                                    if($info->selected){
                                        $selected=true;
                                    }
                                }
                            @endphp
                            @if(count($infoCubicaciones)>1)
                                <h4><span class="label bg-pink">Validado</span></h4>
                            @else
                                <h4><span class="label bg-pink">Pendiente</span></h4>
                            @endif
                        </td>
                        <td>
                            @if($selected)
                                <h4><span class="label bg-pink">Validado</span></h4>
                            @else
                                <h4><span class="label bg-pink">Pendiente</span></h4>
                            @endif

                        </td>
                        <td  style="text-align: center;">
                            <a class="btn bg-pink waves-effect" href="{{route('plano.show',[$proyecto->id,$plano->id])}}"><i class="material-icons">touch_app</i></a>
                            <a class="btn bg-pink waves-effect" href="{{route('plano.destroy',[$proyecto->id,$plano->id])}}"><i class="material-icons">delete</i></a>
                            <a class="btn bg-pink waves-effect" href="{{route('plano.presupuesto',[$proyecto->id,$plano->id])}}"><i class="material-icons">flash_on</i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div id="modal-plano-create" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Crear plano</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open([ 'route' => ['plano.create',$proyecto->id]]) !!}
                        <div class="form-group">
                            <p for="name" class="control-label">Ingrese nombre:</p>
                            <div style="display: inline-flex; margin-left: 35%">
                                {!! Form::text('name', $proyecto->shortname."-", ['disabled','class' => 'form-control','style' =>"text-align:right; width: 20%;border-radius: 4px 0 0 4px;border-right: none;"]) !!}
                                {!! Form::text('name', null, ['class' => 'form-control','style' =>"width: 30%;border-radius: 0 4px 4px 0;border-left: 0;"]) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-success" type="submit" value="Crear">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@stop