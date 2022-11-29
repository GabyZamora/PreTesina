<?php

namespace App\Http\Controllers\Host;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Lugar;

class HotelController extends Controller
{
    public function index(Categoria $categoria){
        $categoria = DB::table('lugars')->where('categoria_id','3')->get();
        return view("host.hotel.index", compact('categoria'));
    }
    
    public function show($id)
    {
        $lugares = Lugar::find($id);

        return view('host.hotel.show', compact("lugares"));
    }
}
