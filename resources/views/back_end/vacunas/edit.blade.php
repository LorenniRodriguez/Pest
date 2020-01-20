@extends('../layouts.backend')

@section('titulo', 'Editar Vacuna')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('vacunas.update', $vacuna->id_vacuna) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="descripcion">Vacuna: <span><strong class="text-danger">*</strong></span></label>
                            <input type="text" value="{{ $vacuna->descripcion }}" name="descripcion" id="descripcion" class="form-control" required="" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>¿Es aplicable a gatos? <span><strong class="text-danger">*</strong></span></label>
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="para_gatos" id="para_gatos1" value="1" @if($vacuna->para_gatos == 1) checked="" @endif> Sí
                                </label>
                            </div>

                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="para_gatos" id="para_gatos2" value="0" @if($vacuna->para_gatos != 1) checked="" @endif> No
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>¿Es aplicable a perros? <span><strong class="text-danger">*</strong></span></label>
                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="para_perros" id="para_perros1" value="2" @if($vacuna->para_perros == 2) checked="" @endif> Sí
                                </label>
                            </div>

                            <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="para_perros" id="para_perros2" value="0" @if($vacuna->para_perros != 2) checked="" @endif> No
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Guardar</button>
                        <a href="{{ route('vacunas.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-mail-reply"></i>Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection