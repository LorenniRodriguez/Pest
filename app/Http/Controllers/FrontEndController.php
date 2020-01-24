<?php

namespace App\Http\Controllers;

use App\Post;
use App\MascotaDesaparecida;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home ()
    {
    	return view('front_end.home', [
            'mascotas' => MascotaDesaparecida::where('estatus', '=', 'A')
                ->orderBy('fecha_publicacion', 'desc')
                ->limit(2)
                ->get()
        ]);
    }

    public function about ()
    {
    	return view('front_end.about');
    }

    public function gallery ()
    {
    	return view('front_end.gallery', [
            'mascotas' => MascotaDesaparecida::where('estatus', '=', 'A')
                ->orderBy('fecha_publicacion', 'desc')
                ->get()
        ]);
    }

    public function blog ()
    {
    	return view('front_end.blog', [
            'posts' => Post::where('estatus', '=', 'A')->paginate(10)
        ]);
    }

    public function contact ()
    {
    	return view('front_end.contact');
    }

    public function single (Request $request, $post)
    {
        return view('front_end.single', [
            'post' => Post::findOrFail($post)
        ]);
    }
}
