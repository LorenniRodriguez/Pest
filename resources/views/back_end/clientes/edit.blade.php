@extends('../layouts.backend')

@section('titulo', 'Editar Cliente')

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
        <form class="form-sample" method="POST" action="{{ route('clientes.update' , $cliente) }}">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nombres:</label>
                <div class="col-sm-9">
                  <input autocomplete="off" name="nombres" id="nombres" placeholder="Nombres del cliente" 
                  type="text"  value="{{ $cliente->nombres }}" class="form-control" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Teléfono:</label>
                <div class="col-sm-9">
                  <input autocomplete="off" name="telefono" id="telefono" placeholder="Numero de Teléfono" 
                  value="{{ $cliente->telefono }}" type="text" class="form-control" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Apellidos:</label>
              <div class="col-sm-9">
                <input autocomplete="off" name="apellidos" id="apellidos" placeholder="Apellidos del cliente" 
                value="{{ $cliente->apellidos }}" type="text" class="form-control" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
             <label class="col-sm-3 col-form-label">Celular:</label>
             <div class="col-sm-9">
              <input autocomplete="off" name="celular" id="celular" placeholder="Numero de Celular" 
              value="{{ $cliente->celular}}" type="text" class="form-control" />
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
                value="{{ old ('$cliente->fecha_nacimiento') }}" type="date" class="form-control" />
              </div>
            </div>
          </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Pais:</label>
            <div class="col-sm-9">
             <select name="id_pais" id="id_pais" class="form-control select2">

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
            <select name="id_genero" id="id_genero" class="form-control select2">

              @foreach($generos as $genero)

              <option value="{{$genero->id_genero}}"

               @if($cliente->id_genero == $genero->id_genero) selected @endif>

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
           <select name="id_provincia" id="id_provincia" class="form-control select2">

            @foreach($provincias as $provincia)

            <option value="{{$provincia->id_provincia}}"

             @if($cliente->id_provincia == $provincia->id_provincia) selected @endif>

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
        <input autocomplete="off" name="cedula" id="cedula" placeholder="" type="text" 
        value="{{ $cliente->cedula}}"class="form-control" />
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Correo</label>
      <div class="col-sm-9">
        <input autocomplete="off" name="correo" id="correo" placeholder="" type="text" 
        value="{{ $cliente->correo}}"class="form-control" />
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Dirección:</label>
      <div class="col-sm-9">
        <input autocomplete="off" name="direccion" id="direccion"type="text" 
        value="{{ $cliente->direccion}}" class="form-control" />
      </div>
    </div>
  </div>             

  <div class="col-md-12">
    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Guardar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-mail-reply"></i>Atrás</a>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>

@endsection