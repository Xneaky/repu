

    <form role="form">
        <div class="card-body">
            <div class="form-group">
                <label for="Nombre" >{{'Nombre'}}</label>
            <input type="text" class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" name="Nombre" id="Nombre" value="{{isset($evento->Nombre)?$evento->Nombre:old('Nombre')}}"">
            {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>')  !!}           
            </div>

            <div class="form-group">
                <label for="Descripcion" >{{'Descripcion'}}</label>
                <input type="text" class="form-control {{$errors->has('Descripcion')?'is-invalid':''}}" name="Descripcion" id="Descripcion" value="{{isset($evento->Descripcion)?$evento->Descripcion:old('Descripcion')}}"">
                {!! $errors->first('Descripcion','<div class="invalid-feedback">:message</div>')  !!}  
            </div>
            
            <div class="form-group">
            <label for="Fecha" >{{'Fecha'}}</label>
            <input type="date" class="form-control {{$errors->has('Fecha')?'is-invalid':''}}" name="Fecha" id="Fecha" value="{{isset($evento->Fecha)?$evento->Fecha:old('Fecha')}}"">
            {!! $errors->first('Fecha','<div class="invalid-feedback">:message</div>')  !!}  
            </div>

            <div class="form-group">
            <label for="Foto" class="control-label">{{'Foto'}}</label>
            @if (isset($evento->Foto))
                <br>
            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$evento->Foto}}" alt="" width="200">
                <br>
            @endif
            </div>

            <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input {{$errors->has('Foto')?'is-invalid':''}}" id="Foto" name="Foto" value="">
                  {!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
                  <label class="custom-file-label" for="Foto" value="">Elegir Archivo</label>
                </div>
              </div>
  

            <input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar' : 'Modificar'}}">
            <a class="btn btn-primary" href="{{url('eventos')}}">Regresar</a>
        </div>
    </form>


