<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Auth;

class RegistroClienteController extends Controller
{
    
    public function create(){
        return view('host.clientes.create');
    }

    public function store(Request $request){
        $cliente = new Cliente($request->all());

        $cliente->user_id  =   Auth::user()->id;
        $cliente->slug     =   Str::slug($request->nombre);
        $cliente->save();
        return redirect('host.lugar.show');
    }
}
