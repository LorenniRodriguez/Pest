@extends('../layouts.backend')

@section('titulo', 'Histórico de Servicios')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Mascota</th>
                                <th>Estatus</th>
                                <th>Servicios</th>
                                <th>Registrado Por</th>
                                <th>Cancelada Por</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mascota_servicios as $mascota_servicio)
                            <tr>
                                <td>{{ $mascota_servicio->id_mascota_servicio }}</td>
                                <td>{{ $mascota_servicio->mascota->nombre}}</td>
                                <td> 
                                    @if($mascota_servicio->estatus == 'I')
                                    <label class="badge badge-danger">Cancelado</label>

                                    @else
                                    <label class="badge badge-success">¡Realizado!</label>
                                    @endif
                                </td>

                                <td>{{ $mascota_servicio->servicio->descripcion}}</td>
                                <td>{{ $mascota_servicio->usuario->name}}

                                   <td>  @if($mascota_servicio->borrado_por != null)
                                    {{ $mascota_servicio->borradoPor->name }} 
                                    @else
                                    ·
                                @endif</td>


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