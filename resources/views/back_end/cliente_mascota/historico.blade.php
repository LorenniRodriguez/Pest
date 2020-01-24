@extends('../layouts.backend')

@section('titulo', 'Histórico de Adopciones')

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
                                    <th>Adoptada Por</th>
                                    <th>Estatus</th>
                                    <th>Registrado Por</th>
                                    <th>Fecha Registro</th>
                                    <th>Concluida / Cancelada Por</th>
                                    <th>Fecha Conclusión</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cliente_mascotas as $cliente_mascota)
                                    <tr>
                                        <td>{{ $cliente_mascota->id_cliente_mascota }}</td>
                                        <td>{{ $cliente_mascota->mascota->nombre }}</td>
                                        <td>{{ $cliente_mascota->cliente->nombreCompleto ?? '' }}</td>
                                        <td>
                                            @if($cliente_mascota->estatus == 'I')
                                                <label class="badge badge-danger">Cancelada</label>
                                            @elseif($cliente_mascota->estatus == 'E')
                                                <label class="badge badge-info">Concluida</label>
                                            @else
                                                <label class="badge badge-success">¡Realizada!</label>
                                            @endif
                                        </td>
                                        <td>{{ $cliente_mascota->registradoPor->name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($cliente_mascota->fecha_registro)) }}</td>
                                         <td>

                                            @if($cliente_mascota->borrado_por != null)
                                                {{ $cliente_mascota->borradoPor->name }} 
                                            @else
                                                ·
                                            @endif
                                       </td>
                                       <td> {{ $cliente_mascota->fecha_conclusion}} </td> 
                                                                            
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