@extends('layouts.dashboard')
@section('page_heading','Cubicación')
@section('section')

    <div class="col-xs-12">
        <div class="col-xs-12 col-sm-3" style="margin-left: -15px">
            <select id="material" name="material" class="form-control col-xs-12 col-sm-3" >
                @foreach($materiales as $material)
                    <option id="mat-{{$material->id}}" class="0">{{$material->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group col-xs-12 col-sm-offset-10 col-sm-2">
            <span class="input-group-addon" id="basic-addon1">Total</span>
            <input type="text" id="cantidad" class="form-control" disabled value="0">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12" id="img-cubicacion-master" style="margin-top: 1%;margin-bottom: 1%">
        <img width="100%" class="img-cubicacion" src="{{asset($plano->url_image)}}" alt="logo" />
    </div>


@stop
