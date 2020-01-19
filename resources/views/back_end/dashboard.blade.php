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
					<p class="text-muted mt-3 mb-0">
						<i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Ver mascotas
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
					<p class="text-muted mt-3 mb-0">
						<i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Ver clientes registrados
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
					<p class="text-muted mt-3 mb-0">
						<i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Ver hospedajes en curso
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
					<p class="text-muted mt-3 mb-0">
						<i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Ver vacunaciones
					</p>
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
						backgroundColor: ["#DF7401", "#2E9AFE", "#01DFA5"],
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
						backgroundColor: ["#084B8A", "#0B243B", "#0B3B39"],
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
					backgroundColor: ['#D84315', '#4E342E', '#FF8F00', '#0091EA', '#0277BD', '#FF5722', '#607D8B', '#00695C', '#d50000', '#00BFA5', '#FFD600', '#4DD0E1'],
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
						backgroundColor: ["#04B486", "#B18904", "#088A85", "#01A9DB", "#DF7401", "#3cba9f", "#e8c3b9", "#c45850"],
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

@endsection