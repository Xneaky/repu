

    <form role="form">
        <div class="card-body">
            <div class="form-group">
                <label for="Nombre" >{{'Nombre'}}</label>
            <input type="text" class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" name="Nombre" id="Nombre" value="{{isset($usuario->name)?$usuario->name:old('Nombre')}}"">
            {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>')  !!}           
            </div>

            <div class="form-group">
                <label for="Email" >{{'Email'}}</label>
                <input type="text" class="form-control {{$errors->has('Email')?'is-invalid':''}}" name="Email" id="Email" value="{{isset($usuario->email)?$usuario->email:old('Descripcion')}}"">
                {!! $errors->first('Email','<div class="invalid-feedback">:message</div>')  !!}  
            </div>
            
            <div class="form-group">
                <label for="Contraseña" >{{'Contraseña'}}</label>
                <input type="text" class="form-control {{$errors->has('Contraseña')?'is-invalid':''}}" name="Contraseña" id="Contraseña" value="{{isset($usuario->password)?$usuario->password:old('Contraseña')}}"">
                {!! $errors->first('Contraseña','<div class="invalid-feedback">:message</div>')  !!}  
            </div>

            <div class="form-group">
                <label for="ContraseñaConf" >{{'Confirmar Contraseña'}}</label>
                <input type="text" class="form-control {{$errors->has('ContraseñaConf')?'is-invalid':''}}" name="ContraseñaConf" id="ContraseñaConf" value="{{isset($usuario->password)?$usuario->password:old('Contraseña')}}"">
                {!! $errors->first('ContraseñaConf','<div class="invalid-feedback">:message</div>')  !!}  
            </div>

            <div class="form-group">
                <label for="Rol">Rol</label>
                <select class="form-control" name="Rol" id="Rol">
                    @foreach ($roles as $key => $value)
                    @if ($usuario->hasRole($value))
                        <option value="{{ $value }}" selected>{{ $value }}</option>
                    @else
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endif    
                    @endforeach
                </select>
            </div>
  

            <input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar' : 'Modificar'}}">
            <a class="btn btn-primary" href="{{url('usuarios')}}">Regresar</a>
        </div>
    </form>


