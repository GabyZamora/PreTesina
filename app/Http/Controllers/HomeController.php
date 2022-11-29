<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lugar;
use App\Models\Ruta;
use Illuminate\Support\Str;
use Image;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
  
        $lugar = Lugar::latest()->limit(6)->get();
        return view('home', compact('lugar'));

    }

    public function show($id)
    {
        $lugares = Lugar::find($id);

        return view('host.catalogo.show', compact("lugares"));
    }
}
