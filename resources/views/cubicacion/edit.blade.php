@extends('layouts.dashboard')
@section('page_heading','Cubicación')
@section('section')
    <div class="card">
        <div class="body">
            <a id="value-activate" class="btn" style="display: none;">Value</a>

            <div class="">
                <div class="col-sm-3 col-xs-6" style="margin-left: -15px">
                    <select id="material" name="material" class="form-control" >
                        @foreach(\App\Material::all() as $material)
                            <option id="mat-{{$material->id}}" class="0">{{$material->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="info-box-2 bg-red col-xs-6 col-sm-2" style="height:40px; margin-top: -4px; float: right;">
                    <div class="icon" style=" width: 28px;margin-left: 10px">
                        <i class="material-icons" style="font-size: 25px;line-height: 45px;">trending_up</i>
                    </div>
                    <div class="content" style="padding: 0px 10px;margin-left: 20px">
                        <div class="text" style="font-size: 10px;margin-top: 6px">Total</div>
                        <div id="cantidad" class="number" style="font-size: 16px; text-align: center;margin-top: -3px;">0</div>
                    </div>
                </div>

                {{--<div class="input-group col-xs-12 col-sm-2">
                    <span class="input-group-addon" id="basic-addon1">Total</span>
                    <input type="text" id="cantidad" class="form-control" disabled value="0">
                </div>--}}
            </div>

            <div class="" id="img-cubicacion-master" style="margin-top: 1%;margin-bottom: 1%">
                <img width="100%" class="img-cubicacion" src="{{asset($infoCubicacion->url_image)}}" alt="logo" />
                @foreach($cubicacions as $cubicacion)
                    @if(count($cubicacion))
                        @foreach($cubicacion->cubicacionMaterialDetalle()->get() as $index => $detalle)
                            <i class="i-img mat-{{$detalle->id_material}}" style="top:{{$detalle->positionY}}%;left:{{$detalle->positionX}}%;">x</i>
                        @endforeach
                    @endif
                @endforeach
            </div>
            <meta name="csrf-token" content="{{ Session::token() }}">
            <div class="btns" style="margin-bottom: 3%; margin-top:1%">
                <a id="btn-reset-cubicacion" class="btn btn-warning col-xs-2 col-sm-2" >Reset</a>
                <a id="btn-eliminar-cubicacion" class="btn btn-danger col-xs-3 col-sm-3" >Eliminar ultimo</a>
                <a id="btn-resumen-cubicacion" class="btn btn-info col-xs-3 col-sm-2" style="margin-left: 6%">Resumen</a>
                <a id="btn-guardar-cubicacion" class="btn btn-success col-xs-4 col-sm-4 ">Guardar</a>
            </div>

            <div id="resumen-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-info">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Resumen de material(es)</h4>
                        </div>
                        <div class="modal-body">
                            <p>Actualmente posees :</p>
                            <div class="panel panel-default">
                                <table class='table'>
                                    <thead>
                                    <th>Item</th>
                                    <th>Material</th>
                                    <th>cantidad <span style="font-size: 11px;"> (total / no guardados )</span></th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

