@extends('../layouts.backend')

@section('titulo', 'Editar País')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('paises.update', $pais->id_pais) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="descripcion">País: <span><strong class="text-danger">*</strong></span></label>
                            <input type="text" value="{{ $pais->descripcion }}" name="descripcion" id="descripcion" class="form-control" required="" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        <a href="{{ route('paises.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-mail-reply"></i>Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection