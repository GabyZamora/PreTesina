<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Image;

class CategoriaController extends Controller
{
    public function index(Request $request){

        $busqueda =  $request->busqueda;
        $categorias = Categoria::where('nombre','LIKE','%'.$busqueda.'%')
        ->paginate(5);
        return view("admin.categoria.index", compact('categorias','busqueda'));

    }

    public function create(){
        return view('admin.categoria.create');
    }

    public function store(Request $request){
        $categoria = new categoria($request->all());

        if($request->hasFile('urlfoto')){

            $imagen = $request->file('urlfoto');
            $nuevonombre = 'categoria_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())->fit(900,400,function($constraint){ $constraint->upsize(); })->save( public_path('/img/categoria/'.$nuevonombre));

            $categoria->urlfoto = $nuevonombre;
        }
        $categoria->slug     =   Str::slug($request->nombre);
        $categoria->save();
        return redirect('/admin/categoria');
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view('admin.categoria.edit',compact('categoria'));
    }

    public function update(Request $request,$id){
        
        $categoria = Categoria::findOrFail($id);
        $categoria->fill($request->all());

        $foto_anterior  =$categoria->urlfoto;

        if($request->hasFile('urlfoto')){

            $categoriaAnterior = public_path('/img/categoria/'.$foto_anterior);
            if(file_exists($categoriaAnterior)){ unlink(realpath($categoriaAnterior)); }

            $imagen = $request->file('urlfoto');

            $nuevonombre = 'categoria_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())->fit(900,400,function($constraint){ $constraint->upsize(); })->save( public_path('/img/categoria/'.$nuevonombre));

            $categoria->urlfoto = $nuevonombre;
        }
        $categoria->slug     =   Str::slug($request->nombre);
        $categoria->save();
        return redirect('/admin/categoria');    
    }

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);
        $borrar = public_path('/img/categoria'.$categoria->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        $categoria->delete();
        return redirect('/admin/categoria');
    }
}
