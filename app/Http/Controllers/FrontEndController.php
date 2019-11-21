<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home ()
    {
    	return view('front_end.home');
    }

    public function about ()
    {
    	return view('front_end.about');
    }

    public function gallery ()
    {
    	return view('front_end.gallery');
    }

    public function blog ()
    {
    	return view('front_end.blog');
    }

    public function contact ()
    {
    	return view('front_end.contact');
    }
}
