@extends('../layouts.backend')

@section('titulo', 'Agendar Próxima Vacunación')

@section('content')
    @include('back_end._errores')
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Nueva Vacunación</h5>

                    

                    <form method="POST" action="{{ route('vacunacion.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="id_mascota">Mascota: <span><strong class="text-danger">*</strong></span></label>
                            <select class="form-control select2" name="id_mascota" id="id_mascota" required="">
                                <option value="">Seleccione la mascota...</option>
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id_mascota }}" @if(old('id_mascota') == $mascota->id_mascota) selected="" @endif>
                                        {{ $mascota->adoptadaPor[0]->cliente->nombreCompleto ?? 'Veterinaria' }} | {{ $mascota->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_vacuna">Próxima Vacuna: <span><strong class="text-danger">*</strong></span></label>
                            <select class="form-control select2" name="id_vacuna" id="id_vacuna" required=""></select>
                        </div>

                        <div class="form-group">
                            <label for="fecha_cita">Fecha Cita: <span><strong class="text-danger">*</strong></span></label>
                            <input type="date" class="form-control" name="fecha_cita" id="fecha_cita" value="{{ old('fecha_cita') }}" required="" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    
    <script type="text/javascript">

        $(document).ready(function () {

            $('#id_mascota').change(function (value) {

                if($('#id_mascota').val() > 0)
                {
                    $.ajax({
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        url: '{{ route('vacunacion.buscar_vacunas') }}',
                        data: { 'id_mascota': $('#id_mascota').val() },
                        success: function (response) {
                            var options = [];

                            if(response.length > 0)
                            {
                                for(var x = 0; x < response.length; x++)
                                {
                                    let id_vacuna_old = `{{ old('id_vacuna') }}`;
                                    let is_selected;

                                    if(id_vacuna_old == response[x].id_vacuna)
                                        is_selected = 'selected=""';
                                    else
                                        is_selected = '';

                                    options.push('<option '+ is_selected +' value="', response[x].id_vacuna, '">', response[x].descripcion, '</option>');
                                }
                            }

                            else
                            {
                                var options = [];
                                options.push('<option value="">', 'No hay vacunas que aplicar', '</option>');
                            }

                            $("#id_vacuna").html(options.join(''));
                        }
                    });
                }

                else
                    $("#id_vacuna").html('');
            });

            // disparo el evento on change sobre el select de mascotas
            $('#id_mascota').trigger('change');
        });

    </script>

@endsection