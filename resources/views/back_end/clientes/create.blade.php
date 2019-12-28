@extends('../layouts.backend')

@section('titulo', 'Registrar Cliente')

@section('content')

  <div class="row">
    <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form class="form-sample" method="POST" action="{{ route('clientes.store') }}">
                    @csrf

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nombres:</label>
                          <div class="col-sm-9">
                            <input name="nombres" id="nombres" placeholder="Nombres del cliente" type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Teléfono:</label>
                          <div class="col-sm-9">
                            <input name="telefono" id="telefono" placeholder="Numero de Teléfono" type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Apellidos:</label>
                          <div class="col-sm-9">
                            <input name="apellidos" id="apellidos" placeholder="Apellidos del cliente" type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Celular:</label>
                          <div class="col-sm-9">
                            <input name="celular" id="celular" placeholder="Numero de Celular" type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                       <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Edad:</label>
                          <div class="col-sm-9">
                            <input name="edad" id="edad" placeholder="Edad del Cliente" type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pais:</label>
                          <div class="col-sm-9">
                           <select name="id_pais" id="id_pais" class="form-control">

                            @foreach($paises as $pais)

                              <option value="{{$pais->id_pais}}">                           
                                {{ $pais->descripcion }}</option>

                              @endforeach

                            </select>
                          </div>                   
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Genero:</label>
                            <div class="col-sm-9">
                            <select name="id_genero" id="id_genero" class="form-control">

                              @foreach($generos as $genero)

                              <option value="{{$genero->id_genero}}">                           
                                {{ $genero->descripcion }}</option>

                              @endforeach

                            </select>

                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Provincia:</label>
                          <div class="col-sm-9">
                           <select name="id_provincia" id="id_provincia" class="form-control">

                            @foreach($provincias as $provincia)

                              <option value="{{$provincia->id_provincia}}">                           
                                {{ $provincia->descripcion }}</option>

                              @endforeach

                            </select>
                          </div>                   
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cédula:</label>
                          <div class="col-sm-9">
                            <input name="cedula" id="cedula" placeholder="" type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Correo</label>
                          <div class="col-sm-9">
                            <input name="correo" id="correo" placeholder="" type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Dirección:</label>
                          <div class="col-sm-9">
                            <input name="direccion" id="dirección"type="text" class="form-control" />
                          </div>
                        </div>
                      </div>             

                        <div class="col-md-12">
                              <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
  </div>

@endsection