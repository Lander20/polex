<div class="col-sm-12">
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <label class="form-label">Nombre</label>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            <label class="form-label">Apellido</label>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            <label class="form-label">Correo</label>
        </div>
    </div>
</div>

@if(empty($usuario))
    <div class="col-sm-12">
        <div class="form-group form-float">
            <div class="form-line">
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <label class="form-label">Password</label>
            </div>
        </div>
    </div>

@endif

<div class="col-sm-12">
    <div class="form-group form-float">
        <div class="form-line">
            <label for="usuario" class="control-label form-label">perfil</label>
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
    </div>
</div>