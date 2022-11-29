<?php

namespace App\Http\Controllers\Host;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Lugar;

class CasaController extends Controller
{
    public function index(Categoria $categoria){
        $categoria = DB::table('lugars')->where('categoria_id','2')->get();
    
        return view("host.casa.index", compact('categoria'));
    }

    
    public function show($id)
    {
        $lugares = Lugar::find($id);

        return view('host.casa.show', compact("lugares"));
    }
}
