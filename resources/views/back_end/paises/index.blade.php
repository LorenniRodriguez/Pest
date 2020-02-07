@extends('../layouts.backend')

@section('titulo', 'Países Registrados')

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
                                    <th>País</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paises as $pais)
                                    <tr>
                                        <td>{{ $pais->id_pais }}</td>
                                        <td>{{ $pais->descripcion }}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-around;">
                                                <button type="button" class="btn btn-info btn-xs btn-rounded"
                                                        onclick="window.location = '{{ route('paises.edit', $pais->id_pais) }}'">
                                                    <i class="fa fa-pencil"></i>Editar
                                                </button>

                                                @if($pais->estatus == 'A')
                                                    <form method="POST" action="{{ route('paises.destroy', $pais->id_pais) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                            <i class="fa fa-trash"></i>Papelera
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('paises.restore', $pais->id_pais) }}">
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
                    <h5 class="mb-4">Nuevo País</h5>

                    <form method="POST" action="{{ route('paises.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="descripcion">País: <span><strong class="text-danger">*</strong></span></label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" required="" autocomplete="off"  value="{{ old ('descripcion') }}">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('partials.datatable')