<!DOCTYPE html>
<html lang="es">
<head>
	<title>Certificado de Adopción</title>
	<link rel="stylesheet" href="{{ asset('back_end/css/style.css') }}">
</head>
<body>
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-12 mt-5">
				<div class="header text-center">
					<h3>Certificado de Adopción</h3>
					<h3>Servet Veterinaria</h3>
				</div>

				<div class="col-md-12 mb-5">
					<div class="text-right">
						<p class="mb-0"><strong>Registro de Adopción.:</strong> SERVET-ADP{{ $mascota->id_cliente_mascota }}</p>
						<p><strong>Fecha de Emisión.:</strong> {{ date('d-m-Y', strtotime($mascota->fecha_registro)) }}</p>
					</div>
				</div>

				<div class="col-md-12">
					<div class="">
						<p>
							Yo <strong>{{ $mascota->cliente->nombreCompleto }}</strong> identificado/a por el número de cédula de identidad electoral número <strong>{{ $mascota->cliente->cedula }}</strong> acudí a Servet Veterinaria con el fin de adoptar a una mascota. <br>La mascota que decidí adoptar fue a: <strong>{{ $mascota->mascota->nombre }}</strong>, tipo de mascota <strong>{{ $mascota->mascota->tipoMascota->descripcion }}</strong>, Raza <strong>{{ $mascota->mascota->raza->descripcion }}</strong>, de color <strong>{{ $mascota->mascota->color->descripcion }}</strong> y con un peso de <strong>{{ $mascota->mascota->peso }}</strong>.
						</p>
					</div>
				</div>

				<div class="col-md-12">
					<div class="">
						<h5 class="text-center mb-4 mt-5">AL FIRMAR ESTE DOCUMENTO, EL ADOPTANTE ACEPTA LOS SIGUIENTES TÉRMINOS:</h5>
						<p>1. El adoptado será un miembro más de su familia.</p>
						<p>2. El adoptado tendrá en todo momento agua limpia con libre acceso.</p>
						<p>3. El adoptado tendrá una alimentación balanceada a base de croqueta seca.</p>
						<p>4. El adoptado usará SIEMPRE UN COLLAR CON SU PLACA DE IDENTIFICACIÓN (con nombre y teléfono del responsable)</p>
						<p>5. El adoptado no será en ningún caso golpeado, maltratado, humillado, abandonado, ni regalado.</p>
						<p>6. El adoptado debe contar con un área para dormir y comer.</p>
						<p>7. El adoptado recibirá los cuidados médicos necesarios para su bienestar (desparasitación cada 6 meses y vacunación anual).</p>
						<p>8. El adoptado será esterilizado.</p>
						<p>9. SI NO SE CUMPLIERA CON LO INDICADO, EL ADOPTADO SERÁ RETIRADO INMEDIATAMENTE (SE LE OFRECE UN HOGAR DE AMOR Y PROTECCIÓN)</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 text-center">
				<p>___________________________________</p>
				<strong style="font-size: 13px">Acepto las Condiciones</strong>
			</div>

			<div class="col-md-6 text-center">
				<p>___________________________________</p>
				<strong style="font-size: 13px">Entrego en Adopción</strong>
			</div>
		</div>
	</div>
</body>
</html>