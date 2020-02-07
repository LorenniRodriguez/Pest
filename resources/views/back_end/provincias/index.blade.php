@extends('../layouts.backend')

@section('titulo', 'Provincias Registrados')

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
                                    <th>Provincia</th>
                                    <th>País</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($provincias as $provincia)
                                    <tr>
                                        <td>{{ $provincia->id_provincia }}</td>
                                        <td>{{ $provincia->descripcion }}</td>
                                        <td>{{ $provincia->pais->descripcion }}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-around;">
                                                <button type="button" class="btn btn-info btn-xs btn-rounded"
                                                        onclick="window.location = '{{ route('provincias.edit', $provincia->id_provincia) }}'">
                                                    <i class="fa fa-pencil"></i>Editar
                                                </button>

                                                @if($provincia->estatus == 'A')
                                                    <form method="POST" action="{{ route('provincias.destroy', $provincia->id_provincia) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                            <i class="fa fa-trash"></i>Papelera
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('provincias.restore', $provincia->id_provincia) }}">
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
                    <h5 class="mb-4">Nueva Provincia</h5>

                    <form method="POST" action="{{ route('provincias.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="pais">País:</label>
                            <select class="form-control select2" name="id_pais" id="id_pais">
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id_pais }}" @if($provincia->id_pais == $pais->id_pais) selected="" @endif>{{ $pais->descripcion }}</option>
                                @endforeach
                            </select>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Provincia:</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" required="" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('partials.datatable')