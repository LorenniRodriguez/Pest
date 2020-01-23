@extends('../layouts.backend')

@section('titulo', ' Crear Historial Clínico')

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

				<form method="POST" action="{{ route('diagnosticos.store') }}">
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
						<label for="id_tipo_hospedaje"> Caso Clínico: <span><strong class="text-danger">*</strong></span></label>

						<textarea class="form-control" name="descripcion" required="" maxlength="255">{{old('descripcion')}}</textarea>
                        {{-- <input name="asuntos" id="asuntos" placeholder="Asuntos detallados" type="text" 
                        value="" class="form-control" /> --}}
                    </div>

                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
