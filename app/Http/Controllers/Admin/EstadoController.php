<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class EstadoController extends Controller
{
    public function index(Request $request){

        $busqueda =  $request->busqueda;
        $estados = Estado::where('nombre','LIKE','%'.$busqueda.'%')
        ->paginate(5);
        return view("admin.estado.index", compact('estados','busqueda'));

    }

    public function create(){
        return view('admin.estado.create');
    }

    public function store(Request $request){
        $estado = new Estado($request->all());
        $estado->slug     =  Str::slug($request->nombre);
        $estado->save();
        return redirect('/admin/estado');
    }

    public function edit($id){
        $estado = Estado::findOrFail($id);
        return view('admin.estado.edit',compact('estado'));
    }

    public function update(Request $request,$id){
        
        $estado = Estado::findOrFail($id);
        $estado->fill($request->all());

        $estado->slug     =   Str::slug($request->nombre);
        $estado->save();
        return redirect('/admin/estado');    
    }

    public function destroy($id){
        $estado = Estado::findOrFail($id);
        $estado->delete();
        return redirect('/admin/estado');
    }
}
