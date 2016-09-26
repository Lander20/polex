<div class="form-group col-xs-offset-2 col-xs-8">
    {!! Form::label('name', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-xs-offset-2 col-xs-8">
    {!! Form::label('last_name', 'Apellido:', ['class' => 'control-label']) !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-xs-offset-2 col-xs-8">
    {!! Form::label('email', 'Correo:', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

@if(empty($usuario))
    <div class="form-group col-xs-offset-2 col-xs-8">
        {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
@endif
{{--<div class="form-group col-xs-offset-2 col-xs-8">
    {!! Form::label('perfil', 'Perfil:', ['class' => 'control-label']) !!}

    <select class="form-control" name="perfil_id">
        @if(!empty($usuario))
            @if($usuario->is('admin'))
                @foreach($roles as $rol)
                    @if($rol->slug=='admin')
                        <option  value="{{$rol->id}}">{{$rol->name}}</option>
                    @endif
                @endforeach
            @else
                @foreach($roles as $rol)
                    @if($rol->slug!='admin')
                        @if($rol->id==$rolThis->id)
                            <option selected value="{{$rol->id}}">{{$rol->name}}</option>
                        @else
                            <option  value="{{$rol->id}}">{{$rol->name}}</option>
                        @endif
                    @endif
                @endforeach
            @endif
        @else
            @foreach($roles as $rol)
                @if($rol->slug!='admin')
                    <option  value="{{$rol->id}}">{{$rol->name}}</option>
                @endif
            @endforeach
        @endif
    </select>

</div>--}}
{{--
<div class="form-group col-xs-offset-2 col-xs-8">
    {!! Form::label('asignaturas', 'Asignaturas:', ['class' => 'control-label col-xs-12']) !!}
    @foreach($asignaturas as $a)
        @if(!empty($a))
            <label class="selectAsg col-sm-3 col-xs-12 {{$a->name}}">
                {!! Form::checkbox("asignaturas[]",$a->id,$a->activo)!!} {!!Form::label($a->id, $a->name)!!}
            </label>
            --}}{{--@if($a->activo)

                    --}}{{----}}{{--<label class="checkbox selectAsg {{$a->name}} col-xs-12 col-sm-3" style="margin: 1%"><input class="form-control" value="{{$a->id}}" type="checkbox" checked>{{$a->name}}</label>--}}{{----}}{{--
                @else
                   --}}{{----}}{{-- <label class="checkbox selectAsg {{$a->name}} col-xs-12 col-sm-3" style="margin: 1%"><input class="form-control" value="{{$a->id}}" type="checkbox">{{$a->name}}</label>--}}{{----}}{{--
                @endif--}}{{--
        @endif
    @endforeach

</div>--}}
