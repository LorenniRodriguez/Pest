@extends('../layouts.backend')

@section('titulo', 'Seleccionar Mascota')

@section('content')

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('historial_clinico') }}">
                        @csrf

                        <div class="form-group">
                            <label for="id_mascota">Mascotas:</label>
                            <select class="form-control select2" name="id_mascota" id="id_mascota">
                            	@foreach($mascotas as $mascota)
                            		<option value="{{ $mascota->id_mascota }}">
                                        {{ $mascota->adoptadaPor[0]->cliente->nombreCompleto ?? 'Veterinaria' }} | {{ $mascota->nombre }}
                                    </option>
                            	@endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-angle-right"></i>Continuar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('partials.datatable')