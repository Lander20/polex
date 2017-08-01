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
            <label for="usuario" class="control-label form-label">Asignar usuario:</label>
            <select name="id_usuario" class="form-control" style="border: 1px solid #1f91f3;border-top-width: 2px">
                @foreach($usuarios as $usuario)
                    @php
                        $bool= false;
                        if(isset($proyecto->id_usuario)){
                            if($proyecto->id_usuario==$usuario->id){
                                $bool=true;
                            }
                        }
                    @endphp
                    <option @if($bool) selected @endif value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>