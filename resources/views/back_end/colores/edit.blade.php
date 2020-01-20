@extends('../layouts.backend')

@section('titulo', 'Editar Color')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('colores.update', $color->id_color) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="descripcion">Color: <span><strong class="text-danger">*</strong></span></label>
                            <input type="text" value="{{ $color->descripcion }}" name="descripcion" id="descripcion" class="form-control" required="" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Guardar</button>
                        <a href="{{ route('colores.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-mail-reply"></i>Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection