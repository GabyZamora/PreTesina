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
    public function index(Request $request){

        $busqueda =  $request->busqueda;
        $lugar = Lugar::where('nombre','LIKE','%'.$busqueda.'%')
        ->paginate(5);
        return view("admin.lugar.index", compact('lugar','busqueda'));

    }

    public function create(){
        $rutas= Ruta::orderBy('nombre','ASC')->pluck('nombre','id'); 
        $categorias= Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('host.catalogo.create',compact("rutas", "categorias"));       
    }


    public function store(Request $request){
        $lugar = new Lugar($request->all());

        if($request->hasFile('urlfoto')){

            $imagen = $request->file('urlfoto');
            $nuevonombre = 'lugar_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(900,400,function($constraint){ $constraint->upsize(); })
            ->save( public_path('/img/lugar/'.$nuevonombre));

            $lugar->urlfoto = $nuevonombre;
        }


        if($request->estado){
            $lugar->estado = 1; 
        }else{
            $lugar->estado = 0;
        }

        $lugar->ruta_id  =   $request->ruta_id;
        $lugar->categoria_id = $request->categoria_id;
        $lugar->user_id   = Auth::user()->id;
        $lugar->save();
        return redirect('/admin/lugar');
    }

    public function edit($id){
        $lugar = Lugar::findOrFail($id);
        $rutas= Ruta::orderBy('nombre','ASC')->pluck('nombre','id');
        $categorias = Categoria::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('admin.lugar.edit',compact('lugar',"rutas", "categorias"));
    }

    public function update(Request $request,$id){
        
        $lugar = Lugar::findOrFail($id);
        $lugar->fill($request->all());

        $foto_anterior  =$lugar->urlfoto;
        $foto_anterior  =$lugar->urllogo;

        if($request->hasFile('urlfoto')){

            $lugarAnterior = public_path('/img/lugar/'.$foto_anterior);
            if(file_exists($lugarAnterior)){ unlink(realpath($lugarAnterior)); }

            $imagen = $request->file('urlfoto');

            $nuevonombre = 'lugar_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())->fit(900,400,function($constraint){ $constraint->upsize(); })->save( public_path('/img/lugar/'.$nuevonombre));

            $lugar->urlfoto = $nuevonombre;
        }

        if($request->estado){
            $lugar->estado = 1; 
        }else{
            $lugar->estado = 0;
        }
        $lugar->ruta_id  =   $request->ruta_id;
        $lugar->categoria_id = $request->categoria_id;
        $lugar->save();
        return redirect('/admin/lugar');    
    }

    public function destroy($id){
        $lugar = Lugar::findOrFail($id);
        //foto
        $borrar = public_path('/img/lugar'.$lugar->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }

        $lugar->delete();
        return redirect('/admin/lugar');
    }
}
