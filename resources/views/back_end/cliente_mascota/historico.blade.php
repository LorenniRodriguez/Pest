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
                                    <th>Adoptado Por</th>
                                    <th>Estatus</th>
                                    <th>Registrado Por</th>
                                    <th>Cancelada Por</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cliente_mascotas as $cliente_mascota)
                                    <tr>
                                        <td>{{ $cliente_mascota->id_cliente_mascota }}</td>
                                        <td>{{ $cliente_mascota->mascota->nombre }}</td>
                                        <td>{{ $cliente_mascota->cliente->nombres}}</td>
                                        <td>
                                            @if($cliente_mascota->estatus == 'I')
                                                <label class="badge badge-danger">Cancelada</label>
                                            @else
                                                <label class="badge badge-success">Realizada</label>
                                            @endif
                                        </td>
                                        <td>{{ $cliente_mascota->registradoPor->name}}</td>
                                         <td class="text-center">
                                            
                                            @if($cliente_mascota->borrado_por != null) 
                                                {{ $cliente_mascota->borradoPor->name }} 
                                            @else
                                                ·
                                            @endif
                                       </td>
                                        
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