@extends('../layouts.backend')

@section('titulo', 'Registrar Adopciones')

@section('content')
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Datos Adopciones</h5>

                    <div class="errores mb-3">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <ul>
                                    <li class="text-danger">{{ $error }}</li>
                                </ul>
                            @endforeach
                        @endif
                    </div>

                    <form method="POST" action="{{ route('cliente_mascota.store') }}">
                        @csrf

                    <div class="form-group">
                            <label for="id_mascota">Mascota: <span><strong class="text-danger">*</strong></span></label>
                            <select class="form-control select2" name="id_mascota" id="id_mascota" required="">
                                <option value="0">Seleccione la mascota...</option>
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id_mascota }}" @if(old('id_mascota') == $mascota->id_mascota) selected="" @endif>{{ $mascota->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_cliente">Cliente: <span><strong class="text-danger">*</strong></span></label>
                            <select class="form-control select2" name="id_cliente" id="id_cliente" required="">
                                <option value="0">Seleccione el cliente...</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}" @if(old('id_cliente') == $cliente->id_cliente) selected="" @endif>{{ $cliente->nombres }}</option>
                                @endforeach
                            </select>
                        </div>

                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">¿Es adopción?</label>
                          <div class="col-sm-4">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="es_adopcion" id="es_adopcion1" value="Y" checked> Sí
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="es_adopcion" id="es_adopcion2" value="N"> No
                              </label>
                            </div>
                          </div>
                        </div>
                        
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                            
                        </form>             
                </div>
            </div>
        </div>
    </div>
    
@endsection

