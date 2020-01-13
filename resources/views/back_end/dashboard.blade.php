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
						<i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Ver mascotas registradas
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
								<h3 class="font-weight-medium text-right mb-0"> {{ $Hospedajes }}</h3>
							</div>
						</div>
					</div>
					<p class="text-muted mt-3 mb-0">
						<i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Ver hospedajes en curso
					</p>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card" onclick="document.location.href='{{ route('citas.index') }}'" style="cursor: pointer;">
			<div class="card card-statistics">
				<div class="card-body">
					<div class="clearfix">
						<div class="float-left">
							<i class="mdi mdi-calendar-range text-info icon-lg"></i>
						</div>
						<div class="float-right">
							<p class="mb-0 text-right">Citas</p>
							<div class="fluid-container">
								<h3 class="font-weight-medium text-right mb-0">{{ $citas }}</h3>
							</div>
						</div>
					</div>
					<p class="text-muted mt-3 mb-0">
						<i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Ver citas pendientes
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Orders</h4>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										First name
									</th>
									<th>
										Progress
									</th>
									<th>
										Amount
									</th>
									<th>
										Sales
									</th>
									<th>
										Deadline
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="font-weight-medium">
										1
									</td>
									<td>
										Herman Beck
									</td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
											aria-valuemax="100"></div>
										</div>
									</td>
									<td>
										$ 77.99
									</td>
									<td class="text-danger"> 53.64%
										<i class="mdi mdi-arrow-down"></i>
									</td>
									<td>
										May 15, 2015
									</td>
								</tr>
								<tr>
									<td class="font-weight-medium">
										2
									</td>
									<td>
										Messsy Adam
									</td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
											aria-valuemax="100"></div>
										</div>
									</td>
									<td>
										$245.30
									</td>
									<td class="text-success"> 24.56%
										<i class="mdi mdi-arrow-up"></i>
									</td>
									<td>
										July 1, 2015
									</td>
								</tr>
								<tr>
									<td class="font-weight-medium">
										3
									</td>
									<td>
										John Richards
									</td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0"
											aria-valuemax="100"></div>
										</div>
									</td>
									<td>
										$138.00
									</td>
									<td class="text-danger"> 28.76%
										<i class="mdi mdi-arrow-down"></i>
									</td>
									<td>
										Apr 12, 2015
									</td>
								</tr>
								<tr>
									<td class="font-weight-medium">
										4
									</td>
									<td>
										Peter Meggik
									</td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
											aria-valuemax="100"></div>
										</div>
									</td>
									<td>
										$ 77.99
									</td>
									<td class="text-danger"> 53.45%
										<i class="mdi mdi-arrow-down"></i>
									</td>
									<td>
										May 15, 2015
									</td>
								</tr>
								<tr>
									<td class="font-weight-medium">
										5
									</td>
									<td>
										Edward
									</td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0"
											aria-valuemax="100"></div>
										</div>
									</td>
									<td>
										$ 160.25
									</td>
									<td class="text-success"> 18.32%
										<i class="mdi mdi-arrow-up"></i>
									</td>
									<td>
										May 03, 2015
									</td>
								</tr>
								<tr>
									<td class="font-weight-medium">
										6
									</td>
									<td>
										Henry Tom
									</td>
									<td>
										<div class="progress">
											<div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0"
											aria-valuemax="100"></div>
										</div>
									</td>
									<td>
										$ 150.00
									</td>
									<td class="text-danger"> 24.67%
										<i class="mdi mdi-arrow-down"></i>
									</td>
									<td>
										June 16, 2015
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4">Manage Tickets</h5>
					<div class="fluid-container">
						<div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
							<div class="col-md-1">
								<img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('back_end/images/faces/face1.jpg') }}" alt="profile image">
							</div>

							<div class="ticket-details col-md-9">
								<div class="d-flex">
									<p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">James :</p>
									<p class="text-primary mr-1 mb-0">[#23047]</p>
									<p class="mb-0 ellipsis">Donec rutrum congue leo eget malesuada.</p>
								</div>
								<p class="text-gray ellipsis mb-2">Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim
									vivamus.
								</p>
								<div class="row text-gray d-md-flex d-none">
									<div class="col-4 d-flex">
										<small class="mb-0 mr-2 text-muted text-muted">Last responded :</small>
										<small class="Last-responded mr-2 mb-0 text-muted text-muted">3 hours ago</small>
									</div>
									<div class="col-4 d-flex">
										<small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
										<small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small>
									</div>
								</div>
							</div>

							<div class="ticket-actions col-md-2">
								<div class="btn-group dropdown">
									<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Manage
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#">
											<i class="fa fa-reply fa-fw"></i>Quick reply</a>
											<a class="dropdown-item" href="#">
												<i class="fa fa-history fa-fw"></i>Another action</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#">
													<i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
													<a class="dropdown-item" href="#">
														<i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
													</div>
												</div>
											</div>
										</div>
										<div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
											<div class="col-md-1">
												<img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('back_end/images/faces/face2.jpg') }}" alt="profile image">
											</div>
											<div class="ticket-details col-md-9">
												<div class="d-flex">
													<p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">Stella :</p>
													<p class="text-primary mr-1 mb-0">[#23135]</p>
													<p class="mb-0 ellipsis">Curabitur aliquet quam id dui posuere blandit.</p>
												</div>
												<p class="text-gray ellipsis mb-2">Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Curabitur non nulla sit amet
													nisl.
												</p>
												<div class="row text-gray d-md-flex d-none">
													<div class="col-4 d-flex">
														<small class="mb-0 mr-2 text-muted">Last responded :</small>
														<small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
													</div>
													<div class="col-4 d-flex">
														<small class="mb-0 mr-2 text-muted">Due in :</small>
														<small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
													</div>
												</div>
											</div>
			<div class="ticket-actions col-md-2">
				<div class="btn-group dropdown">
					<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Manage
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">
							<i class="fa fa-reply fa-fw"></i>Quick reply</a>
							<a class="dropdown-item" href="#">
								<i class="fa fa-history fa-fw"></i>Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">
									<i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
									<a class="dropdown-item" href="#">
										<i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row ticket-card mt-3">
							<div class="col-md-1">
								<img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('back_end/images/faces/face3.jpg') }}" alt="profile image">
							</div>
							<div class="ticket-details col-md-9">
								<div class="d-flex">
									<p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">John Doe :</p>
									<p class="text-primary mr-1 mb-0">[#23246]</p>
									<p class="mb-0 ellipsis">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar.</p>
								</div>
								<p class="text-gray ellipsis mb-2">Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Lorem ipsum dolor sit amet.</p>
								<div class="row text-gray d-md-flex d-none">
									<div class="col-4 d-flex">
										<small class="mb-0 mr-2 text-muted">Last responded :</small>
										<small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
									</div>
									<div class="col-4 d-flex">
										<small class="mb-0 mr-2 text-muted">Due in :</small>
										<small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
									</div>
								</div>
							</div>
		<div class="ticket-actions col-md-2">
			<div class="btn-group dropdown">
				<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Manage
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#">
						<i class="fa fa-reply fa-fw"></i>Quick reply</a>
						<a class="dropdown-item" href="#">
							<i class="fa fa-history fa-fw"></i>Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">
								<i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
								<a class="dropdown-item" href="#">
									<i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection