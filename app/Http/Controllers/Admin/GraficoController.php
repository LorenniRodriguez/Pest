<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GraficoController extends Controller
{
    public function index ()
    {
    	return view('back_end.graficos.index', [
    		'cant_adopciones' => $this->cantidadAdopcionesMensuales(),
    		'cant_servicios' => $this->cantidadServicios(),
    		'cant_adopciones_tipo_mascota' => $this->cantidadAdopcionesTipoMascota(),
    		'cant_servicio_tipo' => $this->cantidadServiciosTipo(),
    		'cant_adopciones_raza' => $this->cantidadAdopcionesRaza(),
    		'cant_servicios_empleado' => $this->cantidadServiciosEmpleados(),
    		'cant_hospedajes_size' => $this->cantidadHospedajesSize(),
    		'cant_adopciones_cliente' => $this->cantidadAdopcionesCliente(),
    		'cant_hospedaje_cliente' => $this->cantidadHospedajeCliente(),
    		'cant_hospedaje_mes' => $this->cantidadHospedajesMensuales(),
    		'cant_vacunas' => $this->cantidadVacunas(),
    		'years_adopciones' => $this->yearsAdopciones(),
    		'years_servicios' => $this->yearsServicios(),
    		'years_hospedajes' => $this->yearsHospedajes(),
    		'years_vacunas' => $this->yearsVacunas()
    	]);
    }


    // 1 - cantidad de adopciones por meses
    public function cantidadAdopcionesMensuales ($year = null) : ?array
    {
    	if(is_null($year))
    		$year = date('Y');

    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				MONTH(cm.fecha_registro) AS mes,
				COUNT(*) AS cantidad
			FROM
				cliente_mascota AS cm
			WHERE
				cm.es_adopcion = 'Y'
					AND cm.estatus IN ('A', 'E')
					AND YEAR(cm.fecha_registro) = ?
			GROUP BY
				MONTH(cm.fecha_registro)
			ORDER BY
				mes asc
			;
		", array($year));

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
    		$data = [
	    		'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	    		'values' => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
	    	];

	    	foreach ($result as $value)
	    	{
	    		$data['values'][$value->mes - 1] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    // 2 - cantidad de servicios realizados
    public function cantidadServicios () : ?array
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				s.descripcion AS servicio,
				COUNT(*) AS cantidad
			FROM
				mascota_servicio AS ms
					INNER JOIN
				servicios AS s ON ms.id_servicio = s.id_servicio
			WHERE
				ms.estatus = 'A'
					AND s.estatus = 'A'
			GROUP BY
				s.descripcion
			;
		");
    	
    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
    		foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->servicio;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    // 3 - cantidad de adopciones realizadas por tipo de mascota (por meses)
    public function cantidadAdopcionesTipoMascota ($year = null) : ?array
    {
    	if(is_null($year))
    		$year = date('Y');

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				MONTH(cm.fecha_registro) AS mes,
				COUNT(*) AS cantidad,
				tp.descripcion AS tipo_mascota
			FROM
				cliente_mascota AS cm
					INNER JOIN
				mascotas AS m ON cm.id_mascota = m.id_mascota
					INNER JOIN
				tipo_mascotas AS tp ON m.id_tipo_mascota = tp.id_tipo_mascota
			WHERE
				cm.es_adopcion = 'Y'
					AND cm.estatus IN ('A', 'E')
					AND m.estatus = 'A'
					AND YEAR(cm.fecha_registro) = ?
			GROUP BY
				MONTH(cm.fecha_registro),
				tp.descripcion
			ORDER BY
				mes asc
			;
		", array($year));

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
    		foreach ($result as $value)
	    	{
	    		$data[] = [
	    			'label' => $value->tipo_mascota,
		    		'values' => $this->obtenerCantMes($value->mes, $value->cantidad)
		    	];
	    	}
    	}

    	return $data;
    }

    // 4 - cantidad de servicios realizados por tipo (por meses)
    public function cantidadServiciosTipo ($year = null) : ?array
    {
    	if(is_null($year))
    		$year = date('Y');

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				MONTH(ms.fecha_registro) AS mes,
				COUNT(*) AS cantidad,
				s.descripcion AS servicio
			FROM
				mascota_servicio AS ms
					INNER JOIN
				servicios AS s ON ms.id_servicio = s.id_servicio
			WHERE
				ms.estatus = 'A'
					AND s.estatus = 'A'
					AND YEAR(ms.fecha_registro) = ?
			GROUP BY
				MONTH(ms.fecha_registro),
				s.descripcion
			;
		", array($year));

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
    		foreach ($result as $value)
	    	{
	    		$data[] = [
	    			'label' => $value->servicio,
		    		'values' => $this->obtenerCantMes($value->mes, $value->cantidad)
		    	];
	    	}
    	}

    	return $data;
    }

    // 5 - cantidad de adopciones agrupados por raza
    public function cantidadAdopcionesRaza () : ?array
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				COUNT(*) AS cantidad,
				r.descripcion AS raza
			FROM
				cliente_mascota AS cm
					INNER JOIN
				mascotas AS m ON cm.id_mascota = m.id_mascota
					INNER JOIN
				razas AS r ON m.id_raza = r.id_raza
			WHERE
				cm.es_adopcion = 'Y'
					AND cm.estatus IN ('A', 'E')
					AND r.estatus = 'A'
			GROUP BY
				r.descripcion
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->raza;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    // 6 - cantidad de servicios atentidos y registrados por empleados
    public function cantidadServiciosEmpleados () : ?array
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				COUNT(*) AS cantidad,
				u.`name` AS empleado
			FROM
				mascota_servicio AS ms
					INNER JOIN
				users AS u ON ms.id_usuario = u.id
			WHERE
				ms.estatus = 'A'
			GROUP BY
				u.`name`
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->empleado;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    // 7 - cantidad de mascotas hospedadas por su tamaño
    public function cantidadHospedajesSize () : ?array
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				COUNT(*) AS cantidad,
				e.descripcion AS estatura
			FROM
				hospedajes AS h
					INNER JOIN
				mascotas AS m ON h.id_mascota = m.id_mascota
					INNER JOIN
				estaturas AS e ON m.id_estatura = e.id_estatura
			WHERE
				h.fecha_entrega IS NOT NULL
					AND h.estatus IN ('A', 'E')
					AND m.estatus = 'A'
			GROUP BY
				e.descripcion
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->estatura;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }


    // 8 - cantidad de vacunas aplicadas por meses
    public function cantidadVacunas () : ?array
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				COUNT(*) AS cantidad,
				v.descripcion AS vacuna
			FROM
				mascota_vacuna AS mv
					INNER JOIN
				vacunas AS v ON mv.id_vacuna = v.id_vacuna
			WHERE
				mv.estatus = 'A'
					AND v.estatus = 'A'
			GROUP BY
				v.descripcion
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->vacuna;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    // 9 - clientes que mas han realizados adopciones
    public function cantidadAdopcionesCliente () : ?array
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				COUNT(*) AS cantidad,
				CONCAT(c.nombres, ' ', c.apellidos) AS cliente
			FROM
				cliente_mascota AS cm
					INNER JOIN
				clientes AS c ON cm.id_cliente = c.id_cliente
			WHERE
				cm.es_adopcion = 'Y'
					AND cm.estatus IN ('A', 'E')
					AND c.estatus = 'A'
			GROUP BY
				CONCAT(c.nombres, ' ', c.apellidos)
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->cliente;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    // 10 - clientes que mas han realizado hospedajes
    public function cantidadHospedajeCliente () : ?array
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				COUNT(*) AS cantidad,
				CONCAT(c.nombres, ' ', c.apellidos) AS cliente
			FROM
				hospedajes AS h
					INNER JOIN
				mascotas AS m ON h.id_mascota = m.id_mascota
					INNER JOIN
				cliente_mascota AS cm ON m.id_mascota = cm.id_mascota
					INNER JOIN
				clientes AS c ON cm.id_cliente = c.id_cliente
			WHERE
				h.fecha_entrega IS NOT NULL
					AND h.estatus IN ('A', 'E')
					AND m.estatus = 'A'
					AND cm.estatus IN ('A', 'E')
					AND c.estatus = 'A'
			GROUP BY
				CONCAT(c.nombres, ' ', c.apellidos)
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->cliente;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    // 11 - cantidad de hospedajes por meses --
    public function cantidadHospedajesMensuales ($year = null) : ?array
    {
    	if(is_null($year))
    		$year = date('Y');

    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				MONTH(h.fecha_registro) AS mes,
				COUNT(*) AS cantidad
			FROM
				hospedajes AS h
			WHERE
				h.fecha_entrega IS NOT NULL
					AND h.estatus IN ('A', 'E')
					AND YEAR(h.fecha_registro) = ?
			GROUP BY
				MONTH(h.fecha_registro)
			ORDER BY
				mes asc
			;
		", array($year));

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
    		$data = [
	    		'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	    		'values' => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
	    	];

	    	foreach ($result as $value)
	    	{
	    		$data['values'][$value->mes - 1] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    public function obtenerCantMes ($mes, $cantidad)
	{
		$mes_cant = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		$mes_cant[$mes - 1] = $cantidad;

		return $mes_cant;
	}

    // obtiene una lista con los años en que se ha efectuado alguna transacción
    public function yearsAdopciones () : ?array
    {
    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT DISTINCT
				YEAR(fecha_registro) AS yyear
			FROM
				cliente_mascota
			ORDER BY
				1 DESC
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
    		$data = [];

	    	foreach ($result as $value)
	    	{
	    		$data[] = $value->yyear;
	    	}
    	}

    	return $data ?? null;
    }

    public function yearsServicios() : ?array
    {
    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT DISTINCT
				YEAR(fecha_registro) AS yyear
			FROM
				mascota_servicio
			ORDER BY
				1 DESC
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
    		$data = [];

	    	foreach ($result as $value)
	    	{
	    		$data[] = $value->yyear;
	    	}
    	}

    	return $data ?? null;
    }

    public function yearsHospedajes() : ?array
    {
    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT DISTINCT
				YEAR(fecha_registro) AS yyear
			FROM
				hospedajes
			ORDER BY
				1 DESC
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
    		$data = [];

	    	foreach ($result as $value)
	    	{
	    		$data[] = $value->yyear;
	    	}
    	}

    	return $data ?? null;
    }

    public function yearsVacunas() : ?array
    {
    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT DISTINCT
				YEAR(fecha_registro) AS yyear
			FROM
				mascota_vacuna
			ORDER BY
				1 DESC
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
    		$data = [];

	    	foreach ($result as $value)
	    	{
	    		$data[] = $value->yyear;
	    	}
    	}

    	return $data ?? null;
    }

    // para la peticion AJAX
	public function consultar (Request $request)
	{
		$data = [];

		if($request->element == 'year_servicios')
		{
			$data = $this->cantidadServiciosTipo($request->year);
		}

		if($request->element == 'year_adopciones')
		{
			$data = $this->cantidadAdopcionesMensuales($request->year);
		}

		if($request->element == 'year_adopciones_tipo')
		{
			$data = $this->cantidadAdopcionesTipoMascota($request->year);
		}

		/*if($request->element == 'year_vacunas')
		{
			$data = $this->cantidadVacunas($request->year);
		}*/

		if($request->element == 'year_hospedajes')
		{
			$data = $this->cantidadHospedajesMensuales($request->year);
		}

		return response()->json([
			'data' => $data ?? null
		]);
	}
}