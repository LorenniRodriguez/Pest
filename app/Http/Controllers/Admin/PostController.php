<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('back_end.posts.index')-> with([

            'posts' => Post::whereRaw(" estatus = 'A' ")->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back_end.posts.create');

    }
    
    public function store(Request $request)
    {
        $post = new Post;

        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->save();

        Session::flash('success', 'El Posts se ha publicado correctamente.');
        return redirect()->route('mascota_desaparecidas.index');
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
    public function edit( Post $post)
    {

        return view('back_end.posts.edit')->with([

          'post' => $post
          

      ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Post $post, Request $request)
    {
        $post->titulo= $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen   = $request->imagen;
        
        $post->update();

        Session::flash('success', 'La publicacion se ha actualizado correctamente.');
        return redirect()->route('posts.index');

        //echo '<pre>';
        //var_dump($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->estatus = 'I';
        $post->borrado_por = Auth::user()->id;
        $post->update();

        Session::flash('success', 'La Publicación se ha anulado permanentemente.');
        return redirect()->route('posts.index');
    }
}
