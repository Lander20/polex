<div class="form-group col-xs-offset-2 col-xs-8">
    {!! Form::label('name', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-xs-offset-2 col-xs-8">
    {!! Form::label('usuario', 'Asignar usuaria:', ['class' => 'control-label']) !!}
    <select name="id_usuario" class="form-control">
        @foreach($usuarios as $usuario)
            <option @if($usuario->id == isset($proyecto->id_usuario) ? $proyecto->id_usuario : null ) selected @endif value="{{$usuario->id}}">{{$usuario->name}}</option>
        @endforeach
    </select>
</div>