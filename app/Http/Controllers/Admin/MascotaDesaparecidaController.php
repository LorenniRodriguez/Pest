<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use App\MascotaDesaparecida;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MascotaDesaparecidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view ('back_end.mascota_desaparecidas.index')-> with([

            'mascota_desaparecidas' => MascotaDesaparecida::whereRaw(" estatus = 'A' ")->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function create()
    {
         return view ('back_end.mascota_desaparecidas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mascota_desaparecida = new MascotaDesaparecida;

        # tratando la imagen
        # *
        $this->validate($request, [
            'imagen' => 'required|image'
        ]);

        // $imagen = $request->imagen;
        // $featured_new_name = time() . $imagen->getClientOriginalName(); //La hora concatenado con el nombre original del archivo
        $imagen = $request->file('imagen')->store('mascotas', 'public');
        # *
        # fin de trabajar con la imagen

        $mascota_desaparecida->titulo = $request->titulo;
        $mascota_desaparecida->descripcion = $request->descripcion;
        $mascota_desaparecida->imagen = $imagen;
        $mascota_desaparecida->save();
         Session::flash('success', 'La mascota desaparecida se ha publicado correctamente.');
         return redirect()->route('mascota_desaparecida.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MascotaDesaparecida $MascotaDesaparecida)
    {
        return view('back_end.mascota_desaparecidas.edit')->with([

          'mascota_desaparecida' => $MascotaDesaparecida
          

      ]);
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
        $mascotadesaparecida = MascotaDesaparecida::find($id);
        $mascotadesaparecida->titulo= $request->titulo;
        $mascotadesaparecida->descripcion = $request->descripcion;

        if($request->has('imagen'))
        {
            # tratando la imagen
            # *
            $this->validate($request, [
                'imagen' => 'required|image'
            ]);

            // $imagen = $request->imagen;
            // $featured_new_name = time() . $imagen->getClientOriginalName(); //La hora concatenado con el nombre original del archivo
            $imagen = $request->file('imagen')->store('mascotas', 'public');
            $mascotadesaparecida->imagen = $imagen;
            # *
            # fin de trabajar con la imagen
        }
        
        $mascotadesaparecida->update();

        Session::flash('success', 'La publicacion se ha actualizado correctamente.');
        return redirect()->route('mascota_desaparecida.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $mascotadesaparecida = MascotaDesaparecida::find($id);

       $mascotadesaparecida->estatus = 'I';
       $mascotadesaparecida->borrado_por = Auth::user()->id;
       $mascotadesaparecida->update();

       Session::flash('success', 'La publicación se ha anulado permanentemente.');
       return redirect()->route('mascota_desaparecida.index');
   }
}
