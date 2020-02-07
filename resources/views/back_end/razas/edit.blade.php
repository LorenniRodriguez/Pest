@extends('../layouts.backend')

@section('titulo', 'Editar Raza')

@section('content')
    @include('back_end._errores')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('razas.update', $raza->id_raza) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="descripcion">Raza: <span><strong class="text-danger">*</strong></span></label>
                            <input type="text" value="{{ $raza->descripcion }}" name="descripcion" id="descripcion" class="form-control" required="" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Guardar</button>
                        <a href="{{ route('razas.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-mail-reply"></i>Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection