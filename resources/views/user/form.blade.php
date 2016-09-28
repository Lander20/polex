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
<div class="form-group col-xs-offset-2 col-xs-8">
    {!! Form::label('perfil', 'Perfil:', ['class' => 'control-label']) !!}

    <select class="form-control" name="id_perfil">
        @if(!empty($usuario))
            @if($usuario->perfil->id==1)
                <option  value="{{$usuario->perfil->id}}">{{$usuario->perfil->name}}</option>
            @else
                @foreach($perfiles as $perfil)
                    @if($perfil->id != 1)
                        @if($perfil->id == $usuario->perfil->id)
                            <option selected value="{{$perfil->id}}">{{$perfil->name}}</option>
                        @else
                            <option  value="{{$perfil->id}}">{{$perfil->name}}</option>
                        @endif
                    @endif
                @endforeach
            @endif
        @else
            @foreach($perfiles as $perfil)
                @if($perfil->name!='Administrador')
                    <option  value="{{$perfil->id}}">{{$perfil->name}}</option>
                @endif
            @endforeach
        @endif
    </select>

</div>