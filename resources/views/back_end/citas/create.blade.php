@extends('../layouts.backend')

@section('titulo', 'Registrar Nueva Cita')

@section('content')
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Nueva Cita</h5>

                    <div class="errores mb-3">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <ul>
                                    <li class="text-danger">{{ $error }}</li>
                                </ul>
                            @endforeach
                        @endif
                    </div>

                    <form method="POST" action="{{ route('citas.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="id_mascota">Mascota: <span><strong class="text-danger">*</strong></span></label>
                            <select class="form-control" name="id_mascota" id="id_mascota" required="">
                                <option value="0">Seleccione la mascota...</option>
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id_mascota }}" @if(old('id_mascota') == $mascota->id_mascota) selected="" @endif>{{ $mascota->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_vacuna">Próxima Vacuna: <span><strong class="text-danger">*</strong></span></label>
                            <select class="form-control" name="id_vacuna" id="id_vacuna" required=""></select>
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

        $('#id_mascota').change(function (value) {

            if($('#id_mascota').val() > 0)
            {
                $.ajax({
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('citas.buscar_vacunas') }}',
                    data: { 'id_mascota': $('#id_mascota').val() },
                    success: function (response) {
                        var options = [];

                        for(var x = 0; x < response.length; x++)
                        {
                            options.push('<option value="', response[x].id_vacuna, '">', response[x].descripcion, '</option>');
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

    </script>

@endsection