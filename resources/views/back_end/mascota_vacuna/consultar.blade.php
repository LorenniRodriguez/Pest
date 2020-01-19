@extends('../layouts.backend')

@section('titulo', 'Seleccionar Mascota')

@section('content')

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('mascota_vacuna.aplicar_vacuna') }}">
                        @csrf

                        <div class="form-group">
                            <label for="id_mascota">Mascotas:</label>
                            <select class="form-control select2" name="id_mascota" id="id_mascota">
                            	@foreach($mascotas as $mascota)
                            		<option value="{{ $mascota->id_mascota }}">{{ $mascota->nombre }}</option>
                            	@endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-angle-right"></i>Continuar</button>
                        <a href="{{ route('vacunacion.create') }}" class="btn btn-info btn-sm"><i class="fa fa-calendar"></i>Agendar Vacunación</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Histórico de Vacunas Aplicadas:</h5>

                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                	<th>Mascota</th>
                                    <th>Vacuna</th>
                                    <th>Veterinario</th>
                                    <th>Fecha Aplicación</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mascota_vacunas as $mascota_vacuna)
                                    <tr>
                                        <td>{{ $mascota_vacuna->mascota->nombre }}</td>
                                        <td>{{ $mascota_vacuna->vacuna->descripcion }}</td>
                                        <td>{{ $mascota_vacuna->usuario->name }}</td>
                                        <td>{{ $mascota_vacuna->fecha_registro }}</td>
                                        <td class="text-center">
                                            @if(Auth::user()->user_type == 'A' || $mascota_vacuna->id_usuario == Auth::user()->id)
	                                            <div style="display: flex; justify-content: space-around;">
	                                                @if($mascota_vacuna->estatus == 'A')
	                                                    <form method="POST" action="{{ route('mascota_vacuna.destroy', $mascota_vacuna->id_mascota_vacuna) }}">
	                                                        @csrf
	                                                        @method('DELETE')

	                                                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
	                                                            <i class="fa fa-exclamation-triangle"></i>Anular
	                                                        </button>
	                                                    </form>
	                                                @endif
	                                            </div>
	                                        @else
	                                        	<span>No puedes anular esta vacuna.</span>
	                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('partials.datatable')