@extends('../layouts.backend')

@section('titulo', 'Dashboard')

@section('content')

	<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card" onclick="document.location.href='{{ route('mascotas.index') }}'" style="cursor: pointer;">
			<div class="card card-statistics">
				<div class="card-body">
					<div class="clearfix">
						<div class="float-left">
							<i class="mdi mdi-cat text-danger icon-lg"></i>
						</div>
						<div class="float-right">
							<p class="mb-0 text-right">Mascotas</p>
							<div class="fluid-container">
								<h3 class="font-weight-medium text-right mb-0">{{ $mascotas }}</h3>
							</div>
						</div>
					</div>
					<p class="text-muted mt-3 mb-0" style="color: #999 !important;">
						<i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Mascotas activas
					</p>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card" onclick="document.location.href='{{ route('clientes.index') }}'" style="cursor: pointer;">
			<div class="card card-statistics">
				<div class="card-body">
					<div class="clearfix">
						<div class="float-left">
							<i class="mdi mdi-account text-warning icon-lg"></i>
						</div>
						<div class="float-right">
							<p class="mb-0 text-right">Clientes</p>
							<div class="fluid-container">
								<h3 class="font-weight-medium text-right mb-0">{{ $clientes }}</h3>
							</div>
						</div>
					</div>
					<p class="text-muted mt-3 mb-0" style="color: #999 !important;">
						<i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Clientes activos
					</p>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card" onclick="document.location.href='{{ route('hospedajes.index') }}'" style="cursor: pointer;">
			<div class="card card-statistics">
				<div class="card-body">
					<div class="clearfix">
						<div class="float-left">
							<i class="mdi mdi-home-heart text-success icon-lg"></i>
						</div>
						<div class="float-right">
							<p class="mb-0 text-right">Hospedajes</p>
							<div class="fluid-container">
								<h3 class="font-weight-medium text-right mb-0"> {{ $hospedajes }}</h3>
							</div>
						</div>
					</div>
					<p class="text-muted mt-3 mb-0" style="color: #999 !important;">
						<i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Hospedajes en curso
					</p>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card" onclick="document.location.href='{{ route('vacunacion.index') }}'" style="cursor: pointer;">
			<div class="card card-statistics">
				<div class="card-body">
					<div class="clearfix">
						<div class="float-left">
							<i class="mdi mdi-calendar-range text-info icon-lg"></i>
						</div>
						<div class="float-right">
							<p class="mb-0 text-right">Vacunaciones</p>
							<div class="fluid-container">
								<h3 class="font-weight-medium text-right mb-0">{{ $citas }}</h3>
							</div>
						</div>
					</div>
					<p class="text-muted mt-3 mb-0" style="color: #999 !important;">
						<i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Próximas vacunaciones
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                	<h4 class="card-title">¡Vacunaciones Se Aproximan! <i class="mdi mdi-cat text-danger"></i></h4>
                    <div class="table-responsive">
                        <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Dueño</th>
                                    <th>Mascota</th>
                                    <th>Vacuna</th>
                                    <th>Fecha Cita</th>
                                    <th>Faltan</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas_pendientes as $cita)
                                	@if($cita->dias_restantes >= 0 && $cita->dias_restantes <= 3)
	                                    <tr>
	                                    	<td>{{ $cita->mascota->adoptadaPor[0]->cliente->nombreCompleto ?? '' }}</td>
	                                        <td>{{ $cita->mascota->nombre }}</td>
	                                        <td>{{ $cita->vacuna->descripcion }}</td>
	                                        <td>{{ $cita->fecha_cita }}</td>
	                                        <td><label class="badge badge-success">{{ str_replace('+', '', substr($cita->dias_restantes, 1, 1)) }} día(s)</label></td>
	                                        <td>
	                                            <div style="display: flex; justify-content: space-around;">
	                                                <a href="" class=""></a>
	                                                <form method="POST" action="{{ route('mascota_vacuna.aplicar_vacuna') }}">
	                                                    @csrf

	                                                    <input type="hidden" name="id_mascota" value="{{ $cita->id_mascota }}">
	                                                    <input type="hidden" name="id_vacuna" value="{{ $cita->id_vacuna }}">
	                                                    <input type="hidden" name="id_cita" value="{{ $cita->id_cita }}">

	                                                    <button type="submit" class="btn btn-info btn-xs btn-rounded">
	                                                        <i class="fa fa-location-arrow"></i>¡Atender!
	                                                    </button>
	                                                </form>

	                                                @if(Auth::user()->user_type == 'A' || $cita->id_usuario == Auth::user()->id)
	                                                    @if($cita->estatus == 'A')
	                                                        <form method="POST" action="{{ route('vacunacion.destroy', $cita->id_cita) }}">
	                                                            @csrf
	                                                            @method('DELETE')

	                                                            <button type="submit" class="btn btn-danger btn-xs btn-rounded">
	                                                                <i class="fa fa-exclamation-triangle"></i>Anular
	                                                            </button>
	                                                        </form>
	                                                    @endif
	                                                @endif
	                                            </div>
	                                        </td>
	                                    </tr>
	                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 grid-margin stretch-card">
        	<div class="card">
	        	<div class="card-body">
	        		<h4 class="card-title">¡Vacunas Aplicadas En Este Día! <i class="mdi mdi-needle text-info"></i></h4>
	        		<dl>
	        			@foreach($vacunas as $vacuna)
	        				<dt>{{ $vacuna->vacuna }}</dt>
						  	<dd>{{ $vacuna->cantidad }}</dd>
						@endforeach
					</dl>
	        	</div>
	        </div>
        </div>

        <div class="col-lg-9 grid-margin stretch-card">
	        <div class="card">
	            <div class="card-body">
	            	<h4 class="card-title">¡Ya Casi Vienen Sus Dueños! <i class="mdi mdi-paw"></i></h4>
	                <div class="table-responsive">
	                    <table class="table table-hover data-table" cellspacing="0" style="width: 100%;" width="100%">
	                        <thead class="bg-primary text-white">
	                            <tr>
	                            	<th>Dueño</th>
	                                <th>Mascota</th>
	                                <th>Jaula</th>
	                                <th>Fecha Final</th>
	                                <th>Faltan</th>
	                                <th class="text-center">Acciones</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            @foreach ($hospedajes_pendientes as $hospedaje)
	                                @if($hospedaje->dias_restantes >= 0 && $hospedaje->dias_restantes <= 3)
		                                <tr>
		                                	<td>{{ $hospedaje->mascota->adoptadaPor[0]->cliente->nombreCompleto ?? '' }}</td>
		                                    <td>{{ $hospedaje->mascota->nombre }}</td>
		                                    <td>{{ $hospedaje->jaula->descripcion }}</td>                                 
		                                    <td>{{ $hospedaje->fecha_final }}</td>
		                                    <td>
		                                            @if($hospedaje->dias_restantes > 0)
		                                                <label class="badge badge-success">{{ str_replace('+', '', substr($hospedaje->dias_restantes, 1, 1)) }} día(s)</label>
		                                            @elseif($hospedaje->dias_restantes < 0)
		                                                <label class="badge badge-danger">@php echo ((int) $hospedaje->dias_restantes * -1) . ' día(s)' @endphp</label>
		                                            @else
                                                		<label class="badge badge-primary">¡Es hoy!</label>
		                                            @endif
		                                        </td>
		                                    <td>
		                                        <div style="display: flex; justify-content: space-around;">
		                                            <a href="" class=""></a>

		                                             <form method="POST" action="{{ route('hospedajes.update', $hospedaje->id_hospedaje) }}">
		                                                @csrf
		                                                @method('PUT')

		                                                <button type="submit" class="btn btn-info btn-xs btn-rounded">
		                                                    <i class="fa fa-location-arrow"></i>¡Finalizar!
		                                                </button>
		                                            </form>
		                   
		                                            @if(Auth::user()->user_type == 'A' || $hospedaje->id_usuario == Auth::user()->id)
		                                                @if($hospedaje->estatus == 'A')
		                                                    <form method="POST" action="{{ route('hospedajes.destroy', $hospedaje->id_hospedaje) }}">
		                                                        @csrf
		                                                        @method('DELETE')

		                                                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
		                                                            <i class="fa fa-exclamation-triangle"></i>Anular
		                                                        </button>
		                                                    </form>
		                                                @endif
		                                            @endif
		                                        </div>
		                                    </td>                  
		                                </tr>
		                            @endif
	                            @endforeach
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>

	    <div class="col-lg-3 grid-margin stretch-card">
        	<div class="card">
	        	<div class="card-body">
	        		<h4 class="card-title">¡Servicios Aplicados En Este Día! <i class="mdi mdi-heart text-info"></i></h4>
	        		<dl>
	        			@foreach($servicios as $servicio)
	        				<dt>{{ $servicio->servicio }}</dt>
						  	<dd>{{ $servicio->cantidad }}</dd>
						@endforeach
					</dl>
	        	</div>
	        </div>
        </div>
	</div>

	<div class="row">
		<div class="col-md-6 grid-margin">
			<div class="row">
				<div class="card col-md-12 mb-4">
					<div class="card-body">
						<h4 class="card-title">Adopciones Realizadas</h4>
						<canvas id="cant_adopciones" width="900" height="350"></canvas>
					</div>
				</div>

				<div class="card col-md-12">
					<div class="card-body">
						<h4 class="card-title">Hospedajes Efectuados</h4>
						<canvas id="cant_hospedajes" width="900" height="350"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Origen De Las Mascotas Registradas</h4>
					<canvas id="cant_adopciones_tipo" width="700" height="500"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-7 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Hospedajes Que Excedieron La Fecha de Entrega</h4>
					<canvas id="cant_hospedajes_tardios" width="630" height="305"></canvas>
				</div>
			</div>
		</div>

		<div class="col-md-5 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Clientes Registrados</h4>
					<canvas id="cant_clientes" width="700" height="500"></canvas>
				</div>
			</div>
		</div>

		<div class="col-md-6 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Clientes Por Género</h4>
					<canvas id="cant_clientes_genero" width="700" height="500"></canvas>
				</div>
			</div>
		</div>

		<div class="col-md-6 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Origen De Los Clientes Registrados</h4>
					<canvas id="cant_clientes_pais" width="700" height="500"></canvas>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('css')

	<link rel="stylesheet" type="text/css" href="{{ asset('back_end/vendors/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">

    <style type="text/css">
        .table td { padding: 10px !important; }
        .table th { padding: 15px !important; }
        div.dataTables_wrapper div.dataTables_length label { font-size: 12px !important; }
    </style>

