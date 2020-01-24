@extends('../layouts.backend')

@section('titulo', 'Histórico de Hospedajes')

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
                                    <th>Dueño</th>
                                    <th>Mascota</th>
                                    <th>Estatus</th>
                                    <th>Registrado Por</th>
                                    <th>Atendido Por</th>
                                    <th>Cancelada Por</th>
                                    <th>Asuntos</th>
                                    <th>Finalizado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hospedajes as $hospedaje)
                                    <tr>
                                        <td>{{ $hospedaje->id_hospedaje }}</td>
                                        <td>{{ $hospedaje->mascota->adoptadaPor[0]->cliente->nombres }}</td>
                                        <td>{{ $hospedaje->mascota->nombre }}</td>
                                        <td>
                                            @if($hospedaje->estatus == 'I')
                                                <label class="badge badge-danger">Cancelada</label>
                                            @elseif($hospedaje->fecha_entrega != null || $hospedaje->estatus == 'E')
                                                <label class="badge badge-success">¡Atendida!</label>
                                            @else
                                                <label class="badge badge-warning">En Proceso</label>
                                            @endif
                                        </td>
                                        <td>{{ $hospedaje->usuario->name}}</td>
                                        <td class="text-center">
                                            
                                            @if($hospedaje->finalizado_por != null) 
                                                {{ $hospedaje->finalizadoPor->name }} 
                                            @else
                                                ·
                                            @endif
                                       </td>

                                       <td class="text-center">
                                            
                                            @if($hospedaje->borrado_por != null) 
                                                {{ $hospedaje->borradoPor->name }} 
                                            @else
                                                ·
                                            @endif
                                       </td>

                                       <td>{{ $hospedaje->TipoHospedaje->descripcion }}</td>
                                       <td>{{ $hospedaje->fecha_entrega}}</td>
                                        
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