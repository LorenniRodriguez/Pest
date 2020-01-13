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

        'mascotas' => Mascota::where('estatus', '=', 'A')->get(),
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

        $cliente_mascota = new ClienteMascota;

        $cliente_mascota->id_mascota = $request->id_mascota;
        $cliente_mascota->id_cliente = $request->id_cliente;
        $cliente_mascota->es_adopcion = $request->es_adopcion;
        $cliente_mascota->registrado_por = Auth::user()->id;
        $cliente_mascota->save();

         //Session::flash('success', 'La adopcion se ha agendado correctamente.');
         // return redirect()->route('mascota_cliente.index');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente_mascota = ClienteMascota::find($id);

        $cliente_mascota->estatus = 'I';
        $cliente_mascota->borrado_por = Auth::user()->id;
        $cliente_mascota->update();

        Session::flash('success', 'El hospedaje se ha anulado permanentemente.');
        return redirect()->route('hospedajes.index');

    }

   public function historico ()
    {
        return view('back_end.cliente_mascota.historico', [
            'cliente_mascotas' => ClienteMascota::all()
        ]);
    }  
}
