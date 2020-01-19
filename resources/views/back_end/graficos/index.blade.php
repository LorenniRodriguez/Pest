@extends('../layouts.backend')

@section('titulo', 'Gráficos')
@section('subtitulo', '(¡Toma  mejores decisiones!)')


@section('content')

<div class="row">
	<div class="col-md-6 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Servicios Realizados</h5>
				<div class="cant_servicios">
					<canvas id="cant_servicios" width="800" height="450"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Servicios Realizados Por Empleado</h5>
				<div class="cant_servicios_empleado">
					<canvas id="cant_servicios_empleado" width="800" height="450"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 mb-4 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Servicios Realizados Por Tipo</h5>

				<div>
					<form>
						<div class="form-group mb-0">
							<select class="form-control form-control-sm col-sm-1" name="year_servicios" id="year_servicios">
								<option value="0" selected="">Año...</option>
								@foreach($years_servicios as $year)
									<option value="{{ $year }}">{{ $year }}</option>
								@endforeach
							</select>
						</div>
					</form>
				</div>

				<div class="cant_servicios_tipo">
					<canvas id="cant_servicios_tipo" width="800" height="250"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 mb-4 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Adopciones Realizadas Por Meses</h5>

				<div>
					<form>
						<div class="form-group mb-0">
							<select class="form-control form-control-sm col-sm-1" name="years_adopciones" id="year_adopciones">
								<option value="0" selected="">Año...</option>
								@foreach($years_adopciones as $year)
									<option value="{{ $year }}">{{ $year }}</option>
								@endforeach
							</select>
						</div>
					</form>
				</div>

				<div class="cant_adopciones">
					<canvas id="cant_adopciones" width="800" height="250"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 mb-4 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Adopciones Realizadas Por Tipo de Mascota</h5>

				<div>
					<form>
						<div class="form-group mb-0">
							<select class="form-control form-control-sm col-sm-1" name="years_adopciones_tipo" id="year_adopciones_tipo">
								<option value="0" selected="">Año...</option>
								@foreach($years_adopciones as $year)
									<option value="{{ $year }}">{{ $year }}</option>
								@endforeach
							</select>
						</div>
					</form>
				</div>

				<div class="cant_adopciones_tipo_mascota">
					<canvas id="cant_adopciones_tipo_mascota" width="800" height="250"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Adopciones Realizadas Por Raza</h5>
				<div class="cant_adopciones_raza">
					<canvas id="cant_adopciones_raza" width="800" height="450"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Adopciones Por Cliente</h5>
				<div class="cant_adopciones_cliente">
					<canvas id="cant_adopciones_cliente" width="800" height="450"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 mb-4 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Vacunas Aplicadas</h5>
				{{-- <div>
					<form>
						<div class="form-group mb-0">
							<select class="form-control form-control-sm col-sm-1" name="year_vacunas" id="year_vacunas">
								<option value="0" selected="">Año...</option>
								@foreach($years_vacunas as $year)
									<option value="{{ $year }}">{{ $year }}</option>
								@endforeach
							</select>
						</div>
					</form>
				</div> --}}

				<div class="cant_vacunas">
					<canvas id="cant_vacunas" width="800" height="250"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Hospedajes Por Tamaño de Mascota</h5>
				<div class="cant_hospedajes_size">
					<canvas id="cant_hospedajes_size" width="800" height="450"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Hospedajes Por Raza</h5>
				<div class="cant_hospedajes_cliente">
					<canvas id="cant_hospedajes_cliente" width="800" height="450"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 mb-4 mb-4">
		<div class="card">
            <div class="card-body">
				<h5>Cantidad de Hospedajes Realizados Por Meses</h5>

				<div>
					<form>
						<div class="form-group mb-0">
							<select class="form-control form-control-sm col-sm-1" name="years_hospedajes" id="year_hospedajes">
								<option value="0" selected="">Año...</option>
								@foreach($years_hospedajes as $year)
									<option value="{{ $year }}">{{ $year }}</option>
								@endforeach
							</select>
						</div>
					</form>
				</div>

				<div class="cant_hospedaje_mes">
					<canvas id="cant_hospedaje_mes" width="800" height="250"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('js')

	<script src="{{ asset('back_end/vendors/chart.js/Chart.bundle.min.js') }}"></script>

	<script>
		// 1 - cantidad de adopciones por meses
		var cant_adopciones = function (cant_adopciones) {
			if(cant_adopciones != null)
			{
				new Chart(document.getElementById("cant_adopciones"), {
					type: 'line',
					data: {
						labels: cant_adopciones.labels,
						datasets: [{
							label: "Adopciones",
							borderColor: '#00695C' /*['#0277BD', '#FF5722', '#607D8B', '#00695C', '#D84315', '#4E342E', '#FF8F00', '#0091EA', '#d50000', '#00BFA5', '#FFD600', '#4DD0E1']*/,
							data: cant_adopciones.values,
							fill: false
						}]
					},
					options: {
						legend: { display: false },
						title: {
							display: true,
							text: 'Cantidad de Adopciones Registradas '
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
			}

			else
				alert('No existen datos para el año consultado.');
		}

		cant_adopciones(@json($cant_adopciones));

		// 2 - cantidad de servicios realizados
		var cant_servicios = @json($cant_servicios);

		new Chart(document.getElementById("cant_servicios"), {
			type: 'pie',
			data: {
				labels: cant_servicios.labels,
				datasets: [{
					backgroundColor: ["#084B8A", "#e8c3b9", "#DF013A", "#DF7401", "#AEB404", "#088A4B", "#0431B4"],
					data: cant_servicios.values
				}]
			},
			options: {
				title: {
					display: true,
					text: 'Servicios Realizados'
				}
			}
		});

		// 3 - cantidad de adopciones realizadas por tipo de mascota (por meses)
		var cant_adopciones_tipo_mascota = function (cant_adopciones) {
			if(cant_adopciones != null)
			{
				let cant_adopciones_tp = new Chart(document.getElementById("cant_adopciones_tipo_mascota"), {
					type: 'bar',
					data: {
						labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
						datasets: []
					},
					options: {
						title: {
							display: true,
							text: 'Tipos de Mascotas'
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

				for(var x = cant_adopciones.length - 1; x >= 0; x--)
				{
					cant_adopciones_tp.data.datasets.push({
						label: cant_adopciones[x].label,
						backgroundColor: "#FE642E",
						data: cant_adopciones[x].values
					});
				}

				// actualiza el gráfico
				cant_adopciones_tp.update();
			}

			else
				alert('No existen datos para el año consultado.');
		}

		cant_adopciones_tipo_mascota(@json($cant_adopciones_tipo_mascota));

		// 4 - cantidad de adopciones agrupados por raza
		var cant_servicios_tipo = function (cant_servicios) {
			if(cant_servicios != null)
			{
				let cant_servicios_tp = new Chart(document.getElementById("cant_servicios_tipo"), {
					type: 'bar',
					data: {
						labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
						datasets: []
					},
					options: {
						title: {
							display: true,
							text: 'Servicios Realizados'
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

				for(var x = cant_servicios.length - 1; x >= 0; x--)
				{
					cant_servicios_tp.data.datasets.push({
						label: cant_servicios[x].label,
						backgroundColor: "#0174DF",
						data: cant_servicios[x].values
					});
				}

				// actualiza el gráfico
				cant_servicios_tp.update();
			}

			else
				alert('No existen datos para el año consultado.');
		}

		cant_servicios_tipo(@json($cant_servicio_tipo));

		// 5 - cantidad de servicios realizados
		var cant_adopciones_raza = @json($cant_adopciones_raza);

		new Chart(document.getElementById("cant_adopciones_raza"), {
			type: 'pie',
			data: {
				labels: cant_adopciones_raza.labels,
				datasets: [{
					backgroundColor: ["#DF7401", "#FA5858", "#084B8A", "#01A9DB", "#DF013A", "#AEB404", "#e8c3b9", "#088A4B"],
					data: cant_adopciones_raza.values
				}]
			},
			options: {
				title: {
					display: true,
					text: 'Razas'
				}
			}
		});

		// 6 - cantidad de servicios atentidos y registrados por empleados
		var cant_servicios_empleado = @json($cant_servicios_empleado);

		new Chart(document.getElementById("cant_servicios_empleado"), {
			type: 'bar',
			data: {
				labels: cant_servicios_empleado.labels,
				datasets: [{
					backgroundColor: ["#DF013A", "#AEB404", "#e8c3b9", "#DF013A", "#DF7401", "#AEB404", "#e8c3b9", "#088A4B"],
					data: cant_servicios_empleado.values
				}]
			},
			options: {
				legend: { display: false },
				title: {
					display: true,
					text: 'Empleados'
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

		// 7 - cantidad de mascotas hospedadas por su tamaño
		var cant_hospedajes_size = @json($cant_hospedajes_size);

		new Chart(document.getElementById("cant_hospedajes_size"), {
			type: 'doughnut',
			data: {
				labels: cant_hospedajes_size.labels,
				datasets: [
					{
						label: "Hospedaje",
						backgroundColor: ["#3e95cd", "#3cba9f", "#e8c3b9", "#c45850"],
						data: cant_hospedajes_size.values
					}
				]
			},
			options: {
				title: {
					display: true,
					text: 'Tamaños de Mascotas'
				}
			}
		});

		// 8 - cantidad de vacunas aplicadas por meses
		var cant_vacunas = function (cant_vacunas) {
			if(cant_vacunas != null)
			{
				new Chart(document.getElementById("cant_vacunas"), {
					type: 'line',
					data: {
						labels: cant_vacunas.labels,
						datasets: [{
							label: "Vacunas",
							backgroundColor: ['#0277BD', '#FF5722', '#607D8B', '#00695C', '#D84315', '#4E342E', '#FF8F00', '#0091EA', '#d50000', '#00BFA5', '#FFD600', '#4DD0E1'],
							data: cant_vacunas.values,
							fill: false
						}]
					},
					options: {
						legend: { display: false },
						title: {
							display: true,
							text: 'Vacunas Aplicadas'
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
			}

			else
				alert('No existen datos para el año consultado.');
		}

		cant_vacunas(@json($cant_vacunas));

		// 9 - clientes que mas han realizados adopciones
		var cant_adopciones_cliente = @json($cant_adopciones_cliente);

		new Chart(document.getElementById("cant_adopciones_cliente"), {
			type: 'doughnut',
			data: {
				labels: cant_adopciones_cliente.labels,
				datasets: [
					{
						label: "Cliente",
						backgroundColor: ["#0080FF", "#FE2E64", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "013ADF", "0489B1", "AEB404", "FF4000"],
						data: cant_adopciones_cliente.values
					}
				]
			},
			options: {
				title: {
					display: true,
					text: 'Clientes'
				}
			}
		});

		// 10 - clientes que mas han realizado hospedajes
		var cant_hospedajes_cliente = @json($cant_hospedaje_cliente);

		new Chart(document.getElementById("cant_hospedajes_cliente"), {
			type: 'pie',
			data: {
				labels: cant_hospedajes_cliente.labels,
				datasets: [{
					backgroundColor: ["#F5A9BC", "#FA5858", "#D0FA58", "#DF013A", "#AEB404", "#e8c3b9", "#088A4B"],
					data: cant_hospedajes_cliente.values
				}]
			},
			options: {
				title: {
					display: true,
					text: 'Clientes'
				}
			}
		});

		// 11 - cantidad de hospedajes por meses
		var cant_hospedaje_mes = function (cant_hospedaje_mes) {
			if(cant_hospedaje_mes != null)
			{
				new Chart(document.getElementById("cant_hospedaje_mes"), {
					type: 'line',
					data: {
						labels: cant_hospedaje_mes.labels,
						datasets: [{
							label: "Hospedajes",
							backgroundColor: ['#0277BD', '#FF5722', '#607D8B', '#00695C', '#D84315', '#4E342E', '#FF8F00', '#0091EA', '#d50000', '#00BFA5', '#FFD600', '#4DD0E1'],
							data: cant_hospedaje_mes.values,
							fill: false
						}]
					},
					options: {
						legend: { display: false },
						title: {
							display: true,
							text: 'Cantidad de Hospedajes Realizados'
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
			}

			else
				alert('No existen datos para el año consultado.');
		}

		cant_hospedaje_mes(@json($cant_hospedaje_mes));

		// consulta AJAX
		$('#year_servicios, #year_adopciones, #year_adopciones_tipo, #year_hospedajes').change(function ($this) {

			let element = $this.target.id;
			let yyear = $('#' + element).val();

			if(yyear == 0)
			{
				alert('Selecciona un año válido para continuar...');
				return 0;
			}

			// petición AJAX
			$.ajax({
	        	type: 'POST',
	        	headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	        	url: `{{ route('graficos.consultar') }}`,
	        	data: { 'year': yyear, 'element': element },
	        	success: function (response) {

	        		console.log(response);

	        		if(element == 'year_servicios')
					{
						// removiendo el lienzo para generar un nuevo gráfico
				        $("canvas#cant_servicios_tipo").remove();
						$("div.cant_servicios_tipo").append('<canvas id="cant_servicios_tipo" width="800" height="250"></canvas>');
						cant_servicios_tipo(response.data);
					}

					if(element == 'year_adopciones')
					{
						// removiendo el lienzo para generar un nuevo gráfico
				        $("canvas#cant_adopciones").remove();
						$("div.cant_adopciones").append('<canvas id="cant_adopciones" width="800" height="250"></canvas>');
						cant_adopciones(response.data);
					}

					if(element == 'year_adopciones_tipo')
					{
						// removiendo el lienzo para generar un nuevo gráfico
				        $("canvas#cant_adopciones_tipo_mascota").remove();
						$("div.cant_adopciones_tipo_mascota").append('<canvas id="cant_adopciones_tipo_mascota" width="800" height="250"></canvas>');
						cant_adopciones_tipo_mascota(response.data);
					}

					/*if(element == 'year_vacunas')
					{
						// removiendo el lienzo para generar un nuevo gráfico
				        $("canvas#cant_vacunas").remove();
						$("div.cant_vacunas").append('<canvas id="cant_vacunas" width="800" height="250"></canvas>');
						cant_vacunas(response.data);
					}*/

					if(element == 'year_hospedajes')
					{
						// removiendo el lienzo para generar un nuevo gráfico
				        $("canvas#cant_hospedaje_mes").remove();
						$("div.cant_hospedaje_mes").append('<canvas id="cant_hospedaje_mes" width="800" height="250"></canvas>');
						cant_hospedaje_mes(response.data);
					}
	            }
	        }) // fin de la petición AJAX
		});

	</script>

@endsection