@extends('../layouts.backend')

@section('titulo', 'Servicios Registrados')

@section('content')
    @include('back_end._errores')

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Servicio</th>
                                    <th>Tipo Servicio</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $servicio)
                                    <tr>
                                        <td>{{ $servicio->id_servicio }}</td>
                                        <td>{{ $servicio->descripcion }}</td>
                                        <td>{{ $servicio->tipoServicio->descripcion }}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-around;">
                                                <button type="button" class="btn btn-info btn-xs btn-rounded"
                                                        onclick="window.location = '{{ route('servicios.edit', $servicio->id_servicio) }}'">
                                                    <i class="fa fa-pencil"></i>Editar
                                                </button>

                                                @if($servicio->estatus == 'A')
                                                    <form method="POST" action="{{ route('servicios.destroy', $servicio->id_servicio) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                            <i class="fa fa-trash"></i>Papelera
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('servicios.restore', $servicio->id_servicio) }}">
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
                    <h5 class="mb-4">Nuevo Servicio</h5>

                    <form method="POST" action="{{ route('servicios.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="servicio">Tipo de Servicio:</label>
                            <select class="form-control" name="id_tipo_servicio" id="id_tipo_servicio">
                                 @foreach($tipo_servicios as $tipo_servicio)
                                    <option value="{{ $tipo_servicio->id_tipo_servicio }}" @if($servicio->id_tipo_servicio == $tipo_servicio->id_tipo_servicio) selected="" @endif>{{ $tipo_servicio->descripcion }}  </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Servicio:</label>
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