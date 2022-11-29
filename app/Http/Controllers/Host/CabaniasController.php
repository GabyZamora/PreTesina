<?php

namespace App\Http\Controllers\Host;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lugar;
use App\Models\Categoria;
use Illuminate\Support\Str;

class CabaniasController extends Controller
{
    public function index(Categoria $categoria){
        $categoria = DB::table('lugars')->where('categoria_id','1')->get();
        return view("host.cabania.index", compact('categoria'));
    }

    
    public function show($id)
    {
        $lugares = Lugar::find($id);

        return view('host.cabania.show', compact("lugares"));
    }
}
