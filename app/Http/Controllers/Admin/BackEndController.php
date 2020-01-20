<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    public function dashboard ()
    {
    	return view('back_end.dashboard', [
    		'mascotas' => \App\Mascota::where('estatus', '=', 'A')->count(),
    		'clientes' => \App\Cliente::where('estatus', '=', 'A')->count(),
    		'citas' => \App\Cita::whereRaw("estatus = 'A' AND fecha_atendida IS NULL")->count(),
    		'hospedajes' => \App\Hospedaje::whereRaw("estatus = 'A' AND fecha_entrega IS NULL")->count(),
    		'cant_adopciones' => $this->adopciones(),
    		'cant_hospedajes' => $this->hospedajes(),
    		'cant_hospedajes_tardios' => $this->hospedajesTardios(),
    		'cant_clientes' => $this->clientes(),
    		'cant_clientes_genero' => $this->clientesPorGenero(),
    		'cant_adopciones_tipo' => $this->adopcionesTipo(),
    		'cant_clientes_pais' => $this->clientesPorPais(),
    		'citas_pendientes' => \App\Cita::whereRaw("estatus = 'A' AND fecha_atendida IS NULL")->get(),
    		'hospedajes_pendientes' => \App\Hospedaje::whereRaw("estatus = 'A' and fecha_entrega IS NULL")->get(),
    		'vacunas' => $this->vacunas(),
    		'servicios' => $this->servicios()
    	]);
    }

    public function adopciones ()
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				YEAR(cm.fecha_registro) AS yyear,
				COUNT(*) AS cantidad
			FROM
				cliente_mascota AS cm
			WHERE
				cm.es_adopcion = 'Y'
					AND cm.estatus IN ('A', 'E')
			GROUP BY
				YEAR(cm.fecha_registro)
			ORDER BY
				yyear ASC
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->yyear;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    public function hospedajes ()
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				YEAR(h.fecha_registro) AS yyear,
				COUNT(*) AS cantidad
			FROM
				hospedajes AS h
			WHERE
				h.fecha_entrega IS NOT NULL
					AND h.estatus IN ('A', 'E')
			GROUP BY
				YEAR(h.fecha_registro)
			ORDER BY
				yyear ASC
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->yyear;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    public function hospedajesTardios ()
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				YEAR(h.fecha_registro) AS yyear,
				COUNT(*) AS cantidad
			FROM
				hospedajes AS h
			WHERE
				h.fecha_entrega IS NOT NULL
					AND h.estatus IN ('A', 'E')
					AND h.fecha_entrega > h.fecha_final
			GROUP BY
				YEAR(h.fecha_registro)
			ORDER BY
				yyear ASC
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->yyear;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    public function clientes ()
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				YEAR(c.fecha_registro) AS yyear,
				COUNT(*) AS cantidad
			FROM
				clientes AS c
			WHERE
				c.estatus = 'A'
			GROUP BY
				YEAR(c.fecha_registro)
			ORDER BY
				yyear ASC
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->yyear;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    public function clientesPorGenero ()
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				g.descripcion AS genero,
				COUNT(*) AS cantidad
			FROM
				clientes AS c
					INNER JOIN
				generos AS g ON c.id_genero = g.id_genero
			WHERE
				c.estatus = 'A'
			GROUP BY
				g.descripcion
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->genero;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    public function adopcionesTipo ()
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				CASE cm.es_adopcion
					WHEN 'Y' THEN 'Adopción'
					WHEN 'N' THEN 'No Adopción'
				END AS descripcion,
				COUNT(*) AS cantidad
			FROM
				cliente_mascota AS cm
			WHERE
				cm.estatus IN ('A', 'E')
			GROUP BY
				cm.es_adopcion
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->descripcion;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    public function clientesPorPais ()
    {
    	$data = [
    		'labels' => [],
    		'values' => []
    	];

    	// ejecuto la consulta de lugar
    	$result = DB::select("
			SELECT
				pp.descripcion AS pais,
				COUNT(*) AS cantidad
			FROM
				clientes AS c
					INNER JOIN
				provincias AS p ON c.id_provincia = p.id_provincia
					INNER JOIN
				paises AS pp ON p.id_pais = pp.id_pais
			WHERE
				c.estatus = 'A'
					AND p.estatus = 'A'
					AND pp.estatus = 'A'
			GROUP BY
				pp.descripcion
			;
		");

    	// me aseguro que exista data resultante del query
    	if(count($result))
    	{
	    	foreach ($result as $value)
	    	{
	    		$data['labels'][] = $value->pais;
	    		$data['values'][] = $value->cantidad;
	    	}
    	}

    	return $data;
    }

    public function servicios ()
    {
    	return DB::select("
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
					AND CAST(ms.fecha_registro AS DATE) = ?
			GROUP BY
				s.descripcion
    	", array(date('Y-m-d')));
    }

    public function vacunas ()
    {
    	return DB::select("
	    	SELECT
	    		v.descripcion AS vacuna,
	    		COUNT(*) AS cantidad
	    	FROM
	    		mascota_vacuna AS mv
	    			INNER JOIN
	    		vacunas AS v ON mv.id_vacuna = v.id_vacuna
	    	WHERE
	    		CAST(mv.fecha_registro AS DATE) = ?
	    			AND mv.estatus = 'A'
	    			AND v.estatus = 'A'
	    	GROUP BY
	    		v.descripcion
    	", array(date('Y-m-d')));
    }
}