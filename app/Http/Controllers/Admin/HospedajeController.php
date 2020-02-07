<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use App\Hospedaje;
use App\Mascota;
use App\Jaula;
use App\TipoHospedaje;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospedajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.hospedajes.index', [
            'hospedajes' => Hospedaje::whereRaw("estatus = 'A' and fecha_entrega IS NULL ")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.hospedajes.create', [
            'mascotas' => DB::select("SELECT m.*, IFNULL(CONCAT(c.nombres, ' ', c.apellidos), '') AS dueño FROM mascotas AS m LEFT JOIN cliente_mascota AS cm ON m.id_mascota = cm.id_mascota AND cm.estatus = 'A' LEFT JOIN clientes AS c ON cm.id_cliente = c.id_cliente AND c.estatus = 'A'
             WHERE m.estatus = 'A' AND NOT EXISTS (SELECT * FROM hospedajes AS h  WHERE m.id_mascota = h.id_mascota AND h.fecha_entrega IS NULL AND h.estatus = 'A')"),
            'jaulas' => DB::select("SELECT *FROM jaulas AS j
             WHERE j.estatus = 'A' AND NOT EXISTS (SELECT * FROM hospedajes AS h WHERE j.id_jaula = h.id_jaula AND (h.fecha_entrega IS NULL AND h.estatus IN ('A', 'E')))"),
            'tipo_hospedajes' => TipoHospedaje::where('estatus', '=', 'A')->get(),
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

         $this->validate($request, [
            'id_mascota' => 'required',
            'id_jaula' => 'required',
            'id_tipo_hospedaje' => 'required',
            'asuntos' => 'required',
            'fecha_final' => 'required|date|after_or_equal:today'
        ],

        [
            'id_mascota.required' => 'El campo mascota es requerido.',
            'id_jaula.required' => 'El campo jaula es requerido.',
            'id_tipo_hospedaje.required' => 'El tipo hospedaje es requerido',
            'fecha_final.required' => 'El campo fecha cita es requerido.',
            'fecha_final.date' => 'El campo fecha final debe ser de tipo fecha.',
            'fecha_final.after' => 'El campo fecha final debe ser mayor que la fecha de hoy.'
        ]



    );

        $hospedaje = new Hospedaje;

        $hospedaje->id_mascota = $request->id_mascota;
        $hospedaje->id_jaula = $request->id_jaula;
        $hospedaje->id_usuario = Auth::user()->id;
        $hospedaje->id_tipo_hospedaje = $request->id_tipo_hospedaje;
        $hospedaje->asuntos = $request->asuntos;
        $hospedaje->fecha_final = $request->fecha_final;
        $hospedaje->save();

         Session::flash('success', 'El hospedaje se ha efectuado correctamente.');
         return redirect()->route('hospedajes.index');
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
    
          $hospedaje = Hospedaje::find($id);

          $hospedaje->finalizado_por = Auth::user()->id;
          $hospedaje->fecha_entrega = date('Y-m-d');
          $hospedaje->estatus = 'E';
          $hospedaje->update();

          Session::flash('success', 'El hospedaje se ha finalizado correctamente.');
          return redirect()->route('hospedajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $hospedaje = Hospedaje::find($id);

        $hospedaje->estatus = 'I';
        $hospedaje->borrado_por = Auth::user()->id;
        $hospedaje->update();

        Session::flash('success', 'El hospedaje se ha anulado permanentemente.');
        return redirect()->route('hospedajes.index');

    }

    public function historico ()
    {
        return view('back_end.hospedajes.historico', [
            'hospedajes' => Hospedaje::all()
        ]);
    }  

    
}
