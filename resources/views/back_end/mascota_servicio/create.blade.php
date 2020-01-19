@extends('../layouts.backend')

@section('titulo', 'Aplicar Servicios')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Datos Servicios</h5>

                <div class="errores mb-3">
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <ul>
                        <li class="text-danger">{{ $error }}</li>
                    </ul>
                    @endforeach
                    @endif
                </div>

                <form method="POST" action="{{ route('mascota_servicio.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="id_mascota">Mascota: <span><strong class="text-danger">*</strong></span></label>
                        <select class="form-control select2" name="id_mascota" id="id_mascota" required="">
                            <option value="">Seleccione la mascota...</option>
                            @foreach($mascotas as $mascota)
                            <option value="{{ $mascota->id_mascota }}" @if(old('id_mascota') == $mascota->id_mascota) selected="" @endif>{{ $mascota->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_servicio">Servicio(s): <span><strong class="text-danger">*</strong></span></label>
                        <select class="form-control select2" name="id_servicio[]" id="id_servicio" required="" multiple="">
                            <optgroup label="Básicos">
                                @foreach($servicios as $servicio)
                                    @if($servicio->tipoServicio->descripcion == 'Básicos')
                                        <option value="{{ $servicio->id_servicio }}" @if(old('id_servicio') == $servicio->id_servicio) selected="" @endif>
                                            {{ $servicio->descripcion }}
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>

                            <optgroup label="Sanitarios">
                                @foreach($servicios as $servicio)
                                    @if($servicio->tipoServicio->descripcion == 'Sanitarios')
                                        <option value="{{ $servicio->id_servicio }}" @if(old('id_servicio') == $servicio->id_servicio) selected="" @endif>
                                            {{ $servicio->descripcion }}
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        </select>
                    </div> 

                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection