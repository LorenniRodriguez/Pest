@extends('../layouts.backend')

@section('titulo', 'Registrar Cliente')

@section('content')

@include('back_end._errores')

  <div class="row">
    <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form class="form-sample" method="POST" action="{{ route('clientes.store') }}">
                    @csrf

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nombres: <span><strong class="text-danger">*</strong></span></label>
                          <div class="col-sm-9">
                            <input name="nombres" id="nombres" placeholder="Nombres del cliente" type="text" class="form-control"    value="{{ old ('nombres') }}" autocomplete="off" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Teléfono: <span><strong class="text-danger">*</strong></span></label>
                          <div class="col-sm-9">
                            <input name="telefono" id="telefono" placeholder="Numero de Teléfono" type="text" class="form-control"   value="{{ old ('telefono') }}" autocomplete="off" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Apellidos: <span><strong class="text-danger">*</strong></span></label>
                          <div class="col-sm-9">
                            <input name="apellidos" id="apellidos" placeholder="Apellidos del cliente" type="text" class="form-control" autocomplete="off" value="{{ old ('apellidos') }}" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Celular: <span><strong class="text-danger">*</strong></span></label>
                          <div class="col-sm-9">
                            <input name="celular" id="celular" placeholder="Numero de Celular" type="text" class="form-control"autocomplete="off"  value="{{ old ('celular') }}" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Fecha Nacimineto: <span><strong class="text-danger">*</strong></span></label>
                          <div class="col-sm-9">
                            <input name="fecha_nacimiento" id ="fecha_nacimiento" placeholder ="Fecha Nacimineto" 
                                  value="{{ old ('Fecha_nacimiento') }}" type="date" class="form-control" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Género: <span><strong class="text-danger">*</strong></span></label>
                            <div class="col-sm-9">
                            <select name="id_genero" id="id_genero" class="form-control select2">

                              @foreach($generos as $genero)

                              <option value="{{$genero->id_genero}}">                           
                                {{ $genero->descripcion }}</option>

                              @endforeach

                            </select>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cédula: <span><strong class="text-danger">*</strong></span></label>
                          <div class="col-sm-9">
                            <input autocomplete="off" name="cedula" id="cedula" placeholder="Cédula del Cliente" type="text" class="form-control" value="{{ old ('cedula') }}" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Correo: <span><strong class="text-danger">*</strong></span></label>
                          <div class="col-sm-9">
                            <input name="correo" id="correo" placeholder="Correo Personal" type="text" class="form-control" autocomplete="off"  value="{{ old ('correo') }}" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Provincia: <span><strong class="text-danger">*</strong></span></label>
                          <div class="col-sm-9">
                           <select name="id_provincia" id="id_provincia" class="form-control select2">

                            @foreach($provincias as $provincia)

                              <option value="{{$provincia->id_provincia}}">                           
                                {{ $provincia->descripcion }}</option>

                              @endforeach

                            </select>
                          </div>                   
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Dirección: <span><strong class="text-danger">*</strong></span></label>
                          <div class="col-sm-9">
                            <input name="direccion" id="dirección"type="text" placeholder="Direccion del Cliente" class="form-control" autocomplete="off"  value="{{ old ('direccion') }}" />
                          </div>
                        </div>
                      </div>             

                        <div class="col-md-12">
                              <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
  </div>

@endsection