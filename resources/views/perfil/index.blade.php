@extends('layouts.dashboard')
@section('page_heading','Perfiles')
@section('section')

    @foreach($perfiles as $perfil)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header bg-red">
                    <h2>
                        {{$perfil->name}}
                    </h2>
                </div>
                <div class="body">
                    {{$perfil->description}}
                </div>
            </div>
        </div>
    @endforeach

@stop