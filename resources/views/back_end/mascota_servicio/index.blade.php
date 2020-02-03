@extends('../layouts.backend')

@section('titulo', 'Servicios Aplicados')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Dueño</th>
                                <th>Mascota</th>
                                <th>Servicios Realizados</th>
                                <th>Registrado Por</th>
                                <th>Fecha Registro</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($mascota_servicios as $mascota_servicio)
                              <tr>
                                <td>{{ $mascota_servicio->mascota->adoptadaPor[0]->cliente->nombreCompleto ?? 'Veterinaria' }}</td>
                                <td>{{ $mascota_servicio->mascota->nombre }}</td>
                                <td>{{ $mascota_servicio->servicio->descripcion}}</td>
                                <td>{{ $mascota_servicio->usuario->name}}</td>
                                <td>{{ $mascota_servicio->fecha_registro}}</td>
                                <td>
                                    <div style="display: flex; justify-content: space-around;">
                                        @if(Auth::user()->user_type == 'A' || $mascota_servicio->id_usuario == Auth::user()->id)
                                            @if($mascota_servicio->estatus == 'A')
                                                <form method="POST" action="{{ route('mascota_servicio.destroy', $mascota_servicio->id_mascota_servicio) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                        <i class="fa fa-exclamation-triangle"></i>Anular
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <span>No puedes cancelar este servicio.</span>
                                        @endif
                                    </div> 
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