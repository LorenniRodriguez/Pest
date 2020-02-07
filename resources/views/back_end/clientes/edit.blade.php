@extends('../layouts.backend')

@section('titulo', 'Editar Cliente')

@section('content')

  @include('back_end._errores')

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
                <label class="col-sm-3 col-form-label">Nombres: <span><strong class="text-danger">*</strong></span></label>
                <div class="col-sm-9">
                  <input autocomplete="off" name="nombres" id="nombres" placeholder="Nombres del cliente" 
                  type="text"  value="@if(old('nombres')) {{ old('nombres') }} @else {{ $cliente->nombres }} @endif"  class="form-control" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Teléfono: <span><strong class="text-danger">*</strong></span></label>
                <div class="col-sm-9">
                  <input autocomplete="off" name="telefono" id="telefono" placeholder="Numero de Teléfono" 
                  value="@if(old('telefono')) {{ old('telefono') }} @else {{ $cliente->telefono }} @endif" type="text" class="form-control" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Apellidos: <span><strong class="text-danger">*</strong></span></label>
              <div class="col-sm-9">
                <input autocomplete="off" name="apellidos" id="apellidos" placeholder="Apellidos del cliente" 
                value="@if(old('apellidos')) {{ old('apellidos') }} @else {{ $cliente->apellidos }} @endif" type="text" class="form-control" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
             <label class="col-sm-3 col-form-label">Celular: <span><strong class="text-danger">*</strong></span></label>
             <div class="col-sm-9">
              <input autocomplete="off" name="celular" id="celular" placeholder="Numero de Celular" 
              value="@if(old('celular')) {{ old('celular') }} @else {{ $cliente->celular }} @endif" type="text" class="form-control" />
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Fecha Nacimiento: <span><strong class="text-danger">*</strong></span></label>
              <div class="col-sm-9">
                <input name="fecha_nacimiento" id ="fecha_nacimiento" placeholder ="Fecha Nacimineto" 
                value="{{ date('Y-m-d', strtotime($cliente->fecha_nacimiento ))}}" type="date" class="form-control" />
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
             <label class="col-sm-3 col-form-label">Genero: <span><strong class="text-danger">*</strong></span></label>
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
      </div>
      
   <div class="row">
    <div class="col-md-6">
     <div class="form-group row">
      <label class="col-sm-3 col-form-label">Cédula: <span><strong class="text-danger">*</strong></span></label>
      <div class="col-sm-9">
        <input autocomplete="off" name="cedula" id="cedula" placeholder="" type="text" 
        value="@if(old('cedula')) {{ old('cedula') }} @else {{ $cliente->cedula }} @endif" class="form-control" />
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Correo: <span><strong class="text-danger">*</strong></span></label>
      <div class="col-sm-9">
        <input autocomplete="off" name="correo" id="correo" placeholder="" type="text" 
        value="@if(old('correo')) {{ old('correo') }} @else {{ $cliente->correo }} @endif"class="form-control" />
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

        <option value="{{$provincia->id_provincia}}"

         @if($cliente->id_provincia == $provincia->id_provincia) selected @endif>

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
        <input autocomplete="off" name="direccion" id="direccion"type="text" 
        value="@if(old('direccion')) {{ old('direccion') }} @else {{ $cliente->direccion }} @endif" class="form-control" />
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


@section('js')
  <script type="text/javascript">
        $('#telefono').inputmask('999-999-9999');
        $('#celular').inputmask('999-999-9999');
        $('#cedula').inputmask('999-9999999-9');
  </script>
@endsection