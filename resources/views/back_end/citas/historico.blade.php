@extends('../layouts.backend')

@section('titulo', 'Histórico de Vacunación')

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
                                    <th>Vacuna</th>
                                    <th>Estatus</th>
                                    <th>Registrado Por</th>
                                    <th>Atendido Por</th>
                                    <th>Cancelada Por</th>
                                    <th>Cita</th>
                                    <th>Atendida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td>{{ $cita->id_cita }}</td>
                                        <td>{{ $cita->mascota->nombre }}</td>
                                        <td>{{ $cita->vacuna->descripcion }}</td>
                                        <td>
                                            @if($cita->estatus == 'I')
                                                <label class="badge badge-danger">Cancelada</label>
                                            @elseif($cita->fecha_atendida != null)
                                                <label class="badge badge-success">¡Atendida!</label>
                                            @else
                                                <label class="badge badge-warning">En Proceso</label>
                                            @endif
                                        </td>
                                        <td>{{ $cita->usuario->name }}</td>
                                        <td class="text-center">@if($cita->atendidoPor) {{ $cita->atendidoPor->name }} @else · @endif</td>
                                        <td class="text-center">@if($cita->borrado_por) {{ $cita->canceladaPor->name }} @else · @endif</td>
                                        <td>{{ $cita->fecha_cita }}</td>
                                        <td>{{ $cita->fecha_atendida }}</td>
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