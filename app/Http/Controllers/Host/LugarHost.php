<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lugar;
use App\Models\Ruta;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Image;
use Auth;

class LugarController extends Controller
{
    public function index(){

        $lugar = Lugar::find(user()->id);
        return view("admin.lugar.index", compact('lugar','busqueda'));

    }

}
