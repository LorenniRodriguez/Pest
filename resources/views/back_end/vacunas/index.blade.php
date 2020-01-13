@extends('../layouts.backend')

@section('titulo', 'Vacunas Registradas')

@section('content')

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>¿Para Gatos?</th>
                                    <th>¿Para Perros?</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacunas as $vacuna)
                                    <tr>
                                        <td>{{ $vacuna->id_vacuna }}</td>
                                        <td>{{ $vacuna->descripcion }}</td>
                                        <td class="text-center">
                                            @if($vacuna->para_gatos == 1)
                                                <i class="fa fa-check text-success"></i>
                                            @else
                                                <i class="fa fa-close text-danger"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($vacuna->para_perros == 2)
                                                <i class="fa fa-check text-success"></i>
                                            @else
                                                <i class="fa fa-close text-danger"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="display: flex; justify-content: space-around;">
                                                <button type="button" class="btn btn-info btn-xs btn-rounded"
                                                        onclick="window.location = '{{ route('vacunas.edit', $vacuna->id_vacuna) }}'">
                                                    <i class="fa fa-pencil"></i>Editar
                                                </button>

                                                @if($vacuna->estatus == 'A')
                                                    <form method="POST" action="{{ route('vacunas.destroy', $vacuna->id_vacuna) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                            <i class="fa fa-trash"></i>Papelera
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('vacunas.restore', $vacuna->id_vacuna) }}">
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

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Nueva Vacuna</h5>

                    <form method="POST" action="{{ route('vacunas.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="descripcion">Nombre:</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" required="" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>¿Es aplicable a gatos?</label>
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="para_gatos" id="para_gatos1" value="1"> Sí
                                </label>
                            </div>

                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="para_gatos" id="para_gatos2" value="0" checked> No
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>¿Es aplicable a perros?</label>
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="para_perros" id="para_perros1" value="2"> Sí
                                </label>
                            </div>

                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="para_perros" id="para_perros2" value="0" checked> No
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@include('partials.datatable')