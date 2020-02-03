@extends('../layouts.backend')

@section('titulo', 'Mascotas Registradas')

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
                                    <th>Tipo Mascota</th>
                                    <th>Raza</th>
                                    <th>Peso</th>
                                    <th>Fecha Registro</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mascotas as $mascota)
                                    <tr>
                                        <td>{{ $mascota->adoptadaPor[0]->cliente->nombreCompleto ?? 'Veterinaria' }}</td>
                                        <td>{{ $mascota->nombre }}</td>
                                        <td>{{ $mascota->tipoMascota->descripcion }}</td>
                                        <td>{{ $mascota->raza->descripcion }}</td>
                                        <td>{{ $mascota->peso }}</td>
                                        <td>{{ date('d-m-Y', strtotime($mascota->fecha_registro)) }}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-around;">
                                                <button type="button" class="btn btn-info btn-xs btn-rounded"
                                                        onclick="window.location = '{{ route('mascotas.edit', $mascota->id_mascota) }}'">
                                                    <i class="fa fa-pencil"></i>Editar
                                                </button>

                                                @if($mascota->estatus == 'A')
                                                    <form method="POST" action="{{ route('mascotas.destroy', $mascota->id_mascota) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                            <i class="fa fa-trash"></i>Papelera
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('mascotas.restore', $mascota->id_mascota) }}">
                                                        @csrf

                                                        <button type="submit" class="btn btn-success btn-xs btn-rounded">
                                                            <i class="fa fa-undo"></i>Habilitar
                                                        </button>
                                                    </form>
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