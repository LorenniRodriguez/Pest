<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use App\Cita;
use App\Vacuna;
use App\Mascota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.citas.index', [
            'citas' => Cita::whereRaw("estatus = 'A' AND fecha_atendida IS NULL")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.citas.create', [
            'mascotas' => Mascota::where('estatus', '=', 'A')->get(),
            'vacunas' => Vacuna::where('estatus', '=', 'A')->get()
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
        // validaciones
        $this->validate($request, [
            'id_mascota' => 'required',
            'id_vacuna' => 'required',
            'fecha_cita' => 'required|date|after:today'
        ]);

        $cita = new Cita;

        $cita->id_mascota = $request->id_mascota;
        $cita->id_vacuna = $request->id_vacuna;
        $cita->id_usuario = Auth::user()->id;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->save();

        Session::flash('success', 'La cita se ha agendado correctamente.');
        return redirect()->route('vacunacion.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);

        $cita->estatus = 'I';
        $cita->borrado_por = Auth::user()->id;
        $cita->update();

        Session::flash('success', 'La cita se ha anulado permanentemente.');
        return redirect()->route('vacunacion.index');
    }

    public function buscarVacunas (Request $request)
    {
        $mascota = Mascota::find($request->id_mascota);

        // busco las vacunas que todavia no se le han aplicado a la mascota
        $vacunas = DB::select("
            SELECT
                *
            FROM
                vacunas AS v
            WHERE
                NOT EXISTS
                (
                    SELECT
                        *
                    FROM
                        mascota_vacuna AS mv
                    WHERE
                        v.id_vacuna = mv.id_vacuna
                            AND mv.estatus = 'A'
                            AND mv.id_mascota = $mascota->id_mascota
                )
                AND NOT EXISTS
                (
                    SELECT
                        *
                    FROM
                        citas AS c
                    WHERE
                        v.id_vacuna = c.id_vacuna
                            AND c.id_mascota = $mascota->id_mascota
                            AND c.estatus = 'A'
                )
                AND (v.para_gatos = $mascota->id_tipo_mascota OR v.para_perros = $mascota->id_tipo_mascota)
                AND v.estatus = 'A'
        "); // que la vacuna no se encuentre en una proxima cita

        return $vacunas;
    }

    public function historico ()
    {
        return view('back_end.citas.historico', [
            'citas' => Cita::all()
        ]);
    }
}