@endsection

@section('js')

	<script src="{{ asset('back_end/vendors/chart.js/Chart.bundle.min.js') }}"></script>
	<script type="text/javascript">
		
		// adopciones por año
		var cant_adopciones = @json($cant_adopciones);
		new Chart(document.getElementById("cant_adopciones"), {
			type: 'horizontalBar',
			data: {
				labels: cant_adopciones.labels,
				datasets: [
					{
						label: "",
						backgroundColor: ["#FE2E2E", "#04B4AE", "#01DFA5"],
						data: cant_adopciones.values
					}
				]
			},
			options: {
				legend: { display: false },
				scales: {
					xAxes: [{
						ticks: {
							min: 0,
							stepSize: 1
						}
					}],
					yAxes: [{
						barThickness: 30,  // indica el ancho de las barras en px
                		maxBarThickness: 45 // indica el max. del ancho de las barras en px
				  	}]
				}
			}
		});

		// hospedajes por año
		var cant_hospedajes = @json($cant_hospedajes);
		new Chart(document.getElementById("cant_hospedajes"), {
			type: 'horizontalBar',
			data: {
				labels: cant_hospedajes.labels,
				datasets: [
					{
						label: "",
						backgroundColor: ["#FA5882", "#FA8258", "#0B3B39"],
						data: cant_hospedajes.values
					}
				]
			},
			options: {
				legend: { display: false },
				scales: {
					xAxes: [{
						ticks: {
							min: 0,
							stepSize: 1
						}
					}],
					yAxes: [{
						barThickness: 30,  // indica el ancho de las barras en px
                		maxBarThickness: 45 // indica el max. del ancho de las barras en px
				  	}]
				}
			}
		});

		// hospedajes tardios
		var cant_hospedajes_tardios = @json($cant_hospedajes_tardios);
		new Chart(document.getElementById("cant_hospedajes_tardios"), {
			type: 'line',
			data: {
				labels: cant_hospedajes_tardios.labels,
				datasets: [{
					label: "Hospedajes",
					borderColor: '#01DF74',
					data: cant_hospedajes_tardios.values,
					fill: false
				}]
			},
			options: {
				legend: { display: false },
				title: {
					display: true,
					text: 'Cantidad de Hospedajes Anuales'
				},
				scales: {
					yAxes: [{
						ticks: {
							min: 0,
							stepSize: 1
						}
					}]
				}
			}
		});

		// cantidad de clientes
		var cant_clientes = @json($cant_clientes);
		new Chart(document.getElementById("cant_clientes"), {
			type: 'bar',
			data: {
				labels: cant_clientes.labels,
				datasets: [{
					backgroundColor: ["#e8c3b9", "#9FF781", "#088A4B", "#AEB404", "#e8c3b9", "#DF013A"],
					data: cant_clientes.values
				}]
			},
			options: {
				legend: { display: false },
				title: {
					display: true,
					text: 'Clientes Obtenidos Anualmente'
				},
				scales: {
					yAxes: [{
						ticks: {
							min: 0,
							stepSize: 1
						}
					}],
					xAxes: [{
						barThickness: 45,  // indica el ancho de las barras en px
                		maxBarThickness: 60 // indica el max. del ancho de las barras en px
				  	}]
				}
			}
		});

		// cantidad de clientes por genero
		var cant_clientes_genero = @json($cant_clientes_genero);
		new Chart(document.getElementById("cant_clientes_genero"), {
			type: 'pie',
			data: {
				labels: cant_clientes_genero.labels,
				datasets: [{
					backgroundColor: ["#A9F5D0", "#F79F81", "#A9F5A9"],
					data: cant_clientes_genero.values
				}]
			},
			options: {
				title: {
					display: true,
					text: 'Servicios Realizados'
				}
			}
		});

		// cantidad de clientes por genero
		var cant_adopciones_tipo = @json($cant_adopciones_tipo);
		new Chart(document.getElementById("cant_adopciones_tipo"), {
			type: 'pie',
			data: {
				labels: cant_adopciones_tipo.labels,
				datasets: [{
					backgroundColor: ["#0080FF", "#086A87"],
					data: cant_adopciones_tipo.values
				}]
			},
			options: {
				title: {
					display: true,
					text: 'Adopciones'
				}
			}
		});

		// clientes por provincia
		var cant_clientes_pais = @json($cant_clientes_pais);
		new Chart(document.getElementById("cant_clientes_pais"), {
			type: 'doughnut',
			data: {
				labels: cant_clientes_pais.labels,
				datasets: [
					{
						label: "Clientes",
						backgroundColor: ["#04B486", "#FA8258", "#088A85", "#01A9DB", "#DF7401", "#3cba9f", "#e8c3b9", "#c45850"],
						data: cant_clientes_pais.values
					}
				]
			},
			options: {
				title: {
					display: true,
					text: 'Países'
				}
			}
		});
	</script>

	<script type="text/javascript" src="{{ asset('back_end/vendors/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('back_end/vendors/datatables.net-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript">
        var spanish = {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay datos registrados en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero"
                , "sLast": "Último"
                , "sNext": "Siguiente"
                , "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }

        $(function() {
            $('.data-table').DataTable({
                "stateSave": true, // guarda el estado del DT al actualizar
                "info": false, // oculta la info. de la tabla
                "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "Todo"]],
                "iDisplayLength": 5,
                "language": spanish
                //"scrollY": "45vh", // para usar una determinada parte del espacio del viewport
                //"paging": false, // oculta la paginacion
                // "ordering": true // para habilitar el ordenamiento
            });
            
            $('.data-table').each(function() {
                var datatable = $(this);

                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Buscar en toda la tabla...');
                search_input.removeClass('form-control-sm');
                
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                //length_sel.removeClass('form-control-sm');
            });
        });
   </script>

@endsection