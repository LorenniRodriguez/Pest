<?php

namespace App\Http\Controllers\Admin;

use \DB;
use \Auth;
use Session;
use App\Cita;
use App\Mascota;
use App\Vacunas;
use App\MascotaVacuna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MascotaVacunaController extends Controller
{
    public function consultar ()
    {
    	return view('back_end.mascota_vacuna.consultar', [
    		'mascotas' => Mascota::where('estatus', '=', 'A')->get(),
    		'mascota_vacunas' => MascotaVacuna::where('estatus', '=', 'A')->get(),
    	]);
    }

    public function aplicar_vacuna (Request $request)
    {
    	$mascota = Mascota::find($request->id_mascota);
    	
    	// busco las vacunas que todavia no se le han aplicado a la mascota
    	$vacunas = DB::select("
                SELECT
                    *
                FROM
                    vacunas AS v
                WHERE
                    NOT EXISTS -- filtro las vacunas que ya se han aplicado --
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
                    AND NOT EXISTS -- filtro las vacunas que se encuentran en agenda --
                    (
                        SELECT
                            *
                        FROM
                            citas AS c
                        WHERE
                            c.id_mascota = $mascota->id_mascota
                                AND c.id_vacuna = v.id_vacuna
                                AND c.estatus = 'A'
                                AND (CAST(NOW() AS DATE) < c.fecha_cita OR CAST(NOW() AS DATE) <> c.fecha_cita)
                    )
                    AND (v.para_gatos = $mascota->id_tipo_mascota OR v.para_perros = $mascota->id_tipo_mascota)
                    AND v.estatus = 'A'

                UNION
  
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
                            citas AS c
                        WHERE
                            c.id_mascota = $mascota->id_mascota
                                AND c.id_vacuna = v.id_vacuna
                                AND (c.estatus = 'A' AND c.fecha_atendida IS NOT NULL)
                                AND (CAST(NOW() AS DATE) < c.fecha_cita OR CAST(NOW() AS DATE) <> c.fecha_cita)
                    )
                    AND EXISTS
                    (
                        SELECT
                            *
                        FROM
                            mascotas AS m
                        WHERE
                            m.id_mascota = $mascota->id_mascota
                                AND m.id_tipo_mascota = 2
                    )
                    AND v.para_perros = 2
                    AND v.estatus = 'A'
                ");


    	return view('back_end.mascota_vacuna.aplicar_vacuna', [
    		'mascota' => Mascota::find($request->id_mascota),
    		'mascota_vacunas' => MascotaVacuna::where('id_mascota', '=', $request->id_mascota)->where('estatus', '=', 'A')->get(),
    		'vacunas' => $vacunas,
            'id_vacuna' => $request->id_vacuna,
            'id_cita' => $request->id_cita
    	]);
    }

    public function store (Request $request)
    {
       $this->validate($request, [
        
            'id_mascota' => 'required',
            'id_vacuna' => 'required'
        ]);

           
        $mascota_vacuna = new MascotaVacuna;
    	
    	$mascota_vacuna->id_mascota = $request->id_mascota;
    	$mascota_vacuna->id_vacuna = $request->id_vacuna;
    	$mascota_vacuna->id_usuario = Auth::user()->id; // obtiene el id del usuario logueado
    	$mascota_vacuna->save();

        // identifico si esta vacuna se realizó desde el módulo de vacunación y la mascota la tiene en citas pendientes
        if(is_null($request->id_cita))
        {
            $citas = Cita::whereRaw("
                id_vacuna = $request->id_vacuna
                    AND id_mascota = $request->id_mascota
                    AND estatus = 'A'
            ")->get();
            
            if(isset($citas[0]))
                $request->id_cita = $citas[0]->id_cita;
        }


        // identifico si la vacuna se ha aplicado desde el modulo de citas
        if($request->id_cita)
        {
            $cita = Cita::find($request->id_cita);

            $cita->id_usuario_atendio = Auth::user()->id;
            $cita->fecha_atendida = date('Y-m-d');
            $cita->update();

            Session::flash('success', 'La vacuna se ha aplicado correctamente. La cita también ha sido atentida.');
        }

        else
            Session::flash('success', 'La vacuna se ha aplicado correctamente.');
    	
        return redirect()->route('mascota_vacuna.consultar');
    }

    public function destroy($id)
    {
        $mascota_vacuna = MascotaVacuna::find($id);

        $mascota_vacuna->estatus = 'I';
        $mascota_vacuna->borrado_por = Auth::user()->id;
        $mascota_vacuna->update();

        Session::flash('success', 'La vacuna se ha anulado permanentemente.');
        return redirect()->route('mascota_vacuna.consultar');
    }
}