<?php

namespace App\Http\Controllers\Admin;

use DB;
use Session;
use App\Raza;
use App\Color;
use App\Mascota;
use App\Estatura;
use App\Tipomascota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.mascotas.index')->with([
            'mascotas' => Mascota::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.mascotas.create', [
            'razas' => Raza::all(),
            'estaturas' => Estatura::all(),
            'tipo_mascotas' => Tipomascota::all(),
            'colores'=> Color::all()
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo '<pre>';
        //var_dump($request->all()); //Lee la data que trae la vista

       $this->validate($request, [

        'nombre'      => 'required|min:2|max:30',
        'peso'        => 'required|min:3|max:6',
        'id_raza'     => 'required',
        'id_estatura' => 'required',
        'id_color'    => 'required',
        
    ],

    [

        'nombre.required' => 'El campo nombres es requerido.',
        'nombre.min' => 'El campo nombre debe contener más de 2 caracteres.',
        'nombre.max' => 'El campo nombres debe contener menos de 30 caracteres.',

        'peso.required' => 'El campo peso es requerido.',
        'peso.min' => 'El campo peso debe contener más de 3 caracteres.',
        'peso.max' => 'El campo peso debe contener menos de 6 caracteres.',

    ]

);
       
       $mascota = Mascota::create($request->only('nombre', 'peso', 'id_raza', 'id_estatura',
        'id_tipo_mascota', 'id_color', 'fecha_nacimiento'));

        //echo '<pre>';
        //var_dump($mascota);

       Session::flash('success', 'La mascota se ha guardado correctamente.');
       return redirect()->route('mascotas.index');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        return view('back_end.mascotas.edit')->with([
            'mascota' => $mascota, 
            'razas' => Raza::all(),
            'estaturas' => Estatura::all(),
            'tipo_mascotas' => Tipomascota::all(),
            'colores'=> Color::all()
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Mascota $mascota, Request $request)
    {
     $this->validate($request, [

        'nombre'      => 'required|min:1|max:30',
        'peso'        => 'required|min:1|max:6',
        'id_raza'     => 'required',
        'id_estatura' => 'required',
        'id_color'    => 'required',
        
    ],

    [

        'nombre.required' => 'El campo nombres es requerido.',
        'nombre.min' => 'El campo nombre debe contener más de 2 caracteres.',
        'nombre.max' => 'El campo nombres debe contener menos de 30 caracteres.',

        'peso.required' => 'El campo peso es requerido.',
        'peso.min' => 'El campo peso debe contener más de 3 caracteres.',
        'peso.max' => 'El campo peso debe contener menos de 6 caracteres.',

    ]


);

     $mascota->nombre = $request->nombre;
     $mascota->peso   = $request->peso;
     $mascota->id_raza = $request->id_raza;
     $mascota->id_estatura = $request->id_estatura;
     $mascota->id_color = $request->id_color;
     $mascota->fecha_nacimiento = $request->fecha_nacimiento;
     $mascota->update();

     Session::flash('success', 'La mascota se ha actualizado correctamente.');
     return redirect()->route('mascotas.index');

        //echo '<pre>';
        //var_dump($request->all());


 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        $mascota->estatus = 'I';
        $mascota->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('mascotas.index');
    }


    public function restore (Mascota $mascota)
    {
        $mascota->estatus = 'A';
        $mascota->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('mascotas.index');
    }

    public function reporte (Request $request)
    {
        /*echo '<pre>';
        var_dump($request->all());
        return 0;*/

        $año = $request->año ?? null;
        $id_mascota = $request->id_mascota ?? null;
        $es_adoptada = $request->es_adoptada ?? null;

        if($id_mascota == 0)
            $id_mascota = null;

        if($es_adoptada == '2')
            $es_adoptada = null;

        $mascotas = DB::select("
            SELECT
                m.id_mascota,
                m.nombre,
                ifnull(CONCAT(c.nombres, ' ', c.apellidos), 'Veterinaria') AS dueño
            FROM
                mascotas AS m
                    LEFT JOIN
                cliente_mascota AS cm ON m.id_mascota = cm.id_mascota AND cm.estatus = 'A'
                    LEFT JOIN
                clientes AS c ON cm.id_cliente = c.id_cliente AND c.estatus = 'A'
            WHERE
                m.estatus = 'A'
            ;
        ");

        $servicios = DB::select("
            SELECT
                m.nombre AS mascota,
                tp.descripcion AS tipo_servicio,
                s.descripcion AS servicio,
                COUNT(*) AS cantidad,
                YEAR(ms.fecha_registro) AS año,
                CASE
                    WHEN cm.id_mascota IS NULL THEN 'No'
                    ELSE 'Sí'
                END AS es_adoptada
            FROM
                mascotas AS m
                    INNER JOIN
                mascota_servicio AS ms ON m.id_mascota = ms.id_mascota
                    INNER JOIN
                servicios AS s ON ms.id_servicio = s.id_servicio
                    INNER JOIN
                tipo_servicios AS tp ON s.id_tipo_servicio = tp.id_tipo_servicio
                    LEFT JOIN
                cliente_mascota AS cm ON m.id_mascota = cm.id_mascota AND cm.estatus = 'A'
            WHERE
                ms.estatus = 'A'
                    AND s.estatus = 'A'
                    AND CASE WHEN ? IS NOT NULL
                        THEN YEAR(ms.fecha_registro) = ?
                        ELSE 1
                    END
                    AND CASE WHEN ? IS NOT NULL
                        THEN m.id_mascota = ?
                        ELSE 1
                    END
                    AND CASE WHEN ? = '1'
                        THEN cm.id_mascota IS NOT NULL
                        ELSE 1
                    END
                    AND CASE WHEN ? = '0'
                        THEN cm.id_mascota IS NULL
                        ELSE 1
                    END
            GROUP BY
                m.nombre,
                tp.descripcion,
                s.descripcion,
                YEAR(ms.fecha_registro),
                cm.id_mascota
        ", array($año, $año, $id_mascota, $id_mascota, $es_adoptada, $es_adoptada));

        return view('back_end.mascotas.reporte', [
            'mascotas' => $mascotas,
            'servicios' => $servicios
        ]);
    }
}