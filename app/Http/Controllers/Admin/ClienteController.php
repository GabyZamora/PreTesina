<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    public function index(Request $request){

        $busqueda =  $request->busqueda;
        $clientes = Cliente::where('nombre','LIKE','%'.$busqueda.'%')
        ->paginate(5);
        return view("admin.cliente.index", compact('clientes','busqueda'));

    }


    public function edit($id){
        $cliente = Cliente::findOrFail($id);
        return view('admin.cliente.edit',compact('cliente'));
    }

    public function update(Request $request,$id){
        
        $cliente = Cliente::findOrFail($id);
        $cliente->fill($request->all());

        $cliente->slug     =   Str::slug($request->nombre);
        $cliente->save();
        return redirect('/admin/cliente');    
    }

    public function destroy($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect('/admin/cliente');
    }
}
