@extends('../layouts.backend')

@section('titulo', 'Registrar Mascota')

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
  
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>

    @endforeach

  </ul>
</div>

@endif

	<div class="row">
		<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form class="form-sample" method="POST" action="{{ route('mascotas.store') }}">
                    @csrf

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nombre Mascota:</label>
                          <div class="col-sm-9">
                            <input name="nombre" id="nombre" placeholder="Nombre de la mascota" type="text" 
                            value="{{ old ('nombre') }}" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Peso:</label>
                          <div class="col-sm-9">
                            <input name= "peso" id="peso" placeholder="Peso de la Mascota" type="text" 
                            value="{{ old ('peso') }}" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Fecha Nacimineto:</label>
                          <div class="col-sm-9">
                            <input name="fecha_nacimiento" id ="fecha_nacimiento" placeholder ="Fecha Nacimineto" 
                                  value="{{ old ('Fecha_nacimiento') }}" type="date" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Color:</label>
                          <div class="col-sm-9">
                            <select name="id_color" id="id_color" class="form-control select2">

                              @foreach($colores as $color)

                              <option value="{{$color->id_color}}">                           
                                {{ $color->descripcion }}</option>

                              @endforeach

                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Estatura:</label>
                          <div class="col-sm-9">
                            <select name="id_estatura" id="id_estatura" class="form-control select2">

                              @foreach($estaturas as $estatura)

                              <option value="{{ $estatura->id_estatura }}">
                              {{ $estatura->descripcion }}</option>

                              @endforeach          
                            
                           </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tipo Mascota:</label>
                          <div class="col-sm-9">
                            <select name="id_tipo_mascota" id="id_tipo_mascota" class="form-control select2">

                              @foreach($tipo_mascotas as $tipomascota)

                              <option value="{{$tipomascota->id_tipo_mascota}}">                          
                                {{ $tipomascota->descripcion }}</option>

                              @endforeach

                            </select>
                          </div>
                        </div>
                      </div>
                      </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Raza:</label>
                          <div class="col-sm-9">
                            <select name="id_raza" id="id_raza" class="form-control select2">

                              @foreach($razas as $raza)

                              <option value="{{ $raza->id_raza }}">{{ $raza->descripcion }}</option>

                              @endforeach

                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                     
                      </div>
                      <div class="col-md-6">     
                      </div>
                    </div>
                    <div class="row">
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