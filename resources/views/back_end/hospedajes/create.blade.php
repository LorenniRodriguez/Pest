@extends('../layouts.backend')

@section('titulo', 'Registrar Hospedaje')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Datos Hospedaje</h5>

                <div class="errores mb-3">
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <ul>
                        <li class="text-danger">{{ $error }}</li>
                    </ul>
                    @endforeach
                    @endif
                </div>

                <form method="POST" action="{{ route('hospedajes.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="id_mascota">Mascota: <span><strong class="text-danger">*</strong></span></label>
                        <select class="form-control select2" name="id_mascota" id="id_mascota" required="">
                            <option value="">Seleccione la mascota...</option>
                            @foreach($mascotas as $mascota)
                                <option value="{{ $mascota->id_mascota }}" @if(old('id_mascota') == $mascota->id_mascota) selected="" @endif>
                                    @if(strlen($mascota->dueño) > 0) {{ $mascota->dueño }} @else Veterinaria @endif  |  {{ $mascota->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_jaula">Jaula: <span><strong class="text-danger">*</strong></span></label>
                        <select class="form-control select2" name="id_jaula" id="id_jaula" required="">
                            <option value="">Seleccione una jaula...</option>
                            @foreach($jaulas as $jaula)
                            <option value="{{ $jaula->id_jaula }}" @if(old('id_jaula') == $jaula->id_jaula) selected="" @endif>{{ $jaula->descripcion }}</option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="form-group">
                        <label for="id_tipo_hospedaje">Tipo Hospedaje: <span><strong class="text-danger">*</strong></span></label>
                        <select class="form-control select2" name="id_tipo_hospedaje" id="id_tipo_hospedaje" required="">
                            <option value="">Seleccione un tipo hospedaje...</option>
                            @foreach($tipo_hospedajes as $TipoHospedaje)
                            <option value="{{ $TipoHospedaje->id_tipo_hospedaje }}" @if(old('id_tipo_hospedaje') == $TipoHospedaje->id_tipo_hospedaje) selected="" @endif>{{ $TipoHospedaje->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>  

                    <div class="form-group">
                        <label for="id_tipo_hospedaje">Asuntos del Hospedaje: <span><strong class="text-danger">*</strong></span></label>

                        <textarea class="form-control" name="asuntos" required="" maxlength="255">{{old('asuntos')}}</textarea>
                        {{-- <input name="asuntos" id="asuntos" placeholder="Asuntos detallados" type="text" 
                        value="" class="form-control" /> --}}
                    </div> 

                    <div class="form-group">
                        <label for="fecha_cita">Fecha Final: <span><strong class="text-danger">*</strong></span></label>
                        <input type="date" class="form-control" name="fecha_final" id="fecha_final" value="{{ old('fecha_final') }}" required="" autocomplete="off">
                    </div> 

                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection