<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use App\Mascota;
use App\Cliente;
use App\ClienteMascota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteMascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.cliente_mascota.index', [
            'cliente_mascotas' => ClienteMascota::whereRaw("estatus = 'A' and borrado_por IS NULL")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.cliente_mascota.create',[ 

        'mascotas' => DB:: select("SELECT * FROM mascotas AS m WHERE m.estatus = 'A' AND NOT EXISTS ( SELECT * FROM
           cliente_mascota AS cm  WHERE m.id_mascota = cm.id_mascota AND cm.estatus = 'A')"),
        'clientes' => Cliente::where('estatus', '=', 'A')->get()
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
            'id_cliente' => 'required',
            'es_adopcion' => 'required'
        ]);


        $cliente_mascota = new ClienteMascota;

        $cliente_mascota->id_mascota = $request->id_mascota;
        $cliente_mascota->id_cliente = $request->id_cliente;
        $cliente_mascota->es_adopcion = $request->es_adopcion;
        $cliente_mascota->registrado_por = Auth::user()->id;
        $cliente_mascota->save();

         Session::flash('success', 'La adopcion se ha realizado correctamente.');
         return redirect()->route('cliente_mascota.index');
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

        $cliente_mascota = ClienteMascota::find($id);

        $cliente_mascota->estatus = 'E';
        $cliente_mascota->borrado_por = Auth::user()->id;
        $cliente_mascota->fecha_conclusion = date('Y-m-d');
        $cliente_mascota->update();

        Session::flash('success', 'La adopcion se ha concluido correctamente.');
        return redirect()->route('cliente_mascota.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $cliente_mascota = ClienteMascota::find($id);

        $cliente_mascota->estatus = 'I';
        $cliente_mascota->borrado_por = Auth::user()->id;
        $cliente_mascota->update();

        Session::flash('success', 'La adopcion se ha anulado permanentemente.');
        return redirect()->route('cliente_mascota.index');

    }


   public function historico ()
    {
        return view('back_end.cliente_mascota.historico', [
            'cliente_mascotas' => ClienteMascota::all()
        ]);
    }

}
